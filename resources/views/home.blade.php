@extends('layouts.application')

@section('content')
<hr>
                    <div class="card-deck">
                        <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-building fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 08 Structures</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Structure" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-home fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 20 Directions</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Direction" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-sitemap fa-8x fa-rotate-180" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 45 Services</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Service" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-users fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 127 Agents</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Agent" class="btn btn-success">Plus de détails</a>
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
                            <h3 class="card-title"> 1123 Courriers</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-save fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 54 Courriers archivés</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-check fa-8x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 745 Courriers traités</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                       <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-spinner fa-8x fa-spin" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h3 class="card-title"> 34 Courriers en cours</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="/Courier" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                              
                    </div>
                <hr>
@endsection
