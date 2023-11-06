<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipentModel extends Model
{
    use HasFactory;
    protected $table = 'participents';
    protected $fillable = [
        'first_name',	
        'last_name',	
        'email',	
        'meeting_id',	
        'phone',	
        'zoom_id',	
        'join_url',	
        'registrant_id',	
        'participant_pin_code',	
        'created_at',	
        'updated_at'
    ];
}
