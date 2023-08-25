<?php

use App\Http\Controllers\AppsettingsConteroller;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('login');
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/app-settings', [AppsettingsConteroller::class, 'index'])->name('app-settings')->middleware('is_admin');
Route::post('/app-settings/update', [AppsettingsConteroller::class, 'update'])->name('app-settings-update')->middleware('is_admin');

// full calander
Route::get('meetings', [MeetingController::class, 'index']);
Route::post('fullcalenderAjax', [MeetingController::class, 'ajax']);

// roles n permissions
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
