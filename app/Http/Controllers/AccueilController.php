<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class AccueilController extends Controller
{

        public function accueil()
    {

	   // $ddd=Service::create(['nomService'=>'Mon premier Service','numDirection'=>1]);
		//$ddd->save();

		//dd(Service::all());
        return view('auth.login');
    }
}
