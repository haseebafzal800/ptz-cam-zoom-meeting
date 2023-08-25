<?php

namespace App\Http\Controllers;

use App\Models\AppSettingsModel;
use Illuminate\Http\Request;

class AppsettingsConteroller extends Controller
{
    function __construct()
    {
        // dd('dfdfdf');
    }
    public function index() {
        $data['item'] = getAppSettings();
        $data['pageTitle'] = 'App Settings';
        $data['appSettings'] = 'active';
        $data['appSettingsOpend'] = 'menu-open';
        $data['appSettingsOpening'] = 'menu-is-opening';
        return view('admin.appsettings.index', $data);
    }
    public function update(Request $request){
        // echo"<pre>";
        // print_r($request->all()); die;
        $data = AppSettingsModel::find($request->id);
        $data->update($request->all());
        
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $data->clearMediaCollection('images');
            $data->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        session()->flash('msg', 'Successfully saved the data!');
        session()->flash('alert-class', 'alert-success');
        
        return redirect()->route('app-settings');
        
    }
}
