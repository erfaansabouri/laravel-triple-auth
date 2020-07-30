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

        if ($guard == "admin" && Auth::guard($guard)->check() && Auth::guard($guard)->user()->must_set_password == 0) {
            return redirect(route('admin.dashboard'));
        }
        elseif ($guard == "advisor" && Auth::guard($guard)->check() && Auth::guard($guard)->user()->must_set_password == 0) {
            return redirect(route('advisor.dashboard'));
        }
        elseif ($guard == "student" && Auth::guard($guard)->check() && Auth::guard($guard)->user()->must_set_password == 0) {
            return redirect(route('student.dashboard'));
        }
        return $next($request);
    }
}
