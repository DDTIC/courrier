<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Service;
use App\Models\Fonction;
use App\Models\Agent;

class serviceController extends Controller
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
        $dir = Direction::all();
        $ser = Service::all();
        return view('pages.services.listeServices',['Serv'=> $ser,'dir'=> $dir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$ddd=Service::create(['nomService'=>'Ma première Service','localisation'=>'Ouaga']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $ddd=Service::create(['idDirection'=>$request->idDir,'nomService'=>$request->nomServ,'sigleService'=>$request->sigleServ,'emailService'=>$request->emailServ,'telService'=>$request->telServ]);
        flash('Service cré avec succes!');
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
        $agt = Agent::whereidservice($id)->get();;
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
        $ser=Service::findOrFail($id);
        return view('pages.Services.edit',compact('ser'));
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
       //$this->validate($request,[
         //   'nomSev'=>'required|min:2',
           // 'numDir'=>'required'
        //]);

        $dis=Service::findOrFail($id);
        $dis->update(['idDirection'=>$request->idDir,'nomService'=>$request->nomServ,'sigleService'=>$request->sigleServ,'emailService'=>$request->emailServ,'telService'=>$request->telServ]);
        flash('Service modifier avec succes!');
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
        
        Service::destroy($id);
        flash('Service supprimé avec succes!','danger');
        return back();
    }
}