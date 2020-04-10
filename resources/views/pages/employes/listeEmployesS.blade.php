@extends('layouts.admin')

@section('content')

	<div class="table-responsive table-hover">
		<h1 style="text-align: center;"> {{$emp->count()}} Employés </h1>
	    <table class="table" id="myTable">
	        <thead class="bg-success" style="color: white;">
	            <tr>
	                <th>#</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Nom</th>
	                <th class="dropdown-toggle" data-toggle="dropdown">Prenoms</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        @if($emp->count()>0)
	        	<tbody>
	        		@foreach($emp as $di)
			            <tr>
			                <td>{{$di->id}}</td>
			                <td>{{$di->nomEmp}}</td>
			                <td>{{$di->prenomEmp}}</td>
			                <td>
			                	<a href="{{route('Employe.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Details" data-placement="left" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Employe.show',$di)}}"  data-toggle="modal" data-target="#myModalA_{{$di->id}}" title="Liste de employés" data-placement="left" data-toggle="tooltip"><i class="fa fa-users"></i></a>
			                	<i class="fa fa-minus" style="color: transparent;"></i></a>
			                	<a href="{{route('Employe.edit',$di)}}" data-toggle="modal" data-target="#myModalM_{{$di->id}}" title="Modifier" data-placement="left" data-toggle="tooltip"><i class="fa fa-edit"></i></a>	                
			                </td>
			            </tr>

			            <!-- Modal  detais  Employés-->
						<div class="modal fade" id="myModalA_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i> Détails Employé </h4>
					            </div>
					            <div class="modal-body">
							            	<p><strong class="col-sm-10 ">Numero de service : </strong>  {{$di->numService}}</p>
							            	<p class="divider"></p>
											<p> <strong class="col-sm-10">Nom : </strong>  {{$di->nomEmp}}</p>
											<p> <strong class="col-sm-10">Prenoms : </strong> {{$di->prenomEmp}}</p>
											<p> <strong class="col-sm-10">Date de naissance : </strong> {{$di->dateNaissanceEmp}}</p>
											<p> <strong class="col-sm-10">Adresse : </strong> {{$di->adresseEmp}}</p>
											<p> <strong class="col-sm-10">Telephone : </strong> {{$di->telephoneEmp}}</p>
											<p> <strong class="col-sm-10">Poste : </strong> {{$di->posteEmp}}</p>
											<p> <strong class="col-sm-10">Date d'embauche : </strong> {{$di->dateEmbauche}}</p>
					        	</div>
					    	</div>
					    </div>
					    </div>
			             <!-- Modal de modification d'un employe-->
						<div class="modal fade bd-example-modal-xl" id="myModalM_{{$di->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog modal-xl">
					        <div class="modal-content">
					            <div class="modal-header" style="text-align: center;display: block;">
					                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  MODIFICATION DE L'EMPLOYE </h4>
					            </div>
					            <div class="modal-body">
									  <form class="form-horizontal" role="form" name="form" action="{{route('Employe.update',$di)}}" method="POST">
									  	{{csrf_field()}}
									  		{{method_field('PUT')}}
									 <div class="form-row">
									  	<div class="form-group col-md-4">
									        <label for="inputEmail1" class="col-sm-12 control-label">Direction</label>
									        <div class="form-group">
								                <select class="form-control" name="numServ">
													@foreach($ser ?? '' as $dis)
								                	@if($dis->id==$di->numService)
								                    <option value="{{$dis->id}}">{{$dis->nomService}}</option>
								                    @endif
								                    @endforeach
								                	@foreach($ser ?? '' as $dis)
								                	@if($dis->id!=$di->numService)
								                    <option value="{{$dis->id}}">{{$dis->nomService}}</option>
								                    @endif
								                    @endforeach
								                </select>
								            </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputEmail1" class="col-sm-4 control-label">Nom</label>
									        <div class="col-sm-20">
									            <input type="text" name="nomEmpl" class="form-control" id="inputEmail1" value="{{$di->nomEmp}}" required="true">
									        </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-4 control-label">Prenoms</label>
									        <div class="col-sm-20">
									            <input type="text" name="prenomEmpl" class="form-control" id="inputPassword1" value="{{$di->prenomEmp}}" required="true">
									        </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-8 control-label">Sexe</label>
									                    <div class="radio">
											                <label>
											                    <input type="radio" name="sexeEmpl" id="optionsRadios01" value="M" checked> Masculin
											                     <input type="radio" name="sexeEmpl" id="optionsRadios02" value="F"> Féminin
											                </label>
											            </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-8 control-label">Date de naissance</label>
									        <div class="col-sm-20">
									            <input type="Date" name="dateNaisEmpl" class="form-control" id="inputPassword1" value="{{$di->dateNaissanceEmp}}" required="true">
									        </div>
									    </div>

									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
									        <div class="col-sm-20">
									            <input type="text" name="adresseEmpl" class="form-control" id="inputPassword1" value="{{$di->adresseEmp}}" required="true">
									        </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
									        <div class="col-sm-20">
									            <input type="text" name="telEmpl" class="form-control" id="inputPassword1" value="{{$di->telephoneEmp}}" required="true">
									        </div>
									    </div>
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-4 control-label">Poste</label>
									        <div class="col-sm-20">
									            <input type="text" name="posteEmpl" class="form-control" id="inputPassword1" value="{{$di->posteEmp}}" required="true">
									        </div>
									    </div>					    
									    <div class="form-group col-md-4">
									        <label for="inputPassword1" class="col-sm-12 control-label">Date d'embauche</label>
									        <div class="col-sm-20">
									            <input type="Date" name="dateEmbEmpl" class="form-control" id="inputPassword1" value="{{$di->dateEmbauche}}" required="true">
									        </div>
									    </div>
									    <div class="form-group col-md-4">
									        <div class="col-sm-offset-4 col-sm-20">
									            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-lg"></i> Valider la modification</button>
									        </div>
									    </div>
									   </div>
									</form>

									<form class="form-horizontal" style="display:inline;" role="form" name="form" action="{{route('Employe.destroy',$di)}}" method="POST" onsubmit="return confirm('Etes-vous sur ?');">
									  	{{csrf_field()}}
									  	{{method_field('DELETE')}}
									    <button type="submit" class="btn btn-danger "><i class="fa fa-trash icon-lg"></i> Supprimer</button>
									 </form>
					            </div>
					            <div class="modal-footer">
					                <button class="btn btn-inverse" type="button" data-dismiss="modal"><i class="fa fa-times icon-lg"></i> Annuler</button>
					            </div>
					        </div>
	        		@endforeach
	        	</tbody>
	    </table>
	    	 @else
	        	<h2 style="text-align: center; color: red;">Aucun employé n'a été enregistré pour le moment</h2>
	       	  @endif
	    <button type="button" data-toggle="modal" class="btn btn-success btn-lg" data-target="#myModal" style="float: right;"><i class="fa fa-plus"></i></button>
	</div>
	<!-- Modal d'enregistrement de Employe-->
	<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-xl">
	        <div class="modal-content">
	            <div class="modal-header modal-header-success" style="text-align: center;display: block;">
	                <h4 class="modal-title"> <i class="fa fa-home icon-lg"></i>  ENREGISTREMENT D'UN EMPLOYE </h4>
	            </div>
	            <div class="modal-body">
					  <form class="form-horizontal" role="form" name="form" action="{{route('Employe.store')}}" method="post">
					  	<hr>
					  	{{csrf_field()}}
					 <div class="form-row">
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Service</label>
					        <div class="form-group">
								   <select class="form-control" name="numServ">
									@foreach($ser ?? '' as $dis)
								     <option value="{{$dis->id}}">{{$dis->nomService}}</option>
								    @endforeach
								    </select>
							 </div>
					    </div>					  	
					    <div class="form-group col-sm-4">
					        <label for="inputEmail1" class="col-sm-4 control-label">Nom</label>
					        <div class="col-sm-20">
					            <input type="text" name="nomEmpl" class="form-control" id="inputEmail1" placeholder="Ex: OUEDRAOGO" required="true">
					        </div>
					    </div>
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Prenoms</label>
					        <div class="col-sm-20">
					            <input type="text" name="prenomEmpl" class="form-control" id="inputPassword1" placeholder="Ex: Oumarou" required="true">
					        </div>
					    </div>
					</div>
					<div class="form-row">
					    <div class="form-group col-sm-2">
					        <label for="inputPassword1" class="col-sm-8 control-label">Sexe</label>
					                    <div class="radio">
							                <label>
							                    <input type="radio" name="sexeEmpl" id="optionsRadios01" value="M" checked> Masculin
							                     <input type="radio" name="sexeEmpl" id="optionsRadios02" value="F"> Féminin
							                </label>
							            </div>
					    </div>
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-8 control-label">Date de naissance</label>
					        <div class="col-sm-20">
					            <input type="Date" name="dateNaisEmpl" class="form-control" id="inputPassword1" placeholder="" required="true">
					        </div>
					    </div>

					    <div class="form-group col-sm-6">
					        <label for="inputPassword1" class="col-sm-4 control-label">Adresse</label>
					        <div class="col-sm-20">
					            <input type="text" name="adresseEmpl" class="form-control" id="inputPassword1" placeholder="Ex: Ouagadougou" required="true">
					        </div>
					    </div>
					</div>
					 <div class="form-row">
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Telephone</label>
					        <div class="col-sm-20">
					            <input type="text" name="telEmpl" class="form-control" id="inputPassword1" placeholder="Ex: 70447262" required="true">
					        </div>
					    </div>
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-4 control-label">Poste</label>
					        <div class="col-sm-20">
					            <input type="text" name="posteEmpl" class="form-control" id="inputPassword1" placeholder="Ex: Directeur" required="true">
					        </div>
					    </div>					    
					    <div class="form-group col-sm-4">
					        <label for="inputPassword1" class="col-sm-12 control-label">Date d'embauche</label>
					        <div class="col-sm-20">
					            <input type="Date" name="dateEmbEmpl" class="form-control" id="inputPassword1" placeholder="" required="true">
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

