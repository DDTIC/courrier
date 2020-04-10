@extends('layouts.gestionUsers')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$ser->count()}} Utilisateurs </h1>
	    <table class="table table-bordered" id="datatq">
	        <thead>
	               <table class="table table-bordered" id="myTable">
        <thead class="bg-success" style="color: white;">
            <tr>
                <th>Id</th>
                <th>Nom</th> 
                <th>Email</th>
                <th>Actions</th>              
            </tr>
        </thead>
	        <tbody>
	        	@foreach($ser as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->name}}</td>
			                <td>{{$di->email}}</td>
			              	<td>
			                	<a href="{{route('User.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('User.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Liste de employés" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('User.edit',$di)}}" data-toggle="modal" data-target="#myModalM_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>

                        <!-- Enregistrement d'un utilisateur-->
                    <div class="modal fade bd-example-modal-xl" id="myModalM_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-success" style="text-align: center;display: block;">
                                        <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFIER UN UTILISATEUR </h4>
                                    </div>
                                    <div class="modal-body">
                                <form method="POST" action="{{route('User.update',$di)}}">
                                    @csrf
                                    {{method_field('PUT')}}

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Groupe</label>

                                        <div class="col-md-6">
                                           <select class="form-control" name="gro">

                                                @foreach($grou as $dis)
                                                    @if($dis->id==$di->idGroupe)
                                                        <option value="{{$dis->id}}">{{$dis->libelleGroupe}}</option>
                                                    @endif
                                                @endforeach
                                                @foreach($grou as $dis)
                                                    @if($dis->id!=$di->idGroupe)
                                                        <option value="{{$dis->id}}">{{$dis->libelleGroupe}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Nom d'utilisateur</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $di->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $di->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
                                                Valider la modification
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" role="form" name="form" action="{{route('User.destroy',$di ?? '')}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');" >
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <div class="form-row">
                                                    <div class="col-sm-"></div>
                                                     <button type="submit" class="btn btn-danger form-group col-sm-2 "><i class="fa fa-trash icon-lg"></i> Supprimer</button>
                                                </div>
                                </form>             

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
			     @endforeach
	        </tbody>
	        <tfoot>
	        		
	        </tfoot>
	    </table>
	</div>
    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>

		<!-- Enregistrement d'un utilisateur-->
        <div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-xl">
			        <div class="modal-content">
			            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
			                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UN UTILISATEUR </h4>
			            </div>
			            <div class="modal-body">
					<form method="POST" action="{{route('User.store')}}">
                        @csrf
                        
                        <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Groupe</label>

                                        <div class="col-md-6">
                                           <select class="form-control" name="gro">
                                             @foreach($grou ?? '' as $dis)
                                                <option value="{{$dis->id}}">{{$dis->libelleGroupe}}</option>
                                             @endforeach
                                            </select>
                                        </div>
                         </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom d'utilisateur</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>

			            </div>
			            <div class="modal-footer">
			                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Fermer</button>
			            </div>
			        </div>
			    </div>
			</div>
		</div>          
@endsection
