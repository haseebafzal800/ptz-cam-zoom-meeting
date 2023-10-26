<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CameraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:camera-settings', ['only' => ['index','addCams']]);
    }
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Camera Settings';
        $data['cameraSettings'] = 'active';
        $data['cameraSettingsOpend'] = 'menu-open';
        $data['cameraSettingsOpening'] = 'menu-is-opening';

        // return view('admin.camera.index2', $data);
        return view('admin.camera.index-multi-cam', $data);
    }

    public function addCams(Request $request){
        // if(($request->cam1)!=''){
            setcookie('cam1', $request->cam1, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam2)!=''){
            setcookie('cam2', $request->cam2, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam3)!=''){
            setcookie('cam3', $request->cam3, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam4)!=''){
            setcookie('cam4', $request->cam4, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam5)!=''){
            setcookie('cam5', $request->cam5, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam6)!=''){
            setcookie('cam6', $request->cam6, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam7)!=''){
            setcookie('cam7', $request->cam7, time() + (30 * 24 * 60), '/');
        // }
        // if(($request->cam8)!=''){
            setcookie('cam8', $request->cam8, time() + (30 * 24 * 60), '/');
        // }
        // var_dump($d); die;
        return redirect(url('camera-settings'));
    }
}
