@extends('layouts.courierD')

@section('content')
	<div class="btn-group btn-group-justified btn-block">
	    <a class="btn btn-default btn-success" href="#">Couriers Départ</a>
	    <a class="btn btn-default btn-success" href="#">Couriers Départ</a>
	</div>


<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$cour->count()}} Courriers Départ {{$name}}</h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>No d'ordre</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Date Départ</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Objet</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Structure</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($cour->count()>0)
	        	<tbody>
	        		@foreach($cour as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->dateArrivee}}</td>
			                <td>{{$di->objet}}</td>
			                <td>{{$di->structures['nomStruct']}}</td>
			                <td>
			                	<a href="{{route('Courrier.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Courrier.edit',$di)}}" data-toggle="modal" data-target="#myModalM_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>                
			                	<a href="{{route('Courrier.show',$di)}}"  data-toggle="modal" data-target="#myModalT_{{$di->id}}" title="Transmettre le courrier" data-placement="left" data-toggle="tooltip"><i class="fa fa-paper-plane"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>                	
			                	<a href="{{route('Courrier.show',$di)}}" title="Valider le courrier" data-placement="left" data-toggle="tooltip"><i class="fa fa-check"></i></a>			                
			                </td>
			            </tr>

			            <!-- Modal  detais  Employés-->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Courriers Départ</h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Numéro d'ordre : </strong></p>  <p class="col-md-6">A0{{$di->id}}</p>
							            </div>
										@foreach($ser as $disd)
									        @if($disd->id==$di->id)
					            				<div class="row">
							            			<p class="col-md-6"><strong>Structure : </strong></p>  <p class="col-md-6">{{$disd->nomStruct}}</p>
							            		</div>
									        @endif
								        @endforeach
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Type : </strong></p>  <p class="col-md-6">{{$di->natCourier}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Objet : </strong></p> <p class="col-md-6">{{$di->objet}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Destinataire : </strong></p> <p class="col-md-6">{{$di->destExp}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Numero de la pièce : </strong></p> <p class="col-md-6">{{$di->numPiece}}</p>
							            </div>							            
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Date de la pièce : </strong></p> <p class="col-md-6">{{$di->datePiece}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Date de Départ : </strong></p> <p class="col-md-6">{{$di->dateArrivee}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Observation: </strong></p> <p class="col-md-6">{{$di->observation}}</p>
							            </div>							            							            							            				
					        	</div>
					    	</div>
					    </div>
					    </div>
				<!-- Modal  de transmission de courriers-->


						<div class="modal fade bd-example-modal-xl" id="myModalT_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog modal-xl">
						        <div class="modal-content">
						            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
						                <h4 class="modal-title" > <i class="fa fa-home icon-lg"></i>  TRANSMISSION DE COURRIERS	 </h4>
						            </div>
						            <div class="modal-body">
										<form class="form-horizontal" role="form" name="form" action="{{route('CourierTransmi.store')}}" method="post">
										{{csrf_field()}}
										  <div class="form-row">
										    <div class="form-group col-md-5">
										      <label for="inputEmail4" class="col-sm-12 control-label">Courrier a transmettre</label>
										      <input type="Text" class="form-control" id="idCour" name="idCour" value="{{$di->id}}">
											</div>
											<div class="form-group col-md-5">
										      <label for="inputEmail4" class="col-sm-12 control-label">Personne concernée</label>
												<select class="form-control" name="idAg">
													@foreach($agt ?? '' as $dis2)
													     <option value="{{$dis2->id}}">{{$dis2->nomAgent}} {{$dis2->prenomAgent}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group col-md-2">
											    <label for="inputAddress2" class="col-sm-12 control-label">Type de Courier</label>
											    <select id="inputState" class="form-control" name="typeCour">
										        	<option>Depart</option>
										      	</select>
										  	</div>
										 </div>
										 <hr>
										  <div class="form-row">
										  	<div class="form-group col-md-4">
										      <label for="inputPassword4" class="col-sm-12 control-label">Date de transmission</label>
										      <input type="text" class="form-control datetimepicker" id="inputPassword4" class="col-sm-4 control-label" name="dateTrans" required="true">
										    </div>
										  <div class="form-group col-md-4">
										    <label for="inputAddress" class="col-sm-12 control-label">Transmis ?</label>
										     <select id="inputState" class="form-control" name="trans">
										        	<option selected>Classique</option>
										        	<option>Confidentiel</option>
										      </select>
										  </div>
										  <div class="form-group col-md-4">
										    <label for="inputAddress" class="col-sm-12 control-label">Etat Actuel ?</label>
										     <select id="inputState" class="form-control" name="actu">
										        	<option selected>Classique</option>
										        	<option>Confidentiel</option>
										     </select>
										  </div>
										</div>
										<div class="form-row">
										    <div class="form-group col-md-12">
										      <label for="inputCity" class="col-sm-4 control-label">Observation</label>
										      <textarea placeholder="Objet du CourierTransmi" class="form-control" name="observ" required="true">{{$di->observation}}</textarea>
										    </div>
										</div>
										  <div class="form-group">
										        <button type="submit" class="btn btn-success form-group col-md-4"><i class="fa fa-check icon-lg"></i> Valider</button>
										        <button type="button" class="btn btn-danger form-group col-md-4"><i class="fa fa-times icon-lg"></i> Annule</button>
										   </div>
										</form>
						            </div>
						            <div class="modal-footer">
						                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Fermer</button>
						            </div>
						        </div>
						    </div>
						</div>	

			             <!-- Modal de modification d'un Courrier arrivé-->
						<div class="modal fade bd-example-modal-xl" id="myModalM_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog modal-xl">
						        <div class="modal-content">
						            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
						                <h4 class="modal-title" > <i class="fa fa-home icon-lg"></i>  MODIFIER UN COURIER ARRIVE	 </h4>
						            </div>
						            <div class="modal-body">

										<form class="form-horizontal" role="form" name="form" action="{{route('Courrier.update',$di)}}" method="post">
										{{csrf_field()}}
										{{method_field('PUT')}}
										  <div class="form-row">
										  	 <div class="form-group col-md-3">
												<select class="form-control" name="typeCour">
													     <option value="Depart" selected="true">Départ</option>
												</select>
											</div>							
										  </div>
											  <div class="form-row">
										    <div class="form-group col-md-3">
										      <label for="inputEmail4" class="col-sm-12 control-label">Structure concernée</label>
												<select class="form-control" name="idStruc">
													@foreach($ser ?? '' as $dis)
									                	@if($dis->nomStruct==$di->nomStruct)
									                    <option value="{{$dis->id}}">{{$dis->nomStruct}}<option>
									                    @endif
								                    @endforeach
								                	@foreach($ser ?? '' as $dis)
									                	@if($dis->nomStruct!=$di->nomStruct)
									                    <option value="{{$dis->id}}">{{$dis->nomStruct}}</option>
									                    @endif
								                    @endforeach
								                </select>
											</div>
											<div class="form-group col-md-3">
										      <label for="inputState" class="col-sm-12 control-label">Numero de la pièce</label>
										       <input type="text" class="form-control" id="adresse" name="numPieceCour" required="true" value="{{$di->numPiece}}">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputPassword4" class="col-sm-20 control-label">Date de la pièce</label>
										      <input type="text" class="form-control datetimepicker" id="inputPassword4" class="col-sm-4 control-label" name="datePieceCour" required="true" value="{{$di->datePiece}}">
										    </div>
										  <div class="form-group col-md-3">
										    <label for="inputAddress" class="col-sm-12 control-label">Date d'Départ</label>
										    <input type="text" class="form-control datetimepicker" id="inputAddress" name="dateA" required="true" value="{{$di->dateArrivee}}">
										  </div>
										 </div>
										 <hr>
										  <div class="form-row">
										  	<div class="form-group col-md-4">
											    <label for="inputAddress2" class="col-sm-12 control-label">Nature du courrier</label>
											    <select id="inputState" class="form-control" name="natCour">
										        	<option selected>{{$di->natCourier}}</option>
										        	<option>Confidentil</option>
										        	<option>Classique</option>
										      	</select>
										  	</div>
										    <div class="form-group col-md-8">
										      <label for="inputCity" class="col-sm-4 control-label">Objet</label>
										      <textarea  class="form-control" name="objetCour" required="true" >{{$di->objet}}</textarea>
										    </div>
										  </div>

										  <div class="form-row">
										    <div class="form-group col-md-4">
										      <label for="inputState" class="col-sm-12 control-label">Destinataire</label>
										       <input type="text" class="form-control" id="adresse" name="Dest" required="true" value="{{$di->destExp}}">
										    </div>
											<div class="form-group col-md-8">
										      <label for="inputState" class="col-sm-12 control-label">Observation</label>
										       <textarea placeholder="Observation" class="form-control" name="Obser" value="" required="true">{{$di->observation}}</textarea>
										    </div>
										    </div>					  	
										  <div class="form-group">
										        <button type="submit" class="btn btn-success form-group col-md-4"><i class="fa fa-check icon-lg"></i> Valider</button>
										   </div>
										</form>
										<form class="form-horizontal" style="display:inline-block;" role="form" name="form" action="{{route('Courrier.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');">
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
	        	<h2 style="text-align: center; color: red;">Aucun courrier n'a été enregistré pour le moment</h2>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>


<!-- Modal d'enregistrement d'un courrier-->
	<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title" > <i class="fa fa-home icon-lg"></i>  AJOUTER UN COURIER </h4>
	            </div>
	            <div class="modal-body">
					<form class="form-horizontal" role="form" name="form" action="{{route('Courrier.store')}}" method="post">
					{{csrf_field()}}
					  <div class="form-row">
					  	 <div class="form-group col-md-3">
							<select class="form-control" name="typeCour">
								     <option value="Depart" selected="true">Départ</option>
							</select>
						</div>							
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-3">
					      <label for="inputEmail4" class="col-sm-12 control-label">Structure concernée</label>
							<select class="form-control" name="idStruc">
								@foreach($ser ?? '' as $dis)
								     <option value="{{$dis->id}}">{{$dis->nomStruct}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-3">
					      <label for="inputState" class="col-sm-12 control-label">Numero de la pièce</label>
					       <input type="text" class="form-control" id="adresse" name="numPieceCour" required="true">
					    </div>
					    <div class="form-group col-md-3 ">
					      <label for="inputPassword4" class="col-sm-12 control-label date">Date de la pièce</label>
					      <input  type="text" class="form-control datetimepicker" class="col-sm-4 control-label" name="datePieceCour" required="true">
					    </div>
					  <div class="form-group col-md-3">
					    <label for="inputAddress" class="col-sm-12 control-label">Date d'Départ</label>
					    <input type="text" class="form-control datetimepicker" id="inputAddress" name="dateA" required="true">
					  </div>
					 </div>
					 <hr>
					  <div class="form-row">
					  	<div class="form-group col-md-4">
						    <label for="inputAddress2" class="col-sm-12 control-label">Nature du courrier</label>
						    <select id="inputState" class="form-control" name="natCour">
					        	<option selected>Classique</option>
					        	<option>Confidentiel</option>
					      	</select>
					  	</div>
					    <div class="form-group col-md-8">
					      <label for="inputCity" class="col-sm-4 control-label">Objet</label>
					      <textarea placeholder="Objet du courrier" class="form-control" name="objetCour" required="true"></textarea>
					    </div>
					  </div>

					  <div class="form-row">
					  	 <div class="form-group col-md-4">
					      <label for="inputState" class="col-sm-12 control-label">Destinataire</label>
					       <input type="text" class="form-control" id="adresse" name="Dest" required="true">
					    </div>
						<div class="form-group col-md-8">
					      <label for="inputState" class="col-sm-12 control-label">Obervation</label>
					       <textarea placeholder="Observation" class="form-control" name="Obser" required="true"></textarea>
					    </div>					  	
					  </div>
					  <div class="form-group">
					        <button type="submit" class="btn btn-success form-group col-md-4"><i class="fa fa-check icon-lg"></i> Valider</button>
					        <button type="button" class="btn btn-danger form-group col-md-4"><i class="fa fa-times icon-lg"></i> Annule</button>
					   </div>
					</form>
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Fermer</button>
	            </div>
	        </div>
	    </div>
	</div>	
@endsection

