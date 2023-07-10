<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class AddressController extends Controller
{
    public function filterDistrict(Request $request)
    {
        //
        $data=$request->all();

        $districts = District::where('province_id', $data['province'])->where('status', '1')->orderBy('title', 'asc')->get();

        return response()->json($districts);
    }
}
