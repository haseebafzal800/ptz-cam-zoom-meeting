<?php

use App\Models\AppSettingsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getTestomonials')) {
    function getTestomonials()
    {
        $testimonials[] = 'I am testimonials';
        $testimonials[] = 'I am 2nd testimonials';
        return $testimonials;
    }

}

if (!function_exists('getAppSettings')) {
    function getAppSettings($select=null)
    {
        if($select){
            return AppSettingsModel::select($select)->where('id', 1)->first();
        }else{
            return AppSettingsModel::select('*')->where('id', 1)->first();
        }
    }
}

if (!function_exists('getZoomSettings')) {
    function getZoomSettings($id=null)
    {
            return AppSettingsModel::where('id', $id)->first();
    }
}
if (!function_exists('getZoomAccessToken')) {
    function getZoomAccessToken(){

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
if (!function_exists('userLvlAccess')) {
        function userLvlAccess(){ //09112240289079
            $accessToken = getZoomAccessToken(); // Replace with your actual access token

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.zoom.us/v2/users/me');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

            $headers = array(
                'Authorization: Bearer ' . $accessToken,
            );

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                return false;
            } else {
                $user = json_decode($result);
                $dbUser = User::find(Auth::user()->id);
                $dbUser->zoom_user_id = $user->id;
                $dbUser->save();
                return json_decode($user);
            }

            curl_close($ch);
        }
    }
    if (!function_exists('createMeeting')) {
        function createMeeting($data) {
            $accessToken = getZoomAccessToken();
            $user_id = Auth::user()->zoom_user_id;
            if($user_id==''){
                $user = userLvlAccess();
                $user_id = $user->id;
            }
            if($accessToken && $user_id){
                // $user_id = $user->id;
                
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
                // return $response;
                return json_decode($response);
            }else{
                dd('Something went wrong');
            }
            
        }
    }

    if (!function_exists('getLiveStreamInfo')) {
        function getLiveStreamInfo($meeting_id){
            $accessToken = getZoomAccessToken();
            if($accessToken){
                $url = "https://api.zoom.us/v2/meetings/$meeting_id/livestream";
                // CURLOPT_URL => "https://api.zoom.us/v2/users/$user_id/meetings",

                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST => "GET",
                // CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer  $accessToken",
                    "Content-Type: application/json"
                ),
                ));
                    $response = curl_exec($curl);
                    
                    $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    return $response_code;
                    curl_close($curl);
                    if ($response_code == 204) {
                        return $response;
                    } else {
                        return false;
                    }
            }
            else{
                return false;
            }
            
        }
    }

    if (!function_exists('updateLiveStreaming')) {
        function updateLiveStreaming($meeting_id,$data) {
            $accessToken = getZoomAccessToken();
            if($accessToken){
                $url = "https://api.zoom.us/v2/meetings/$meeting_id/livestream";
                // CURLOPT_URL => "https://api.zoom.us/v2/users/$user_id/meetings",

                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST => "PATCH",
                CURLOPT_POSTFIELDS =>json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer  $accessToken",
                    "Content-Type: application/json"
                ),
            ));
                $response = curl_exec($curl);
                
                $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                // return $response_code;
                curl_close($curl);
                if ($response_code == 204) {
                    return $response;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        }
    }
    if (!function_exists('updateMeeting')) {
        function updateMeeting($meeting_id, $data) {
            $accessToken = getZoomAccessToken();
            $user_id = Auth::user()->zoom_user_id;
            if($accessToken){
                $curl = curl_init();
                curl_setopt_array($curl, array(
                // CURLOPT_URL => "https://api.zoom.us/v2/users/$user_id/meetings",
                CURLOPT_URL => "https://api.zoom.us/v2/meetings/$meeting_id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PATCH",
                CURLOPT_POSTFIELDS =>json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer  $accessToken",
                    "Content-Type: application/json"
                ),
                ));

                $response = curl_exec($curl);
                $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                curl_close($curl);
                if ($response_code == 204) {
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
            
        }
    }
    function meetingDelete($meeting_id, $json = '')
    {
        $accessToken = getZoomAccessToken();
        if($accessToken){

            // Replace with your Zoom API access token and meeting ID
            $access_token = $accessToken;

            // Construct the URL for the DELETE request
            $url = "https://api.zoom.us/v2/meetings/{$meeting_id}";

            // Set up the headers with the Authorization token
            $headers = array(
                "Authorization: Bearer {$access_token}"
            );

            // Initialize cURL session
            $ch = curl_init($url);

            // Set cURL options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Execute cURL session and get the response
            $response = curl_exec($ch);
            $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Check the response status code and handle any errors
            if ($response_code == 204) {
                // echo "Meeting deleted successfully.";
                return true;
            } else {
                return false;
                // echo "Error deleting meeting. Status code: {$response_code}\n";
                // echo $response;
            }

            // Close cURL session
            curl_close($ch);

        }else{
            return false;
        }
    }
    function addRegistrantInToMeeting($meetingId, $data){
        // $url = "https://api.zoom.us/v2/meetings/$meetingId/registrants";
        $url = "https://api.zoom.us/v2/meetings/$meetingId/batch_registrants";
        $accessToken = getZoomAccessToken();
        if($accessToken){
            // $user_id = $user->id;
            $headers = array(
                "Authorization: Bearer $accessToken",
                "Content-Type: application/json",
            );
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            // return $response;
            if ($http_status == 201) {
                return json_decode($response);
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
    function addSingleRegistrantInToMeeting($meetingId, $data){
        $url = "https://api.zoom.us/v2/meetings/$meetingId/registrants";
        // $url = "https://api.zoom.us/v2/meetings/$meetingId/batch_registrants";
        $accessToken = getZoomAccessToken();
        if($accessToken){
            // $user_id = $user->id;
            $headers = array(
                "Authorization: Bearer $accessToken",
                "Content-Type: application/json",
            );
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            // return $response;
            if ($http_status == 201) {
                return json_decode($response);
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
    function participentDelete($meetingId, $registrantId, $json = '')
    {
        $accessToken = getZoomAccessToken();
        if($accessToken){

            // Replace with your Zoom API access token and meeting ID
            $access_token = getZoomAccessToken();

            // Construct the URL for the DELETE request
            $url = "https://api.zoom.us/v2/meetings/$meetingId/registrants/$registrantId";

            // Set up the headers with the Authorization token
            $headers = array(
                "Authorization: Bearer {$access_token}"
            );

            // Initialize cURL session
            $ch = curl_init($url);

            // Set cURL options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Execute cURL session and get the response
            $response = curl_exec($ch);
            $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Check the response status code and handle any errors
            if ($response_code == 204) {
                // echo "Meeting deleted successfully.";
                return true;
            } else {
                return false;
                // echo "Error deleting meeting. Status code: {$response_code}\n";
                // echo $response;
            }

            // Close cURL session
            curl_close($ch);

        }else{
            return false;
        }
    }
    if (!function_exists('setCookies')) {
        function setCookies($name, $value, $mins=(30 * 24 * 60)){
            $response = new Response('Set Cookie');
            $response->withCookie(cookie($name, $value, $mins));
            return $response;
        }
    }
    if (!function_exists('getCookie')) {
        function getCookie($name){
            $value = request()->cookie($name);
            return $value ?? null;
        }
    }
}