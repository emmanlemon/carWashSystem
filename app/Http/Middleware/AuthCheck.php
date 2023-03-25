<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('loginId')){
            if(Session::get('role') === 'superadmin'){
                return $next($request);
            }elseif(Session::get('role') === 'admin'){
                return $next($request);
            }elseif(Session::get('role') === 'customer'){
                return $next($request);
            }
        }else{
            return redirect('/')->with('message', 'Access Denied');     
           }
    }
}
