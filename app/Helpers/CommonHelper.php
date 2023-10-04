<?php

use App\Models\AppSettingsModel;

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
if (!function_exists('zoom_token')) {
    function zoom_token(Request $request){
        if(!$request->input('code')){
            $appSeetings = getAppSettings();
            $url = "https://zoom.us/oauth/authorize?response_type=code&client_id=$appSeetings->zoomClientId&redirect_uri=$appSeetings->zoomRedirectUrl";
            return redirect($url);
        }else{
            $code = $request->input('code');
            
            return $code;
        }
        
    }
}
if (!function_exists('getZoomAccessToken')) {
    function getZoomAccessToken($code){
        $clientId = 'yopD5RPIRXaizWXx6jUGA';
        $clientSecret = 'TAEPrBn5i5cGK1Xp13E65NVYGbw5V4qO';
        $authorizationCode = $code;
        $redirectUri = 'http://127.0.0.1:8000/zoom-token';

        $base64Credentials = base64_encode($clientId . ':' . $clientSecret);

        $data = [
            'grant_type' => 'authorization_code',
            'code' => $authorizationCode,
            'redirect_uri' => $redirectUri,
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Authorization: Basic ' . $base64Credentials,
                    'Content-Type: application/x-www-form-urlencoded',
                ],
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents('https://zoom.us/oauth/token', false, $context);

        if ($response === false) {
            echo 'Error occurred while making the request.';
        } else {
            $resp = json_decode($response);
            return $resp->access_token;
        }
    }
}