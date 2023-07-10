<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsUserBanned
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
        if (Auth::guard('student')->check()) {

            if (Auth::guard('student')->user()->login == 0) {
                $message = __('auth_account_blocked');

                Auth::guard('student')->logout();
                return redirect()->route('student.login')->with('error', $message);
            }
        }

        if (Auth::guard('web')->check()) {

            if (Auth::guard('web')->user()->login == 0) {
                $message = __('auth_account_blocked');

                Auth::guard('web')->logout();
                return redirect()->route('login')->with('error', $message);
            }
        }

        return $next($request);
    }
}
