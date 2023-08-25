<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingModel extends Model
{
    use HasFactory;
    protected $table = 'meetings';
    protected $fillable = ['title', 'description', 'start','end'];
}
