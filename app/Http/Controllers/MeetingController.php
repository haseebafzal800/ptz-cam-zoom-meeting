<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index(Request $request)
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
        return view('admin.meetings.index', $data);
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
              $event = MeetingModel::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;
  
           case 'update':
              $event = MeetingModel::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = MeetingModel::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
