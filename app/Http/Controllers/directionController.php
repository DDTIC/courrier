<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Direction;
use App\Models\Service;

class directionController extends Controller
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
        $dir = Direction::all();    
        return view('pages.directions.listeDirections',['struct'=> $struct,'dir'=> $dir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$ddd=Direction::create(['nomDirection'=>'Ma première direction','localisation'=>'Ouaga']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'nomDir'=>'required|min:2',
        ]);

        $ddd=Direction::create(['idStruct'=>$request->idStru,'nomDirection'=>$request->nomDir,'sigleDirection'=>$request->sigleDir,'emailDirection'=>$request->emailDir,'telDirection'=>$request->telDir]);
        flash('Direction crée avec succes!');
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
        $dis=Direction::findOrFail($id);
        return view('pages.directions.edit',compact('dis'));
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
       $this->validate($request,[
            'nomDir'=>'required|min:2',
        ]);

        $dis=Direction::findOrFail($id);
        $dis->update((['idStruct'=>$request->idStru,'nomDirection'=>$request->nomDir,'sigleDirection'=>$request->sigleDir,'emailDirection'=>$request->emailDir,'telDirection'=>$request->telDir]));
        flash('Direction modifier avec succes!');
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
        
        Direction::destroy($id);
        flash('Direction modifier avec succes!','danger');
        return back();
    }
}
