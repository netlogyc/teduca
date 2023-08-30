<?php

namespace App\Http\Controllers;

use App\Models\TransportVehicle;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function filterVehicle(Request $request)
    {
        //
        $data=$request->all();

        $vehicles = TransportVehicle::with('transportRoutes')->whereHas('transportRoutes', function ($query) use ($data){
                $query->where('transport_route_id', $data['route']);
            })->where('status', '1')->orderBy('number', 'asc')->get();

        return response()->json($vehicles);
    }
}
