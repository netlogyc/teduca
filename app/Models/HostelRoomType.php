<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelRoomType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'fee', 'description', 'status',
    ];

    public function rooms()
    {
        return $this->hasMany(HostelRoom::class, 'room_type_id', 'id');
    }
}
