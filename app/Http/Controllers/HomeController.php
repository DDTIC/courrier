<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Structure;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    
        if(Auth::user()->idGroupe==3){
         return view('home');
        }
        elseif(Auth::user()->idGroupe==2){
            $ser = Structure::all();
            $agt = Agent::all();
            $cour = Courrier::where('typeCourier','Arrive')->get();
            return view('pages.courriers.listeCourierA1',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt]);
        }
        
        elseif (Auth::user()->idGroupe==1 ){
            $ser = Structure::all();
            $agt = Agent::all();
            $cour = Courrier::where('typeCourier','Depart')->get();
             return view('pages.courriers.listeCourierD1',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt]);
        }
    }
}
