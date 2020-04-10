<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Service;
use App\Models\Agent;

class FonctionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fonct = Fonction::all();
        //$dir= Direction::whereNumstructure($id)->get();
        return view('pages.fonctions.listeFonction',['fonct'=> $fonct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ddd=Fonction::create(['libelleFonction'=>$request->libelleFonc]);
        flash('Fonction crée avec succes!');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ser = Service::all();
        $agt = Agent::whereidfonction($id)->get();;
        $fonc = Fonction::all();
        return view('pages.agents.listeAgent',['agt'=> $agt,'ser'=> $ser,'fonct'=> $fonc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ddd=Fonction::findOrFail($id);
        $ddd->update(['libelleFonction'=>$request->libelleFonc]);

        flash('Fonction modifiée avec succes!');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fonction::destroy($id);
        flash('Fonction supprimée avec succes!','danger');
        return back();
    }
}
