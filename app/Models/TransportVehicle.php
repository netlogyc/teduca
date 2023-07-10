<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportVehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'type', 'model', 'capacity', 'year_made', 'driver_name', 'driver_license', 'driver_contact', 'note', 'status',
    ];

    public function transportRoutes()
    {
        return $this->belongsToMany(TransportRoute::class, 'transport_route_transport_vehicle', 'transport_vehicle_id', 'transport_route_id');
    }

    public function transportMembers()
    {
        return $this->hasMany(TransportMember::class, 'transport_vehicle_id', 'id');
    }
}
