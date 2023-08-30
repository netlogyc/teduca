<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SMSSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nexmo_key', 'nexmo_secret', 'nexmo_sender_name', 'twilio_sid', 'twilio_auth_token', 'twilio_number', 'status',
    ];
}
