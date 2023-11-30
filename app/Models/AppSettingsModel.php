<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class AppSettingsModel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'appSettings';
    protected $fillable = ['email', 'phone', 'address', 'zoomClientId', 'zoomClientSecret', 'zoomAccountId', 'video_sdk_client_id', 'video_sdk_client_secret'];

    
}
