<?php

namespace App\Http\Controllers;

use App\Diretion;
use Illuminate\Http\Request;

class DiretionController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diretion  $diretion
     * @return \Illuminate\Http\Response
     */
    public function show(Diretion $diretion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diretion  $diretion
     * @return \Illuminate\Http\Response
     */
    public function edit(Diretion $diretion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diretion  $diretion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diretion $diretion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diretion  $diretion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diretion $diretion)
    {
        //
    }
}
