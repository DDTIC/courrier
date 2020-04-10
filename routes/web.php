<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\service;

Route::resource('Structure','structureController')->middleware('admin');
Route::resource('Structure.direction','directionsDeStructure')->middleware('admin');
Route::resource('Direction','directionController')->middleware('admin');
Route::resource('Direction.service','servicesDirection')->middleware('admin');
Route::resource('Service','serviceController')->middleware('admin');
//Route::resource('Service.employe','employesDeServiceController');
Route::resource('Fonction','FonctionController')->middleware('admin');
Route::resource('Agent','AgentController')->middleware('admin');
Route::resource('Courrier','courrierController');
Route::resource('CourierTransmi','courierTransmiController');
Route::resource('User','UsersController')->middleware('admin');
Route::resource('Groupe','GroupeController')->middleware('admin');
Route::resource('Role','RoleController')->middleware('admin');

//Route::get('User','UsersController@index')->name('lesUsers');
//Route::get('User', ['uses'=>'UsersController@index', 'as'=>'users.index']);
Route::get('/','AccueilController@accueil')->middleware('admin');
Route::get('/Accueil','courrierController@indexs')->middleware('admin');
Route::get('/Administration','UsersController@indexs')->middleware('admin');

Route::get('/validerCourrier','courrierController@valider');

Route::get('/CourrierDepart','courrierController@courrierDepart')->middleware('courrierD');
Route::get('/CourrierDepartTransmis','courierTransmiController@courierDepartTransmi')->middleware('courrierD');
Route::get('/CourrierDepartTraite','courrierController@courrierDepartTransmi')->middleware('courrierD');
Route::get('/CourrierDepartImpute','courrierController@CourrierDepartImputer')->middleware('courrierD');

Route::get('/CourrierArrive','courrierController@courrierArrive')->middleware('courrierA');
Route::get('/CourrierArriveTransmis','courierTransmiController@courierArriveTransmi')->middleware('courrierA');
Route::get('/CourrierArriveTraite','courrierController@courrierArriveTransmi')->middleware('courrierA');
Route::get('/CourrierArriveImpute','courrierController@courrierArriveImputer')->middleware('courrierA');

Route::get('/test', function () {
    return view('test');
});



//Route::get('/users', function () {
  //  return view('/pages/users/listeUsers');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
