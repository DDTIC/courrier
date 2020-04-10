@extends('layouts.admin')

@section('content')
<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$Serv->count()}} Services </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Nom</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Sigle</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Email</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($Serv->count()>0)
	        	<tbody>
	        		@foreach($Serv as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->nomService}}</td>
			                <td>{{$di->sigleService}}</td>
			                <td>{{$di->emailService}}</td>
			                <td>
			                	<a href="{{route('Service.index')}}" data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details Service" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Service.show',$di)}}" title="Liste des Agents" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>			                	
			                	<a href="{{route('Service.edit',$di)}}" data-toggle="modal" data-target="#myModal_{{$di->id}}" title="Modifier la Service" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>


			            <!-- Modal  detais  -->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Service </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>Nom du Service : </strong></p>  <p class="col-md-6">{{$di->nomService}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Sigle : </strong></p>  <p class="col-md-6">{{$di->sigleService}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Adresse : </strong></p> <p class="col-md-6">{{$di->adrService}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Email : </strong></p> <p class="col-md-6">{{$di->emailService}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Telephone : </strong></p> <p class="col-md-6">{{$di->telService}}</p>
							            </div>												
					        	</div>
					    	</div>
					    </div>
					    </div>

			             <!-- Modal d'enregistrement de Service-->

						<div class="modal fade bd-example-modal-xl" id="myModal_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-xl">
							        <div class="modal-content">
							            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
							                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFIER UNE Service </h4>
							            </div>
							            <div class="modal-body">
											  <form class="form-horizontal" role="form" name="form" action="{{route('Service.update',$di)}}" method="post">
											  	{{csrf_field()}}
											  	{{method_field('PUT')}}
											 	<div class="form-row">
													<div class="form-group col-sm-4">
												        <label for="inputEmail1" class="col-sm-8 control-label">Structure</label>
												    	<select class="form-control" name="idDir">
										                	@foreach($dir ?? '' as $dis)
										                    <option value="{{$dis->id}}">{{$dis->nomDirection}}</option>
										                    @endforeach
										                </select>
												    </div>
												  </div>
												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Drection</label>
												        <div class="col-sm-20">
												            <input type="text" name="nomServ" class="form-control" id="inputEmail1" value="{{$di->nomService}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
												        <div class="col-sm-20">
												            <input type="text" name="sigleServ" class="form-control" id="inputPassword1" value="{{$di->sigleService}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
												        <div class="col-sm-20">
												            <input type="text" name="adrServ" class="form-control" id="inputPassword1" value="{{$di->adrService}}" required="true">
												        </div>
												    </div>
												  </div>
												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
												        <div class="col-sm-20">
												            <input type="Email" name="emailServ" class="form-control" id="inputPassword1" value="{{$di->emailService}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
												        <div class="col-sm-20">
												            <input type="text" name="telServ" class="form-control" id="inputPassword1" value="{{$di->telService}}" required="true">
												        </div>
												    </div>						    
												  </div>

												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <div class="col-sm-offset-4 col-sm-20">
												            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider les modifications</button>
												            <button type="button" class="btn btn-default"><i class="fa fa-times icon-lg"></i> Annule</button>
												        </div>
												    </div>
											  </div>
											</form>

											<form class="form-horizontal" style="display:inline-block;" role="form" name="form" action="{{route('Service.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');" >
									  			{{csrf_field()}}
									  			{{method_field('DELETE')}}
									   			 <button type="submit" class="btn btn-danger "><i class="fa fa-trash icon-lg"></i> Supprimer</button>
									 		</form>
							            </div>
							            <div class="modal-footer">
							                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Fermer</button>
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

<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UN SERVICE </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Service.store')}}" method="post">
					  	{{csrf_field()}}
					 	<div class="form-row">
							<div class="form-group col-sm-4">
						        <label for="inputEmail1" class="col-sm-8 control-label">Direction</label>
						    	<select class="form-control" name="idDir">
				                	@foreach($dir ?? '' as $dis)
				                    <option value="{{$dis->id}}">{{$dis->nomDirection}}</option>
				                    @endforeach
				                </select>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputEmail1" class="col-sm-8 control-label">Nom du Service</label>
						        <div class="col-sm-20">
						            <input type="text" name="nomServ" class="form-control" id="inputEmail1" placeholder="Ex: DRH" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
						        <div class="col-sm-20">
						            <input type="text" name="sigleServ" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
						        <div class="col-sm-20">
						            <input type="text" name="adrServ" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
						        <div class="col-sm-20">
						            <input type="Email" name="emailServ" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
						        <div class="col-sm-20">
						            <input type="text" name="telServ" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
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
@endsection

