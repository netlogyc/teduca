<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'date', 'follow_up_date', 'call_duration', 'start_time', 'end_time', 'purpose', 'note', 'call_type', 'status', 'created_by', 'updated_by',
    ];

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
