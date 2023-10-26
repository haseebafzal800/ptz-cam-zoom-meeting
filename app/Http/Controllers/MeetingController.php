<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;


// use Yajra\DataTables\DataTables;
class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:meeting-list|meeting-create|meeting-edit|meeting-delete', ['only' => ['index','calendar']]);
        $this->middleware('permission:meeting-create', ['only' => ['create','ajax']]);
        $this->middleware('permission:meeting-edit', ['only' => ['edit','ajax']]);
        $this->middleware('permission:meeting-delete', ['only' => ['ajax']]);
    }
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            if(Auth::user()->hasRole('Admin')){
                $data = MeetingModel::select('id','title','description','start', 'host_email', 'meeting_start_url', 'zoom_meeting_id', 'meeting_join_url', 'meeting_password', 'meeting_timezone')->get();
            }else{
                $data = MeetingModel::select('id','title','description','start', 'host_email', 'meeting_start_url', 'zoom_meeting_id', 'meeting_join_url', 'meeting_password', 'meeting_timezone')->where('client_id', Auth::user()->client_id)->get();
            }

            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->start)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $url = "/fullcalenderAjax";
                    $btn='';
                    if (Gate::allows('meeting-edit')) {
                    $btn .= '<a href="'.@url("/meeting/$row->id/participents/").'" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>';
                    $btn .= ' <a href="'.@url('/meeting/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" id="'.$row->id.'" onclick="DeleteMeeting(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    }if (Gate::allows('camera-settings')) {
                        $btn .= ' <a id="'.$row->id.'" href="'.@url("/camera-settings/$row->zoom_meeting_id").'" class="btn btn-warning btn-xs btn-delete"><i class="fa fa-camera" aria-hidden="true"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
            }
        $data['pageTitle'] = 'Meetings';
        $data['meetingListActive'] = 'active';
        $data['meetingOpening'] = 'menu-is-opening';  
        $data['meetingOpend'] = 'menu-open';
        return view('admin.meetings.index', $data);
    }
    public function getLiveStreamInfo($id){
        $info = getLiveStreamInfo($id);
        echo $info;
    }
    public function calendar(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = MeetingModel::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->where('client_id', Auth::user()->client_id)
                       ->get(['id', 'title', 'start', 'end']);
            $data1 = [];
            foreach($data as $row){
                $data1[] = [
                    'title' => $row->title,
                    'start' => date(DATE_ISO8601,strtotime($row->start)),
                    'end' => date(DATE_ISO8601,strtotime($row->end)),
                    'id' => $row->id
                ];
            }
             return response()->json($data1);
        }
        $data['pageTitle'] = 'App Settings';
        $data['calendarSettings'] = 'active';
        $data['meetingOpening'] = 'menu-is-opening';  
        $data['meetingOpend'] = 'menu-open';
        return view('admin.meetings.calendar', $data);
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
 
        switch ($request->type) {
            case 'add':
                $data = [
                    "agenda"=> $request->description,
                    "default_password"=> false,
                    "duration"=> $request->duration,
                    "password"=> $request->password,
                    "pre_schedule"=> false,
                    "settings"=> [
                        
                        "allow_multiple_devices"=> true,
                        "approval_type"=> 0,
                        "calendar_type"=> 1,
                        "close_registration"=> false,
                        "contact_email"=> Auth::user()->email,
                        "contact_name"=> Auth::user()->name,
                        "email_notification"=> true,
                        "encryption_type"=> "enhanced_encryption",
                        "focus_mode"=> true,
                        "join_before_host"=> false,
                        "meeting_authentication"=> true,
                        "mute_upon_entry"=> false,
                        "participant_video"=> false,
                        "private_meeting"=> false,
                        "registrants_confirmation_email"=> true,
                        "registrants_email_notification"=> true,
                        "registration_type"=> 2,
                        "show_share_button"=> true,
                        "use_pmi"=> false,
                        "waiting_room"=> false,
                        "watermark"=> false,
                        "host_save_video_order"=> true,
                        "internal_meeting"=> false,
                        "participant_focused_meeting"=> false,
                        "push_change_to_calendar"=> true
                    ],
                    "start_time"=> $request->start,
                    "timezone"=> "America/Los_Angeles",
                    "topic"=> $request->title,
                    "type"=> 2
                ];
                $meeting = createMeeting($data);
                // echo $meeting->id; die;
                if($meeting && $meeting->id){
                    $event = MeetingModel::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'host_email' => $meeting->host_email??'',
                        'host_id' => $meeting->host_id??'',
                        'zoom_meeting_id' => $meeting->id??'',
                        'zoom_meeting_duration' => $meeting->duration??'',
                        'meeting_start_url' => $meeting->start_url??'',
                        'meeting_join_url' => $meeting->join_url??'',
                        'meeting_password' => $meeting->password??'',
                        'meeting_timezone' => $meeting->timezone??'',
                        'client_id' => Auth::user()->client_id,
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    return response()->json($event);
                }else{
                    return response('Error in zoom meeting API, Please try again');
                }

             break;
  
           case 'update':
            $event = MeetingModel::where(['id'=>$request->id])->first();
            if($event && $event->id){
                $data = [
                    "agenda"=>$request->description,
                    "password"=>$request->password,
                    "pre_schedule"=>false,
                    "start_time"=> $request->start,
                    "timezone"=> "America/Los_Angeles",
                    "topic"=> $request->title,
                    "type"=> 2
                ];
                $meeting = updateMeeting($event->zoom_meeting_id, $data);
                // var_dump($meeting); die;
                if($meeting){
                    $event1 = MeetingModel::find($request->id)->update([
                        'title' => $request->title,
                        'description' => $request->description,
                        'zoom_meeting_duration' => $request->duration,
                        'meeting_password' => $request->password,
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    if($event1){
                        return response()->json($event);
                    }else{
                        return response()->json('Meeting update error, please try again');
                    }
                }else{
                    return response()->json('Zoom API error, please try again');
                }
            }else{
                return response()->json('Meeting not found in database');
            }
            break;
  
           case 'delete':
                $event = MeetingModel::find($request->id);
                $del = meetingDelete($event->zoom_meeting_id);
                $event = MeetingModel::find($request->id)->delete();
                if($del){
                    return response()->json($event);
                }else{
                    // return response()->json($event);

                }
                
  
             break;
             
           default:
             # code...
             break;
        }
    }
    public function create()
    {
        // $permission = Permission::get();
        $meetingAddActive = 'active';
        $pageTitle = 'Create New Meeting';
        $meetingOpening = 'menu-is-opening';
        $meetingOpend = 'menu-open';
        return view('admin.meetings.form',compact('pageTitle','meetingAddActive', 'meetingOpening', 'meetingOpend'));
    }
    public function edit($id)
    {
        $item = MeetingModel::find($id);
        $meetingListActive = 'active';
        $pageTitle = 'Edit Meeting';
        $meetingOpening = 'menu-is-opening';
        $meetingOpend = 'menu-open';
        return view('admin.meetings.edit',compact('item','pageTitle','meetingListActive', 'meetingOpening', 'meetingOpend'));
    }

}
