<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelMember extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hostelable_id', 'hostelable_type', 'hostel_room_id', 'start_date', 'end_date', 'note', 'status', 'created_by', 'updated_by',
    ];

    // Polymorphic relations
    public function hostelable()
    {
        return $this->morphTo();
    }

    public function room()
    {
        return $this->belongsTo(HostelRoom::class, 'hostel_room_id');
    }
}
