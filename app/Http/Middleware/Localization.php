<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       if(Session::has('locale'))
       {
           \App::setlocale(Session::get('locale'));
       }
       else
       {
           $language = Language::where('default', '1')->first();
           if(isset($language->code))
           {
               \App::setlocale($language->code);
           }
       }
       
       return $next($request);
    }
}
