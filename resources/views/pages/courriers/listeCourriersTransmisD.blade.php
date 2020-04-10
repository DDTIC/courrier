@extends('layouts.courierD')

@section('content')
	<div class="btn-group btn-group-justified btn-block">
	    <a class="btn btn-default btn-success" href="#">Couriers Arrivés</a>
	    <a class="btn btn-default btn-success" href="#">Couriers Depart</a>
	</div>


<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$courT->count()}} Imputations </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Date d'imputation</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">No courrier</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Agent</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($courT->count()>0)
	        	<tbody>
	        		@foreach($courT as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->dateTransmission}}</td>
			                <td>{{$di->courriers['id']}}</td>
			                <td>{{$di->agents['mleAgent']}}</td>
			                <td>
			                	<a href=""  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="" data-toggle="modal" data-target="#myModalM_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>                
			                	<a href=""  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Liste de employés" data-placement="left" data-toggle="tooltip"><i class="fa fa-save"></i></a>			                
			                </td>
			            </tr>

			            <!-- Modal  detais  Employés-->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails CourierTransmis </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>Date de transmission : </strong></p>  <p class="col-md-6">{{$di->dateTransmission}}</p>
							            </div>
							            <div class="row">
							            	<p class="col-md-6"> <strong >Type de Courrier : </strong></p>  <p class="col-md-6">{{$di->typeCourier}}</p>
							            </div>
							            <div class="row">
							            	<p class="col-md-6"> <strong >Agent : </strong></p> <p class="col-md-6">{{$di->agents['mleAgent']}}</p>
							            </div>
							            <div class="row">
							            	<p class="col-md-6"> <strong >Courrier : </strong></p> <p class="col-md-6">{{$di->idCourier}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Transmis : </strong></p> <p class="col-md-6">{{$di->transmi}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Actuel : </strong></p> <p class="col-md-6">{{$di->actuel}}</p>
							            </div>
					            		<div class="row">
							            	<p class="col-md-6"> <strong >Observation : </strong></p> <p class="col-md-6">{{$di->observation}}</p>
							            </div>							            							            				
					        	</div>
					    	</div>
					    </div>
					    </div>
			             <!-- Modal de modification d'un CourierTransmi arrivé-->

						<div class="modal fade bd-example-modal-xl" id="myModalM_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						    <div class="modal-dialog modal-xl">
						        <div class="modal-content">
						            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
						                <h4 class="modal-title" > <i class="fa fa-home icon-lg"></i>  MODIFIER UN COURIER </h4>
						            </div>
						            <div class="modal-body">

										<form class="form-horizontal" role="form" name="form" action="{{route('CourierTransmi.update',$di)}}" method="POST">
										{{csrf_field()}}
										{{method_field('PUT')}}
										  <div class="form-row">
									    <div class="form-group col-md-5">
									      <label for="inputEmail4" class="col-sm-12 control-label">Courrier à imputer</label>
											<select class="form-control" name="idCour">
												@foreach($cour as $dis)
									                	@if($dis->id==$di->idCourier)
									                    <option value="{{$dis->id}}" selected=>{{$dis->id}} {{$dis->objet}}<option>
									                    @endif
								                @endforeach
								                @foreach($cour as $dis)
									                	@if($dis->id!=$di->idCourier)
									                    <option value="{{$dis->id}}">{{$dis->id}} {{$dis->objet}}</option>
									                    @endif
								                @endforeach
											</select>
										</div>
										<div class="form-group col-md-5">
									      <label for="inputEmail4" class="col-sm-12 control-label">Personne concernée</label>
											<select class="form-control" name="idAg">
												@foreach($agt as $dis2)
									                	@if($dis2->id==$di->idAgent)
									                    <option value="{{$dis2->id}}" selected=>{{$dis2->nomAgent}} {{$dis2->prenomAgent}}<option>
									                    @endif
								                @endforeach
								                @foreach($cour as $dis2)
									                	@if($dis2->id!=$di->idCourier)
									                    <option value="{{$dis2->id}}">{{$dis2->nomAgent}} {{$dis2->prenomAgent}}</option>
									                    @endif
								                @endforeach												
											</select>
										</div>
										<div class="form-group col-md-2">
										    <label for="inputAddress2" class="col-sm-12 control-label">Type de Courier</label>
										    <select id="inputState" class="form-control" name="typeCour">
									        	<option selected>Arrive</option>
									        	<option>Depart</option>
									      	</select>
									  	</div>
									 </div>
									 <hr>
									  <div class="form-row">
									  	<div class="form-group col-md-4">
									      <label for="inputPassword4" class="col-sm-12 control-label">Date d'imputation</label>
									      <input type="text" class="form-control datetimepicker" id="inputPassword4" class="col-sm-4 control-label" name="dateTrans" required="true" value="{{$di->dateTransmission}}">
									    </div>
									  <div class="form-group col-md-4">
									    <label for="inputAddress" class="col-sm-12 control-label">Transmis ?</label>
									     <select id="inputState" class="form-control" name="trans">
									        	<option selected>Oui</option>
									        	<option>Non</option>
									      </select>
									  </div>
									  <div class="form-group col-md-4">
									    <label for="inputAddress" class="col-sm-12 control-label">Etat Actuel ?</label>
									     <select id="inputState" class="form-control" name="actu">
									        	<option selected> En cours</option>
									        	<option>traité</option>
									     </select>
									  </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-12">
									      <label for="inputCity" class="col-sm-4 control-label">Observation</label>
									      <textarea  class="form-control" name="observ" required="true" value="">{{$di->observation}}</textarea>
									    </div>
									</div>
									  <div class="form-group">
									        <button type="submit" class="btn btn-success form-group col-md-4"><i class="fa fa-check icon-lg"></i> Valider</button>
									        <button type="button" class="btn btn-danger form-group col-md-4"><i class="fa fa-times icon-lg"></i> Annule</button>
									   </div>
										</form>
										<form class="form-horizontal" style="display:inline-block;" role="form" name="form" action="{{route('CourierTransmi.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');">
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
	        	<h2 style="text-align: center; color: red;">Aucun CourierTransmi n'a été enregistré pour le moment</h2>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>


<!-- Modal d'enregistrement d'un CourierTransmi-->
	<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title" > <i class="fa fa-home icon-lg"></i>  IMPUTATION DE COURRIERS	 </h4>
	            </div>
	            <div class="modal-body">
					<form class="form-horizontal" role="form" name="form" action="{{route('CourierTransmi.store')}}" method="post">
					{{csrf_field()}}
					  <div class="form-row">
					    <div class="form-group col-md-5">
					      <label for="inputEmail4" class="col-sm-12 control-label">Courrier a imputer</label>
							<select class="form-control" name="idCour">
								@foreach($cour ?? '' as $dis)
								     <option value="{{$dis->id}}">{{$dis->id}} {{$dis->objet}}</option>
								@endforeach
							</select>
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
					        	<option selected>Arrive</option>
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
					      <textarea placeholder="Objet du CourierTransmi" class="form-control" name="observ" required="true"></textarea>
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

