<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingModel extends Model
{
    use HasFactory;
    protected $table = 'meetings';
    protected $fillable = ['title', 'description', 'host_email', 'host_id', 'zoom_meeting_id', 'zoom_meeting_duration', 'meeting_start_url', 'meeting_join_url', 'meeting_password', 'meeting_timezone', 'client_id', 'start', 'end'];
}
