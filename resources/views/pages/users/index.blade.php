@extends('layouts.gestionUsers')

@section('content')


<hr>
                    <div class="card-deck">
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-user-plus fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title">Les utilisateurs</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="User" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-users fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title">Les groupes</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Groupe" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>
                      <div class="card" style="width: 18rem;">
                          <div class="card-header" ">{{ __('') }}
                                <i class="fa fa-user-secret fa-10x" style="display: block; text-align: center; color: green;"></i>
                          </div>
                          <div class="card-body">
                            <h1 class="card-title">Les roles</h1>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="Role" class="btn btn-success">Plus de détails</a>
                          </div>
                       </div>                                                                     
                    </div>
                <hr>                  
@endsection

