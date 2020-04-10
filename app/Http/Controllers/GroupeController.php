<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Role;
use App\Models\Grouperole;
use Illuminate\Http\Request;

class GroupeController extends Controller
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
         $grou = Groupe::all();
         $rol = Role::all();
         $gRol = Grouperole::all();
        //$dir= Direction::whereNumstructure($id)->get();
        return view('pages.users.listeGroupe',['grou'=> $grou,'rol'=> $rol,'gRol'=> $gRol]);
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
        $ddd=Groupe::create(['libelleGroupe'=>$request->libelleGrou]);
        $grou = Groupe::All();
        $grou= $grou->last()->id;
        $dd=Grouperole::create(['idGroupe'=>$grou,'idRole'=>$request->roleG]);
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
        //$grou = Groupe::all();
        //return view('pages.agents.listeAgent',['grout'=> $grou]);
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
        $ddd=Groupe::findOrFail($id);
        $idGrou = $ddd->id;
        $ddd->update(['libelleGroupe'=>$request->libelleGrou]);
        $ds= Grouperole::where('idGroupe','=',$idGrou);
        if($ds->count()>0){
        $ds->update(['idGroupe'=>$idGrou,'idRole'=>$request->roleG]);}
        else{
        $ds->create(['idGroupe'=>$idGrou,'idRole'=>$request->roleG]);}
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
        $grou = Grouperole::where('idGroupe','=',$id)->first()->id;
        Grouperole::destroy($grou);
        Groupe::destroy($id);
        return back();
    }
}
