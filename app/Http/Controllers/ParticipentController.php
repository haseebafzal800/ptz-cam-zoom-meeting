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
        $this->middleware('permission:meeting-list', ['only' => ['index','create','createbatch','store','batchstore','destroy']]);
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
                    // $btn .= ' <a href="'.@url("/meeting/$row->meeting_id/participent".$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
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
    function createbatch(){
        $data['pageTitle'] = 'Add Batch Participent';
        $data['blogCreateActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';  
        $data['blogOpend'] = 'menu-open';
        // $data['tags'] = TagsModel::get();
        return view('admin.participents.batchform', $data);
    }
    public function batchstore(Request $request)
    {
        $meeting = MeetingModel::find($request->meeting_id);
        if($meeting){
            $first_name_arr = explode(',',$request->first_name);
            // $last_name_arr = explode(',',$request->last_name);
            $email_arr = explode(',',$request->email);
            $totalParticipents = count($email_arr);
            $participentsArray = array();
            for($pz=0; $pz<$totalParticipents; $pz++){
                $singleParticipent = [];
                $singleParticipent = ['first_name'=>trim($first_name_arr[$pz]??''), 'last_name'=>'', 'email'=>trim($email_arr[$pz])];
                $participentsArray[] = $singleParticipent;
            }
            $data = [
                "auto_approve"=> true,
                "registrants_confirmation_email"=> true,
                "registrants"=>$participentsArray
            ];
            $resp = addRegistrantInToMeeting($meeting->zoom_meeting_id, $data);
            // echo"<pre>";
            // print_r($resp); die;
            if($resp){
                $registrants = $resp->registrants;
                $user = array();
                foreach($registrants as $req){
                    $dbArr = [
                        'first_name'=>$req->first_name??'',
                        'last_name'=>$req->last_name??'',
                        'email'=>$req->email,
                        'meeting_id'=>$meeting->id,
                        'phone'=>$req->phone??'',
                        'zoom_id'=>$req->id??'',
                        'join_url'=>$req->join_url,
                        'registrant_id'=>$req->registrant_id,
                        'participant_pin_code'=>$req->participant_pin_code ?? '',
                    ];
                    $user[] = $dbArr;
                }
                $post = ParticipentModel::insert($user);
                
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
            $resp = addSingleRegistrantInToMeeting($meeting->zoom_meeting_id, $data);
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

