<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportRoute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'fee', 'description', 'status',
    ];

    public function vehicles()
    {
        return $this->belongsToMany(TransportVehicle::class, 'transport_route_transport_vehicle', 'transport_route_id', 'transport_vehicle_id');
    }

    public function transportMembers()
    {
        return $this->hasMany(TransportMember::class, 'transport_route_id', 'id');
    }
}
