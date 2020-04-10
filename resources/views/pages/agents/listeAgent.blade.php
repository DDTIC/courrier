@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$agt->count()}} Agents </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Matricule</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Nom</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Prenoms</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">email</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Telephone</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($agt->count()>0)
	        	<tbody>
	        		@foreach($agt as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->mleAgent}}</td>
			                <td>{{$di->nomAgent}}</td>
			                <td>{{$di->prenomAgent}}</td>
			                <td>{{$di->emailAgent}}</td>
			                <td>{{$di->telAgent}}</td>
			                <td>
			                	<a href="{{route('Agent.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Agent.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Liste de employés" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Agent.edit',$di)}}" data-toggle="modal" data-target="#myModalM_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>

			            <!-- Modal  detais  Employés-->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Agent </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>No de Service : </strong></p>  <p class="col-md-6">{{$di->idService}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >No de Fonction : </strong></p>  <p class="col-md-6">{{$di->idFonction}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Matricule : </strong></p> <p class="col-md-6">{{$di->mleAgent}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Nom : </strong></p> <p class="col-md-6">{{$di->nomAgent}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Prenoms : </strong></p> <p class="col-md-6">{{$di->prenomAgent}}</p>
							            </div>												
					            		<div class="row">
							            	<p class="col-md-6"> <strong > Email : </strong></p> <p class="col-md-6">{{$di->emailAgent}}</p>
							            </div>												
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Telephone : </strong></p> <p class="col-md-6">{{$di->telAgent}}</p>
							            </div>																			            							            
					        	</div>
					    	</div>
					    </div>
					    </div>
			             <!-- Modal de modification d'un Agent-->
						<div class="modal fade bd-example-modal-xl" id="myModalM_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog modal-xl">
						        <div class="modal-content">
						            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
						                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFICATION DE L'AGENT </h4>
						            </div>
						            <div class="modal-body">
										  <form class="form-horizontal" role="form" name="form" action="{{route('Agent.update',$di)}}" method="post">
										  	<hr>
										  	{{csrf_field()}}
										  	{{method_field('PUT')}}
										 <div class="form-row">
										    <div class="form-group col-sm-4">
										        <label for="inputPassword1" class="col-sm-4 control-label">Service</label>
										        <div class="form-group">
													  <select class="form-control" name="idServ">
															@foreach($ser as $dis)
											                	@if($dis->id==$di->idService)
											                    <option value="{{$dis->id}}">{{$dis->nomService}}</option>
											                    @endif
										                    @endforeach
										                	@foreach($ser as $dis)
											                	@if($dis->id!=$di->idService)
											                    <option value="{{$dis->id}}">{{$dis->nomService}}</option>
											                    @endif
										                    @endforeach
								                		</select>
												 </div>
										    </div>
										    <div class="form-group col-sm-4">
										    </div>					    
										    <div class="form-group col-sm-4">
										        <label for="inputPassword1" class="col-sm-4 control-label">Fonction</label>
										        <div class="form-group">
														<select class="form-control" name="idFonc">
															@foreach($fonct as $diss)
											                	@if($diss->id==$di->idFonction)
											                    <option value="{{$diss->id}}">{{$diss->libelleFonction}}</option>
											                    @endif
										                    @endforeach
										                	@foreach($fonct as $diss)
											                	@if($diss->id!=$di->idFonction)
											                    <option value="{{$diss->id}}">{{$diss->libelleFonction}}</option>
											                    @endif
										                    @endforeach
								                		</select>										        	
												 </div>
										    </div>
										 </div>
										 <div class="form-row">
										    <div class="form-group col-sm-4">
										        <label for="inputEmail1" class="col-sm-4 control-label">Matricule</label>
										        <div class="col-sm-20">
										            <input type="text" name="mleAg" class="form-control" id="inputEmail1" value="{{$di->mleAgent}}" required="true">
										        </div>
										    </div>					 					    					  	
										    <div class="form-group col-sm-4">
										        <label for="inputEmail1" class="col-sm-4 control-label">Nom</label>
										        <div class="col-sm-20">
										            <input type="text" name="nomAg" class="form-control" id="inputEmail1" value="{{$di->nomAgent}}" required="true">
										        </div>
										    </div>
										    <div class="form-group col-sm-4">
										        <label for="inputPassword1" class="col-sm-4 control-label">Prenoms</label>
										        <div class="col-sm-20">
										            <input type="text" name="prenomAg" class="form-control" id="inputPassword1" value="{{$di->prenomAgent}}" required="true">
										        </div>
										    </div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-6">
										        <label for="inputPassword1" class="col-sm-8 control-label">Email</label>
										        <div class="col-sm-20">
										            <input type="Email" name="emailAg" class="form-control" id="inputPassword1" value="{{$di->emailAgent}}" required="true">
										        </div>
										    </div>

										    <div class="form-group col-sm-6">
										        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
										        <div class="col-sm-20">
										            <input type="text" name="telAg" class="form-control" id="inputPassword1" value="{{$di->telAgent}}" required="true">
										        </div>
										    </div>
										</div>
										<div class="form-row">
										    <div class="form-group col-sm-12">
										        <div class="form-group col-md-4">
											        <div class="col-sm-offset-4 col-sm-20">
											            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider la modification</button>
											        </div>
									    		</div>
										    </div>
										</div>
										</form>
										<form class="form-horizontal" style="display:inline;" role="form" name="form" action="{{route('Agent.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');">
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
					        </div>
	        		@endforeach
	        	</tbody>
	    </table>
	    	 @else
	        	<h2 style="text-align: center; color: red;">Aucun Agent n'a été enregistré pour le moment</h2>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>
	<!-- Modal d'enregistrement de Agent-->
	<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  ENREGISTREMENT D'UN AGENT </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Agent.store')}}" method="post">
					  	<hr>
					  	{{csrf_field()}}
					 <div class="form-row">
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Service</label>
					        <div class="form-group">
								   <select class="form-control" name="idServ">
									@foreach($ser ?? '' as $dis)
								     <option value="{{$dis->id}}">{{$dis->nomService}}</option>
								    @endforeach
								    </select>
							 </div>
					    </div>
					    <div class="form-group col-sm-4">
					    </div>					    
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Fonction</label>
					        <div class="form-group">
								   <select class="form-control" name="idFonc">
									@foreach($fonct ?? '' as $diss)
								     <option value="{{$diss->id}}">{{$diss->libelleFonction}}</option>
								    @endforeach
								    </select>
							 </div>
					    </div>
					 </div>
					 <div class="form-row">
					    <div class="form-group col-sm-4">
					        <label for="inputEmail1" class="col-sm-4 control-label">Matricule</label>
					        <div class="col-sm-20">
					            <input type="text" name="mleAg" class="form-control" id="inputEmail1" placeholder="Ex: XYXUXYS" required="true">
					        </div>
					    </div>					 					    					  	
					    <div class="form-group col-sm-4">
					        <label for="inputEmail1" class="col-sm-4 control-label">Nom</label>
					        <div class="col-sm-20">
					            <input type="text" name="nomAg" class="form-control" id="inputEmail1" placeholder="Ex: OUEDRAOGO" required="true">
					        </div>
					    </div>
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Prenoms</label>
					        <div class="col-sm-20">
					            <input type="text" name="prenomAg" class="form-control" id="inputPassword1" placeholder="Ex: Oumarou" required="true">
					        </div>
					    </div>
					</div>
					<div class="form-row">
					    <div class="form-group col-sm-6">
					        <label for="inputPassword1" class="col-sm-8 control-label">Email</label>
					        <div class="col-sm-20">
					            <input type="Email" name="emailAg" class="form-control" id="inputPassword1" placeholder="" required="true">
					        </div>
					    </div>

					    <div class="form-group col-sm-6">
					        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
					        <div class="col-sm-20">
					            <input type="text" name="telAg" class="form-control" id="inputPassword1" placeholder="Ex:70938273" required="true">
					        </div>
					    </div>
					</div>
					<div class="form-row">
					    <div class="form-group col-sm-12">
					        <div class="col-sm-offset-4 col-sm-20">
					            <button type="submit" class="btn btn-success col-sm-6"><i class="fa fa-check icon-lg"></i> Valider</button>
					            <button type="button" class="btn btn-danger col-sm-4"><i class="fa fa-times icon-lg"></i> Annule</button>
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

