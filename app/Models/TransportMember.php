<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportMember extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transportable_id', 'transportable_type', 'transport_route_id', 'transport_vehicle_id', 'start_date', 'end_date', 'note', 'status', 'created_by', 'updated_by',
    ];

    // Polymorphic relations
    public function transportable()
    {
        return $this->morphTo();
    }

    public function transportRoute()
    {
        return $this->belongsTo(TransportRoute::class, 'transport_route_id');
    }

    public function transportVehicle()
    {
        return $this->belongsTo(TransportVehicle::class, 'transport_vehicle_id');
    }
}
