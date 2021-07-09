<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        if(Auth::user()->status=='active'){

            return $next($request);
        }else{
                Auth::logout();
                return redirect('/login')->with('LoginError','User Account not Active.....');

            }

        }else{
            return redirect()->back()->with('LoginError','You need to login first.....');
        }
    }
}
