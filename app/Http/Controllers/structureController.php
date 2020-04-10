<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Direction;

class structureController extends Controller
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
        $struct = Structure::all();
        //$dir= Direction::whereNumstructure($id)->get();
        return view('pages.structures.listeStructure',['struct'=> $struct]);
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
        $ddd=Structure::create(['nomStruct'=>$request->nomStru,'sigleStruct'=>$request->sigleStru,'adrStruct'=>$request->adrStru,'emailStruct'=>$request->emailStru,'telStruct'=>$request->telStru]);
            flash('Structure créée avec succes!');
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
        $ddd=Structure::findOrFail($id);
        $ddd->update(['nomStruct'=>$request->nomStru,'sigleStruct'=>$request->sigleStru,'adrStruct'=>$request->adrStru,'emailStruct'=>$request->emailStru,'telStruct'=>$request->telStru]);
        
            flash('Structure modifier avec succes!','danger');
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
        Structure::destroy($id);
        flash('Structure supprimée avec succes!','danger');
        return back();
    }
}
