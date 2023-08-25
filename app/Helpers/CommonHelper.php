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