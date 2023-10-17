<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\BlogsModel;
use App\Models\MeetingModel;
use App\Models\ParticipentModel;
use App\Models\TagsModel;
use DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class ParticipentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('participents')->select('participents.id', 'first_name', 'last_name', 'email', 'meeting_id', 'title', 'start', 'phone', 'zoom_id', 'join_url', 'registrant_id', 'participant_pin_code')->join('meetings', 'participents.meeting_id', '=', 'meetings.id')->get();
            
            // $data = ParticipentModel::select('id', 'first_name', 'last_name', 'email', 'meeting_id', 'phone', 'zoom_id', 'join_url', 'registrant_id', 'participant_pin_code')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->first_name.' '.$row->last_name;
                })
                ->addColumn('action', function($row){
                    $url = "/meeting/$row->meeting_id/participent/delete/".$row->id;
                    $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    $btn .= ' <a href="'.@url("/meeting/$row->meeting_id/participent".$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['name','action'])
                ->make(true);
            }
        $data['pageTitle'] = 'Meeting participents';
        $data['blogListActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';  
        $data['blogOpend'] = 'menu-open';
        return view('admin.participents.index', $data);
    }
    function create(){
        $data['pageTitle'] = 'Add Participent';
        $data['blogCreateActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';  
        $data['blogOpend'] = 'menu-open';
        // $data['tags'] = TagsModel::get();
        return view('admin.participents.form', $data);
    }
    public function store(Request $request)
    {
        $meeting = MeetingModel::find($request->meeting_id);
        if($meeting){

            $data = [
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "language"=>"en-US",
                "auto_approve"=>true
            ];
            $resp = addRegistrantInToMeeting($meeting->zoom_meeting_id, $data);
            // var_dump($resp); die;
            if($resp){
                $dbArr = [
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email,
                    'meeting_id'=>$meeting->id,
                    'phone'=>$request->phone,
                    'zoom_id'=>$resp->id,
                    'join_url'=>$resp->join_url,
                    'registrant_id'=>$resp->registrant_id,
                    'participant_pin_code'=>$resp->participant_pin_code ?? '',
                ];
                $post = ParticipentModel::create($dbArr);
                if($post){
                    return redirect()->to("/meeting/$meeting->id/participents");
                }else{
                    session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
                    return back();
                }
            }else{
                session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
                return back();
            }
        }else{
            session()->flash('error', '<div class="alert alert-danger">Successfully saved the data!</div>');
            return back();
        }
    }
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Blog';
        $data['blogListActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';  
        $data['blogOpend'] = 'menu-open';
        $data['item'] = BlogsModel::find($id);
        $data['tags'] = TagsModel::get();
        
        return view('admin.blogs.edit', $data);
    }

    
    public function update(BlogRequest $request)
    {
        $post = BlogsModel::find($request->id);
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = auth()->user()->id;
        // dd($request->all());
        // var_dump($request->all()); die;
        $post->update($request->all());
        if($post){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $post->clearMediaCollection('images');
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-success');
            
            return redirect()->route('blogs');
        }else{
            session()->flash('msg', 'Successfully saved the data!');
            session()->flash('alert-class', 'alert-danger');
            return back();
        }
    }

    
    public function destroy($meetingId, $id)
    {
        $user = ParticipentModel::find($id);
        if($user){
            $del = participentDelete($user->zoom_id, $user->registrant_id);
            if($user->delete()){
                return 'ok';
            }else{
                return 'notok';
            }

        }
    }
}

