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
        if($guard == 'admin'){
            if(Auth::guard('admin')->user()->must_set_password == 1){
                return redirect(route('admin.reset.password'));
            }
        }

        if($guard == 'student'){
            if(Auth::guard('student')->user()->must_set_password == 1){
                return redirect(route('student.reset.password'));
            }
        }

        if($guard == 'advisor'){
            if(Auth::guard('advisor')->user()->must_set_password == 1){
                return redirect(route('advisor.reset.password'));
            }
        }


        return $next($request);
    }
}
