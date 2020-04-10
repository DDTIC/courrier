@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$ser->count()}} Services </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Numero direcion</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Nom du service</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($ser->count()>0)
	        	<tbody>
	        		@foreach($ser as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->numDirection}}</td>
			                <td>{{$di->nomService}}</td>
			                <td>
			                	<a href="{{route('Service.show',$di)}}" data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Service.employe.index',$di)}}" title="Liste de employés" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Service.edit',$di)}}" data-toggle="modal" data-target="#myModal_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>

						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog modal-70">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Services </h4>
					            </div>
					            <div class="modal-body">
									<p> <strong>Numero de service : </strong>  {{$di->numDirection}}</p>
									<p> <strong>Nom du service : </strong> {{$di->nomService}}</p>

					        	</div>
					    	</div>
					    </div>
			             <!-- Modal d'enregistrement de Service-->
						<div class="modal fade" id="myModal_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog modal-70">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFICATION DU SERVICE </h4>
					            </div>
					            <div class="modal-body">
									  <form class="form-horizontal" role="form" name="form" action="{{route('Service.update',$di)}}" method="POST">
									  	{{csrf_field()}}
									  		{{method_field('PUT')}}

									  	<div class="form-group">
									        <label for="inputEmail1" class="col-sm-8 control-label">Direction</label>
									        <div class="form-group">
								                <select class="form-control" name="numDir">
													@foreach($dir ?? '' as $dis)
								                	@if($dis->id==$di->numDirection)
								                    <option value="{{$dis->id}}">{{$dis->nomDirection}}</option>
								                    @endif
								                    @endforeach
								                	@foreach($dir ?? '' as $dis)
								                	@if($dis->id!=$di->numDirection)
								                    <option value="{{$dis->id}}">{{$dis->nomDirection}}</option>
								                    @endif
								                    @endforeach
								                </select>
								            </div>
									    </div>
									    <div class="form-group">
									        <label for="inputPassword1" class="col-sm-4 control-label">Nom du service</label>
									        <div class="col-sm-20">
									            <input type="text" name="nomServ" class="form-control" id="inputPassword1" required="true" value="{{$di->nomService}}">
									        </div>
									    </div>
									    <div class="form-group">
									        <div class="col-sm-offset-4 col-sm-20">
									            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider la modification</button>
									        </div>
									    </div>
									</form>

									<form class="form-horizontal" style="display:inline-block;" role="form" name="form" action="{{route('Service.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');">
									  	{{csrf_field()}}
									  	{{method_field('DELETE')}}
									    <button type="submit" class="btn btn-danger "><i class="fa fa-trash icon-lg"></i> Supprimer</button>
									 </form>
					            </div>
					            <div class="modal-footer">
					                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Annuler</button>
					            </div>
					        </div>
					    </div>
					    </div>	      
	        		@endforeach
	        	</tbody>
	    </table>
	    	 @else
	        	<p>Aucune Service n'a été enregistrée pour le moment</p>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>
<!-- Modal d'enregistrement de Service-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-60">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UN SERVICE </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Service.store')}}" method="POST">
					  	{{csrf_field()}}
					    <div class="form-group">
					        <label for="inputEmail1" class="col-sm-8 control-label">Direction</label>
					        <div class="form-group">
				                <select class="form-control" name="numDir">
				                	@foreach($dir ?? '' as $di)
				                    <option value="{{$di->id}}">{{$di->nomDirection}}</option>
				                    @endforeach
				                </select>
				            </div>
					    </div>
					    <div class="form-group">
					        <label for="inputPassword1" class="col-sm-4 control-label">Nom du service</label>
					        <div class="col-sm-20">
					            <input type="text" name="nomServ" class="form-control" id="inputPassword1" placeholder="Ex: Secretariat" required="true">
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-offset-4 col-sm-20">
					            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider</button>
					            <button type="button" class="btn btn-default"><i class="fa fa-times icon-lg"></i> Annule</button>
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

