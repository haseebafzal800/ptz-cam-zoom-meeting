<?php

use App\Models\AppSettingsModel;
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
                return json_decode($result);
            }

            curl_close($ch);
        }
    }
}