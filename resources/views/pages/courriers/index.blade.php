@extends('layouts.courier')

@section('content')


<hr>
                    <div class="card-deck">
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-paper-plane fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title">435 Courriers départs</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courrier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-paper-plane fa-10x fa-rotate-180" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title"> 65 Courriers arrivés</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courrier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-spinner fa-10x fa-spin" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title"> 21 Courriers en cours</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courrier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                                                     
                    </div>
                <hr>
                    <div class="card-deck">
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-envelope fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title"> 65 Courriers Transmis</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/CourierTransmi" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                                                   
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-check fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title"> 76 Courriers traités</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courrier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                    	
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-save fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title">34 Courriers archivés</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courrier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                    </div>
                <hr>    
@endsection

