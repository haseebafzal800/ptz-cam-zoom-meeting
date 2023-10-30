<?php

use App\Http\Controllers\ParticipentController;
use App\Http\Controllers\AppsettingsConteroller;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoomController;

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
Route::any('/zoom', [ZoomController::class, 'index'])->name('zoom');
Route::any('/zoom-token', [ZoomController::class, 'zoom_token'])->name('zoom-token');
Route::any('/zoom-create-user', [ZoomController::class, 'createUser'])->name('zoom-create-user');
Route::any('/zoom-create-meeting', [ZoomController::class, 'createMeeting'])->name('zoom-create-meeting');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/app-settings', [AppsettingsConteroller::class, 'index'])->name('app-settings')->middleware('is_admin');
Route::post('/app-settings/update', [AppsettingsConteroller::class, 'update'])->name('app-settings-update')->middleware('is_admin');

// full calander
Route::get('meetings', [MeetingController::class, 'index'])->name('meetings');
Route::get('meetings/calendar', [MeetingController::class, 'calendar']);
Route::get('meetings/create', [MeetingController::class, 'create'])->name('create-meeting');
Route::get('meeting/edit/{id}', [MeetingController::class, 'edit'])->name('edit-meeting');
Route::post('fullcalenderAjax', [MeetingController::class, 'ajax']);
Route::get('/meeting/getLiveStreamInfo/{id}', [App\Http\Controllers\MeetingController::class, 'getLiveStreamInfo']);

// meeting participents
Route::get('/meeting/{id}/participents', [App\Http\Controllers\ParticipentController::class, 'index']);
Route::get('/meeting/{id}/add-participent', [App\Http\Controllers\ParticipentController::class, 'create']);
Route::get('/meeting/{id}/add-batch-participent', [App\Http\Controllers\ParticipentController::class, 'createbatch']);
Route::post('/meeting/store-participent', [App\Http\Controllers\ParticipentController::class, 'store']);
Route::post('/meeting/store-batch-participent', [App\Http\Controllers\ParticipentController::class, 'batchstore']);
Route::get('/meeting/{meetingId}/participent/delete/{id}', [App\Http\Controllers\ParticipentController::class, 'destroy']);
// Route::get('meeting/{id}/participents', function () {
//     var_dump('fffffffff'); die;
// });

//Camera settings
Route::get('camera-settings', [CameraController::class, 'index']);
Route::get('camera-settings/{id?}', [CameraController::class, 'index']);
Route::post('camera-setting/add-cams', [CameraController::class, 'addCams'])->name('add-cam');
Route::post('live-stream', [CameraController::class, 'liveStream'])->name('live-stream');
//Users
Route::get('users/approved/{id}', [UserController::class, 'approved'])->name('users.approved');
Route::get('users/unapprove/{id}', [UserController::class, 'unapprove'])->name('users.unapprove');
Route::get('change-password', [UserController::class, 'change_password'])->name('change-password');
Route::get('change-password', [UserController::class, 'change_password'])->name('change-password');
//Notifications

Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('/notification/delete/{id}', [NotificationsController::class, 'destroy'])->name('notification-delete');
// Zoom App Settings
Route::get('/zoom-settings', [AppsettingsConteroller::class, 'zoomSettings'])->name('zoom-settings');
Route::post('/zoom-settings/update', [AppsettingsConteroller::class, 'zoomSettingsUpdate'])->name('zoom-settings-update');

// roles n permissions
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
