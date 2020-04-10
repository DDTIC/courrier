@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$fonct->count()}} Fonctions </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Libele de la fonction</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($fonct->count()>0)
	        	<tbody>
	        		@foreach($fonct as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->libelleFonction}}</td>
			                <td>
			                	<a href="{{route('Fonction.index')}}" data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details direction" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Fonction.show',$di)}}" title="Liste des services" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>			                	
			                	<a href="{{route('Fonction.edit',$di)}}" data-toggle="modal" data-target="#myModal_{{$di->id}}" title="Modifier la direction" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>


			            <!-- Modal  detais  -->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Fonction </h4>
					            </div>
					            <div class="modal-body">
					            		<div class="row">
							            	<p class="col-md-6"><strong>Libelle de la Fonction : </strong></p>  <p class="col-md-6">{{$di->libelleFonction}}</p>
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
											  <form class="form-horizontal" role="form" name="form" action="{{route('Fonction.update',$di ?? '')}}" method="post">
											  	{{csrf_field()}}
											  	{{method_field('PUT')}}

											  	<div class="form-row">
														<div class="form-group col-sm-6">
														<label for="inputEmail1" class="col-sm-12 control-label">Libelle de la Fonction</label>
															<div class="col-sm-12">
																 <input type="text" name="libelleFonc" class="form-control" id="inputEmail1"  value="{{$di->libelleFonction}}" required="true">
															</div>
														</div>
												</div>
												<div class="form-row">
												    <div class="form-group col-sm-6">
												        <div class="col-sm-12">
												            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider les modifications</button>
												        </div>
												    </div>
											 	 </div>
											</form>

											<form class="form-horizontal" role="form" name="form" action="{{route('Fonction.destroy',$di ?? '')}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');" >
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
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  AJOUTER UNE FONCTION </h4>
	            </div>
	            <div class="modal-body">

						<form class="form-horizontal" role="form" name="form" action="{{route('Fonction.store')}}" method="post">
							{{csrf_field()}}
							<div class="form-row">
								<div class="form-group col-sm-6">
								<label for="inputEmail1" class="col-sm-12 control-label">Libelle de la Fonction</label>
									<div class="col-sm-12">
										 <input type="text" name="libelleFonc" class="form-control" id="inputEmail1"  required="true">
									</div>
								</div>
							</div>
							<div class="form-row">
						    <div class="form-group col-sm-6">
						        <div class="col-sm-12">
						            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider</button>
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

