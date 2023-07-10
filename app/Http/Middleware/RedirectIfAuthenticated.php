<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if($guard == "student"){

                //student was authenticated with student guard.
                return redirect()->route('student.dashboard.index');
            } elseif($guard == "web"){

                //staff was authenticated with web guard.
                return redirect()->route('admin.dashboard.index');
            } else {
                
                //default guard.
                return redirect()->route('admin.dashboard.index');
            }

        }

        return $next($request);
    }
}
