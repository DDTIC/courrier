<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Models\Groupe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
        

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function groupes(){
        return $this->hasMany('App\Models\Groupe');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
       // dd(Auth::user()->groupes);
        //$ser = User::all();
        $grou=Groupe::All();
        $users =User::All();
        return view('pages.users.listeUsers',['ser'=>$users,'grou'=>$grou]);
        //return Datatables()->of($users)->make(true);        
        
    }


    public function indexs()
    {   

        $users =User::All();
        return view('pages.users.index',['ser'=>$users]);
        //return Datatables()->of($users)->make(true);
        //$ser = User::all();
        
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
         $ddd=User::create(['idGroupe'=>$request->gro,'name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
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
       //$this->validate($request,[
         //   'nomSev'=>'required|min:2',
           // 'numDir'=>'required'
        //]);

        $dis=User::findOrFail($id);
        $dis->update(['idGroupe'=>$request->gro,'name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
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
        
        User::destroy($id);
        return back();
    }
}
