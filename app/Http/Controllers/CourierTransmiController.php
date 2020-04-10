<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Structure;
use App\Models\Courrier;
use App\Models\CourierTransmi;
use Illuminate\Http\Request;

class CourierTransmiController extends Controller
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
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::all();
        $courT = CourierTransmi::all();
        return view('pages.courriers.listeCourriersTransmis',['cour'=> $cour,'courT'=> $courT,'ser'=> $ser,'agt'=> $agt]);
    }


    public function courierDepartTransmi()
    {
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::whereTypecourierAndEtat('Depart',1)->get();
        $courT = CourierTransmi::whereTypecourier('Depart')->get();
        return view('pages.courriers.listeCourriersTransmisD',['cour'=> $cour,'courT'=> $courT,'ser'=> $ser,'agt'=> $agt]);
    }

    public function courierArriveTransmi()
    {
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::whereTypecourierAndEtat('Arrive',1)->get();
        $courT = CourierTransmi::whereTypecourier('Arrive')->get();
        return view('pages.courriers.listeCourriersTransmisA',['cour'=> $cour,'courT'=> $courT,'ser'=> $ser,'agt'=> $agt]);
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
    public function store(Request $request){

        $ddd=CourierTransmi::create(['idCourier'=>$request->idCour,'idAgent'=>$request->idAg,'typeCourier'=>$request->typeCour,'dateTransmission'=>$request->dateTrans,'transmis'=>$request->trans,'actuel'=>$request->actu,'observation'=>$request->observ]);

       $dis=Courrier::findOrFail($request->idCour);
       $dis->update((['etat'=>2]));
       flash('Courrier transmi avec succes!');
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
        $dis=CourierTransmi::findOrFail($id);
        $dis->update((['idCourier'=>$request->idCour,'idAgent'=>$request->idAg,'typeCourier'=>$request->typeCour,'dateTransmission'=>$request->dateTrans,'transmis'=>$request->trans,'actuel'=>$request->actu,'observation'=>$request->observ]));
            flash('Courrier transmi modifier avec succes!');
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
        CourierTransmi::destroy($id);
        return back();
    }
}
