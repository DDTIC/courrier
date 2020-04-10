@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$struct->count()}} Structures </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Nom</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Sigle</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Adresse</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Email</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($struct->count()>0)
	        	<tbody>
	        		@foreach($struct as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->nomStruct}}</td>
			                <td>{{$di->sigleStruct}}</td>
			                <td>{{$di->adrStruct}}</td>
			                <td>{{$di->emailStruct}}</td>
			                <td>
			                	<a href="{{route('Structure.index')}}" data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details Structure" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Structure.direction.index',$di)}}" title="Liste des services" data-placement="left" data-toggle="tooltip"><i class="fa fa-list"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>			                	
			                	<a href="{{route('Structure.edit',$di)}}" data-toggle="modal" data-target="#myModal_{{$di->id}}" title="Modifier la Structure" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>

				<!-- Modal  detais  -->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Structure </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>Nom de structure : </strong></p>  <p class="col-md-6">{{$di->nomStruct}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Sigle : </strong></p>  <p class="col-md-6">{{$di->sigleStruct}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Adresse : </strong></p> <p class="col-md-6">{{$di->adrStruct}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Email : </strong></p> <p class="col-md-6">{{$di->emailStruct}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Telephone : </strong></p> <p class="col-md-6">{{$di->telStruct}}</p>
							            </div>												
					        	</div>
					    	</div>
					    </div>
					    </div>
			             <!-- Modal d'enregistrement de Structure-->

							<div class="modal fade bd-example-modal-xl" id="myModal_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-xl">
							        <div class="modal-content">
							            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
							                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFIER UNE STRUCTURE </h4>
							            </div>
							            <div class="modal-body">
											 <form class="form-horizontal" role="form" name="form" action="{{route('Structure.update',$di)}}" method="POST">
									  				{{csrf_field()}}
									  				{{method_field('PUT')}}
											 	<div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Structure</label>
												        <div class="col-sm-20">
												            <input type="text" name="nomStru" class="form-control" id="inputEmail1" value="{{$di->nomStruct}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
												        <div class="col-sm-20">
												            <input type="text" name="sigleStru" class="form-control" id="inputPassword1" value="{{$di->sigleStruct}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
												        <div class="col-sm-20">
												            <input type="text" name="adrStru" class="form-control" id="inputPassword1" value="{{$di->adrStruct}}" required="true">
												        </div>
												    </div>
												  </div>
												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
												        <div class="col-sm-20">
												            <input type="Email" name="emailStru" class="form-control" id="inputPassword1" value="{{$di->emailStruct}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
												        <div class="col-sm-20">
												            <input type="text" name="telStru" class="form-control" id="inputPassword1" value="{{$di->telStruct}}" required="true">
												        </div>
												    </div>						    
												  </div>

												  <div class="form-row">


												    <div class="form-group col-sm-4">
												        <div class="col-sm-offset-4 col-sm-12">
												            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider la modification</button>
												    </div>
											  		</div>
											  		</div>
											</form>

											<form class="form-horizontal" role="form" name="form" action="{{route('Structure.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');"										>
									  			{{csrf_field()}}
									  			{{method_field('DELETE')}}
									    		<button type="submit" class="btn btn-danger "><i class="fa fa-trash icon-lg"></i> Supprimer le structure</button>
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
	    </table>
	    	 @else
	        	<p>Aucune Structure n'a été enregistrée pour le moment</p>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>
<!-- Modal d'enregistrement de Structure-->
	<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UNE STRUCTURE </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Structure.store')}}" method="post">
					  	{{csrf_field()}}
					 	<div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Structure</label>
						        <div class="col-sm-20">
						            <input type="text" name="nomStru" class="form-control" id="inputEmail1" placeholder="Ex: DRH" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
						        <div class="col-sm-20">
						            <input type="text" name="sigleStru" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
						        <div class="col-sm-20">
						            <input type="text" name="adrStru" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
						        <div class="col-sm-20">
						            <input type="Email" name="emailStru" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
						        <div class="col-sm-20">
						            <input type="text" name="telStru" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>						    
						  </div>

						  <div class="form-row">


						    <div class="form-group col-sm-4">
						        <div class="col-sm-offset-4 col-sm-20">
						            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider</button>
						            <button type="button" class="btn btn-default"><i class="fa fa-times icon-lg"></i> Annule</button>
						        </div>
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
@stop

