<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        $data['pageTitle'] = 'Dashboard';
        $data['dashboard'] = 'active';
        $data['dashboardOpend'] = 'menu-open';
        $data['dashboardOpening'] = 'menu-is-opening';
        $data['producers'] = Role::where('name', 'Producer')->first()->users->count();
        $data['clients'] = Role::where('name', 'Client')->first()->users->count();
        $data['meetings'] = MeetingModel::count();
        $data['todayMeetings'] = MeetingModel::whereDate('start', Carbon::today())->count();
        return view('admin.dashboard', $data);
    }
}
