<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HostelRoom;

class HostelController extends Controller
{
    public function filterRoom(Request $request)
    {
        //
        $data=$request->all();

        $rooms = HostelRoom::where('hostel_id', $data['hostel'])->where('status', '1')->get();

        $booked_rooms = array();
        foreach($rooms as $room){
        	if($room->bed <= $room->hostelMembers->where('status', '1')->count()){
        		array_push($booked_rooms, $room->id);
        	}
        }

        $available_rooms = HostelRoom::where('hostel_id', $data['hostel'])->whereNotIn('id', $booked_rooms)->where('status', '1')->orderBy('name', 'asc')->get();

        return response()->json($available_rooms);
    }
}
