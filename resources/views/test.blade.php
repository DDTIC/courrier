@extends('layouts.admin')

@section('content')
  <hr>	
	 <div class="card-deck">
                        <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-building fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Structures</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Structure" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-home fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Directions</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="DIrection" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-sitemap fa-8x fa-rotate-180" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Services</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Service" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-users fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Agents</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Agent" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                              
                    </div>
                <hr>

                    <div class="card-deck">
                        <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-paper-plane fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Courriers</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Accueil" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-save fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Courriers archivés</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-check fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Courriers traités</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                       <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-spinner fa-8x fa-spin" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title">Courriers en cours</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                              
                    </div>
                <hr>

@endsection

