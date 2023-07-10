<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_time', 'end_time', 'date', 'attendance', 'note', 'created_by', 'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
