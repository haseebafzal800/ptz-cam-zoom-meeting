<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Camera Settings';
        $data['cameraSettings'] = 'active';
        $data['cameraSettingsOpend'] = 'menu-open';
        $data['cameraSettingsOpening'] = 'menu-is-opening';
        return view('admin.camera.index', $data);
        // return view('admin.camera.cam', $data);
    }
}
