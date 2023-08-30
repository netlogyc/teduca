<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'capacity', 'warden_name', 'warden_contact', 'address', 'note', 'status',
    ];

    public function rooms()
    {
        return $this->hasMany(HostelRoom::class, 'hostel_id', 'id');
    }
}
