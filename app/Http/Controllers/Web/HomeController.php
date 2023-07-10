<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setCookie(Request $request) {
        //
        if(Cookie::get('sidebar') != 'navbar-collapsed'){
            Cookie::queue(Cookie::make('sidebar', 'navbar-collapsed', 60*60*24*365));
        }
        else{
            Cookie::queue(Cookie::make('sidebar', 'navbar-expeded', 60*60*24*365));
        }

        return response()->json(['data'=> Cookie::get('sidebar')]);
    }
}
