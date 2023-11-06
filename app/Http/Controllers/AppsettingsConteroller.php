<?php

namespace App\Http\Controllers;

use App\Models\AppSettingsModel;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class AppsettingsConteroller extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:zoom-settings', ['only' => ['zoomSettings','zoomSettingsUpdate']]);
         $this->middleware('permission:app-settings', ['only' => ['index','update']]);
    }
    public function index() {
        $data['item'] = getAppSettings();
        $data['pageTitle'] = 'App Settings';
        $data['appSettings'] = 'active';
        // $data['appSettingsOpend'] = 'menu-open';
        // $data['appSettingsOpening'] = 'menu-is-opening';
        return view('admin.appsettings.index', $data);
    }
    public function update(Request $request){
        $data = AppSettingsModel::find($request->id);
        $data->update($request->all());
        
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            // echo"<pre>";
            // print_r($request->all()); die;
            $data->clearMediaCollection('logo');
            $data->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        session()->flash('msg', 'Successfully saved the data!');
        session()->flash('alert-class', 'alert-success');
        
        return redirect()->route('app-settings');
        
    }
    public function zoomSettings() {
        $data['item'] = getZoomSettings(Auth::user()->client_id);
        $data['pageTitle'] = 'Zoom Settings';
        $data['appSettings'] = 'active';
        $data['appSettingsOpend'] = 'menu-open';
        $data['appSettingsOpening'] = 'menu-is-opening';
        return view('admin.appsettings.index', $data);
    }
    public function zoomSettingsUpdate(Request $request){
        $data = AppSettingsModel::find($request->id);
        // dd($request->all());
        $data->update($request->all());
        
        session()->flash('msg', 'Successfully saved the data!');
        session()->flash('alert-class', 'alert-success');
        
        return redirect()->route('zoom-settings');
        
    }
    
    
}
