<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\User;

class InventoryController extends Controller
{
    public function filterItem(Request $request)
    {
        //
        $data=$request->all();

        $items = Item::where('category_id', $data['category'])->where('status', '1')->orderBy('name', 'asc')->get();

        return response()->json($items);
    }

    public function filterQuantity(Request $request)
    {
        //
    	$data=$request->all();

        $item = Item::where('id', $data['item'])->where('status', '1')->first();

        if(count($item->stocks) > 0){
        	$stocks = $item->stocks->where('status', '1')->sum('quantity');
        }
        else{
        	$stocks = 0;
        }
        if(count($item->issues) > 0){
        	$issues = $item->issues->where('status', '<=', '1')->sum('quantity');
        }
        else{
        	$issues = 0;
        }
        $quantity = $stocks - $issues;

        return response()->json($quantity);
    }

    public function filterDepartment(Request $request)
    {
        //
        $data=$request->all();

        $users = User::where('department_id', $data['department'])->where('status', '1')->orderBy('staff_id', 'asc')->get();

        return response()->json($users);
    }
}
