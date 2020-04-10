<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Direction;
use App\Models\Service;
use App\Models\Fonction;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ser = Service::all();
        $agt = Agent::all();
        $fonc = Fonction::all();
        return view('pages.agents.listeAgent',['agt'=> $agt,'ser'=> $ser,'fonct'=> $fonc]);
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
        $ddd=Agent::create(['idFonction'=>$request->idFonc,'idService'=>$request->idServ,'mleAgent'=>$request->mleAg,'nomAgent'=>$request->nomAg,'prenomAgent'=>$request->prenomAg,'emailAgent'=>$request->emailAg,'telAgent'=>$request->telAg]);

        flash('Agent crés avec succes!');
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
        //
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
        $dis=Agent::findOrFail($id);
        $dis->update(['idFonction'=>$request->idFonc,'idService'=>$request->idServ,'mleAgent'=>$request->mleAg,'nomAgent'=>$request->nomAg,'prenomAgent'=>$request->prenomAg,'emailAgent'=>$request->emailAg,'telAgent'=>$request->telAg]);
        flash('Agent modifier avec succes!');
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
        Agent::destroy($id);
        flash('Structure modifier avec succes!','danger');
        return back();
    }
}
