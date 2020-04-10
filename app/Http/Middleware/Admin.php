<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()==true){
             
            if(Auth::user()->idGroupe==3){
             //return redirect('home');
                return $next($request);
            }    
            else {
               return back();
            }
        }
        return $next($request);  
    }
}
