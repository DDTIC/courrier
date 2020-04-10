@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$dir->count()}} Directions </h1>
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
	        @if($dir->count()>0)
	        	<tbody>
	        		@foreach($dir as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->nomDirection}}</td>
			                <td>{{$di->sigleDirection}}</td>
			                <td>{{$di->emailDirection}}</td>
			                <td>
			                	<a href="{{route('Direction.service.index',$di)}}" data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details direction" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Direction.service.index',$di)}}" title="Liste des services" data-placement="left" data-toggle="tooltip"><i class="fa fa-list"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>			                	
			                	<a href="{{route('Direction.edit',$di)}}" data-toggle="modal" data-target="#myModal_{{$di->id}}" title="Modifier la direction" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>


			            <!-- Modal  detais  -->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Direction </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>Nom de la Direction : </strong></p>  <p class="col-md-6">{{$di->nomDirection}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Sigle : </strong></p>  <p class="col-md-6">{{$di->sigleDirection}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Adresse : </strong></p> <p class="col-md-6">{{$di->adrDirection}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Email : </strong></p> <p class="col-md-6">{{$di->emailDirection}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Telephone : </strong></p> <p class="col-md-6">{{$di->telDirection}}</p>
							            </div>												
					        	</div>
					    	</div>
					    </div>
					    </div>

			             <!-- Modal d'enregistrement de Direction-->

						<div class="modal fade bd-example-modal-xl" id="myModal_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-xl">
							        <div class="modal-content">
							            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
							                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFIER UNE DIRECTION </h4>
							            </div>
							            <div class="modal-body">
											  <form class="form-horizontal" role="form" name="form" action="{{route('Direction.update',$di)}}" method="post">
											  	{{csrf_field()}}
											  	{{method_field('PUT')}}
											 	<div class="form-row">
													<div class="form-group col-sm-4">
												        <label for="inputEmail1" class="col-sm-8 control-label">Structure</label>
												    	<select class="form-control" name="idStru">
										                	@foreach($struct ?? '' as $dis)
										                    <option value="{{$di->id}}">{{$dis->nomStruct}}</option>
										                    @endforeach
										                </select>
												    </div>
												  </div>
												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Drection</label>
												        <div class="col-sm-20">
												            <input type="text" name="nomDir" class="form-control" id="inputEmail1" value="{{$di->nomDirection}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
												        <div class="col-sm-20">
												            <input type="text" name="sigleDir" class="form-control" id="inputPassword1" value="{{$di->sigleDirection}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
												        <div class="col-sm-20">
												            <input type="text" name="adrDir" class="form-control" id="inputPassword1" value="{{$di->adrDirection}}" required="true">
												        </div>
												    </div>
												  </div>
												  <div class="form-row">
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
												        <div class="col-sm-20">
												            <input type="Email" name="emailDir" class="form-control" id="inputPassword1" value="{{$di->emailDirection}}" required="true">
												        </div>
												    </div>
												    <div class="form-group col-sm-4">
												        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
												        <div class="col-sm-20">
												            <input type="text" name="telDir" class="form-control" id="inputPassword1" value="{{$di->telDirection}}" required="true">
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

											<form class="form-horizontal" style="display:inline-block;" role="form" name="form" action="{{route('Direction.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');" >
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
	        	<p>Aucune direction n'a été enregistrée pour le moment</p>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>
<!-- Modal d'enregistrement de Direction-->

<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UNE DIRECTION </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Direction.store')}}" method="post">
					  	{{csrf_field()}}
					 	<div class="form-row">
							<div class="form-group col-sm-4">
						        <label for="inputEmail1" class="col-sm-8 control-label">Structure</label>
						    	<select class="form-control" name="idStru">
				                	@foreach($struct ?? '' as $di)
				                    <option value="{{$di->id}}">{{$di->nomStruct}}</option>
				                    @endforeach
				                </select>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Drection</label>
						        <div class="col-sm-20">
						            <input type="text" name="nomDir" class="form-control" id="inputEmail1" placeholder="Ex: DRH" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Sigle</label>
						        <div class="col-sm-20">
						            <input type="text" name="sigleDir" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
						        <div class="col-sm-20">
						            <input type="text" name="adrDir" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Email</label>
						        <div class="col-sm-20">
						            <input type="Email" name="emailDir" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
						        </div>
						    </div>
						    <div class="form-group col-sm-4">
						        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
						        <div class="col-sm-20">
						            <input type="text" name="telDir" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
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

