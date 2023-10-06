<?php

namespace App\Http\Controllers;

use App\Models\MeetingModel;
use App\Models\User;
use App\Models\AppSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class ZoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getZoomAccessToken(){

            // Define your account ID and client ID/secret
            $zoomCreds = getZoomSettings(Auth::user()->client_id);
            $accountId = $zoomCreds->zoomAccountId; //'vguSzGnfTQOnVzrA2wrU8g';
            $clientId = $zoomCreds->zoomClientId; //'sGFjygBQhm24fxvP7XrXg';
            $clientSecret = $zoomCreds->zoomClientSecret; //'XTY2FR4Rb4QeimcvU1ZaEAc1SSQ2ICQ4';
            // Encode the client ID and client secret in Base64
            $base64Credentials = base64_encode($clientId . ':' . $clientSecret);

            // Define the URL for the Zoom OAuth token endpoint
            $tokenUrl = 'https://zoom.us/oauth/token';

            // Define the data to send in the request
            $data = [
                'grant_type' => 'account_credentials',
                'account_id' => $accountId,
            ];

            // Set up the cURL request
            $ch = curl_init($tokenUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Basic ' . $base64Credentials,
                'Content-Type: application/x-www-form-urlencoded',
            ]);

            // Execute the request
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            
            // Close the cURL session
            curl_close($ch);
            
            // Check for errors
            if ($response === false) {
                return false;
            }
            // Parse the JSON response
            $responseData = json_decode($response, true);

            // Check for errors in the response
            if (json_last_error() !== JSON_ERROR_NONE) {
                return false;
                // echo 'JSON parsing error: ' . json_last_error_msg();
                // exit;
            }

            // Store the access token in an environment variable or use it as needed
            $accessToken = $responseData['access_token'];
            return $accessToken;
             
    }
    
    public function addParticipent($meetingId, $accessToken){
        $data = [
            "first_name"=>"Usman",
            "last_name"=>"Nawab",
            "email"=>"nawabusmanali11@gmail.com",
            "comments"=>"Looking forward to the discussion.",
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.zoom.us/v2/meetings/$meetingId/registrants",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer  $accessToken",
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
    public function createMeeting(Request $request) {
        $accessToken = getZoomAccessToken();
        $user = userLvlAccess();
        if($accessToken && $user){
            $user_id = $user->id;
            // dd($user);
            $data = [
                "agenda"=>"My Meeting for test",
                "default_password"=>false,
                "duration"=>60,
                "password"=>"123456",
                // "schedule_for"=>"asif.zardari.ppp1@gmail.com",
            ];
            // CURLOPT_POSTFIELDS =>"{\r\n  \"agenda\": \"My Meeting for test\",\r\n  \"default_password\": false,\r\n  \"duration\": 60,\r\n  \"password\": \"123456\"\r\n}",
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/users/$user_id/meetings",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer  $accessToken",
                "Content-Type: application/json"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response);
        }else{
            dd('Something went wrong');
        }
        
    }
    
    
    public function index($code='')
    {
        if($code && $code!=''){
            var_dump($code); die;
        }
        else{

            $url = 'https://zoom.us/oauth/authorize?response_type=code&client_id=yopD5RPIRXaizWXx6jUGA&redirect_uri=http://127.0.0.1:8000/zoom-token';
            return redirect($url);
        }
        // $resp = $this->sendSms($url);
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // // SSL important
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output = curl_exec($ch);
        // curl_close($ch);


        // $resp = json_decode($output);
        var_dump($resp); die;
    }
    public function sendSms($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        return $response;
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
    public function createUser(){
        $data = [
            "action"=>"create",
            "user_info"=>[
              "email"=>"jchill@example.com",
              "first_name"=>"Jill",
              "last_name"=>"Chill",
              "display_name"=>"Jill Chill",
              "password"=>"if42!LfH@",
              "type"=>1,
              "feature"=>[
                "zoom_phone"=>true,
                "zoom_one_type"=>16
              ],
              "plan_united_type"=>"1"
            ]
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.zoom.us/v2/users/$user_id/meetings",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer  $accessToken",
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}
