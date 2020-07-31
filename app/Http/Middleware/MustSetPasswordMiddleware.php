<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MustSetPasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard)
    {

        if($guard == 'admin' && Auth::guard('admin')->user()->must_set_password == 1){
            return redirect(route('admin.reset.password'));
        }

        if($guard == 'advisor' && Auth::guard('advisor')->user()->must_set_password == 1){
            return redirect(route('advisor.reset.password'));
        }

        if($guard == 'student' && Auth::guard('student')->user()->must_set_password == 1){
            return redirect(route('student.reset.password'));
        }



        return $next($request);
    }
}
