<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Carbon;

// use Yajra\DataTables\DataTables;
class MeetingController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = MeetingModel::select('id','title','description','start', 'host_email', 'meeting_start_url', 'meeting_join_url', 'meeting_password', 'meeting_timezone')->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->start)->format('M d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    // $url = "/admin/meeting/delete/".$row->id;
                    // $btn = '<a href="javascript:void(0)" onclick="DeleteMe(this, '."'".$url."'".')" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>';
                    // $btn .= ' <a href="'.@url('/admin/blog/edit/'.$row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>';
                    $btn = ' <a href="'.@url("/meeting/$row->id/participents/").'" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>';
                    return $btn;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
            }
        $data['pageTitle'] = 'Meetings';
        $data['blogListActive'] = 'active';
        $data['blogOpening'] = 'menu-is-opening';  
        $data['blogOpend'] = 'menu-open';
        return view('admin.meetings.index', $data);
    }
    public function calendar(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = MeetingModel::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
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
        $data['appSettings'] = 'active';
        $data['appSettingsOpend'] = 'menu-open';
        $data['appSettingsOpening'] = 'menu-is-opening';
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
                        "approval_type"=> 2,
                        "calendar_type"=> 1,
                        "close_registration"=> false,
                        "contact_email"=> Auth::user()->email,
                        "contact_name"=> Auth::user()->name,
                        "email_notification"=> true,
                        "encryption_type"=> "enhanced_encryption",
                        "focus_mode"=> true,
                        "join_before_host"=> false,
                        "meeting_authentication"=> true,
                        "meeting_invitees"=> [
                            [
                                "email"=> "inshag16@gmail.com",
                                "email"=> "asif.zardari.ppp1@gmail.com",
                            ]
                        ],
                        "mute_upon_entry"=> false,
                        "participant_video"=> false,
                        "private_meeting"=> false,
                        "registrants_confirmation_email"=> true,
                        "registrants_email_notification"=> true,
                        "registration_type"=> 1,
                        "show_share_button"=> true,
                        "use_pmi"=> false,
                        "waiting_room"=> false,
                        "watermark"=> false,
                        "host_save_video_order"=> true,
                        "internal_meeting"=> false,
                        "participant_focused_meeting"=> false,
                        "push_change_to_calendar"=> false
                    ],
                    "start_time"=> $request->start,
                    "timezone"=> "America/Los_Angeles",
                    "topic"=> $request->title,
                    "type"=> 2
                ];
                $meeting = createMeeting($data);
                // echo $meeting->id; die;
                if($meeting->id){
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
                }

             break;
  
           case 'update':
              $event = MeetingModel::find($request->id)->update([
                  'title' => $request->title,
                  'description' => $request->description,
                  'host_email' => $meeting->host_email,
                  'host_id' => $meeting->host_id,
                  'zoom_meeting_id' => $meeting->id,
                  'zoom_meeting_duration' => $meeting->duration,
                  'meeting_start_url' => $meeting->start_url,
                  'meeting_join_url' => $meeting->join_url,
                  'meeting_password' => $meeting->password,
                  'meeting_timezone' => $meeting->timezone,
                  'client_id' => Auth::user()->client_id,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
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
}
