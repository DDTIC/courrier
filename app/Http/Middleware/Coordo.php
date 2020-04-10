<?php

namespace App\Http\Middleware;

use Closure;

class Coordo
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
             
            if(Auth::user()->idGroupe==2 || Auth::user()->idGroupe==4){
                return $next($request);
            }    
            else {
               return back();
               flash('Structure créée avec succes!');
            }
        }
        return $next($request);  
    }
    }
}
