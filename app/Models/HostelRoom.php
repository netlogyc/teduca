<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelRoom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'hostel_id', 'room_type_id', 'bed', 'fee', 'description', 'status',
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(HostelRoomType::class, 'room_type_id');
    }

    public function hostelMembers()
    {
        return $this->hasMany(HostelMember::class, 'hostel_room_id', 'id');
    }
}
