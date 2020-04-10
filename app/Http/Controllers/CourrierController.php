<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Structure;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CourrierController extends Controller
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
        //dd($cour->find(1)->structures->nomStruct);
        return view('pages.courriers.listeCourierD',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt]);
    }
////Courriers départ
    public function courrierDepart()
    {
        $type='en cours';
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::whereTypecourierAndEtat('Depart',1)->get();
         return view('pages.courriers.listeCourierD',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }

    public function courrierDepartImputer()
    {
        $type='imputés';
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::whereTypecourierAndEtat('Depart',2)->get();
         return view('pages.courriers.listeCourierD',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }

    public function courrierDepartTransmi()
    {
        $type='traités';
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::whereTypecourierAndEtat('Depart',3)->get();
         return view('pages.courriers.listeCourierD',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }


    

///Courrier arrivés
    public function courrierArrive()
    {
        $type='en cours';
        $ser = Structure::all();
        $agt = Agent::all();
         $cour = Courrier::whereTypecourierAndEtat('Arrive',1)->get();
        return view('pages.courriers.listeCourierA',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }

    public function courrierArriveImputer()
    {
        $type='imputés';
        $ser = Structure::all();
        $agt = Agent::all();
         $cour = Courrier::whereTypecourierAndEtat('Arrive',2)->get();
        return view('pages.courriers.listeCourierA',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }

    public function courrierArriveTransmi()
    {
        $type='traités';
        $ser = Structure::all();
        $agt = Agent::all();
         $cour = Courrier::whereTypecourierAndEtat('Arrive',3)->get();
        return view('pages.courriers.listeCourierA',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt,'name'=> $type]);
    }    
//CourrierConfidenttil
    public function courrierconfidentiel()
    {
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::where('natCourier','Confidentiel')->get();
        return view('pages.courriers.listeCourierA',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt]);
    }


    public function indexs()
    {
        $ser = Structure::all();
        $agt = Agent::all();
        $cour = Courrier::all();
        return view('pages.courriers.index',['cour'=> $cour,'ser'=> $ser,'agt'=> $agt]);
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
     
        $ddd=Courrier::create(['idStruct'=>$request->idStruc,'natCourier'=>$request->natCour,'typeCourier'=>$request->typeCour,'numPiece'=>$request->numPieceCour,'destExp'=>$request->Dest,'datePiece'=>$request->datePieceCour,'objet'=>$request->objetCour,'observation'=>$request->Obser,'dateArrivee'=>$request->dateA]);

        flash('Courrier ajouter avec succes!');
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
         $dis=Courrier::findOrFail($id);
        $dis->update((['etat'=>3]));
            flash('Courrier validé avec succes!');
         return back();
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
        $dis=Courrier::findOrFail($id);
        $dis->update((['idStruct'=>$request->idStruc,'natCourier'=>$request->natCour,'typeCourier'=>$request->typeCour,'numPiece'=>$request->numPieceCour,'destExp'=>$request->Dest,'datePiece'=>$request->datePieceCour,'objet'=>$request->objetCour,'observation'=>$request->Obser,'dateArrivee'=>$request->dateA]));
        flash('Courrier modifié avec succes!');        
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
        $dis=Courrier::findOrFail($id);
        if($dis->etat==1){
        Courrier::destroy($id);
        flash('Courrier supprimé avec succes!','danger');
        }

        else {
            flash('Le courrier ne peut être supprimé car déja transmi!','danger');
        }

        return back();
    }

}
