@extends('layouts.admin')

@section('content')

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-60">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <i class="fa fa-edit icon-lg"></i>  Modifier la direction </h4>
            </div>
            <div class="modal-body">
				  <form class="form-horizontal" role="form" name="form" action="{{route('Direction.update',$dis)}}" method="post">
				  	{{csrf_field()}}
				  	{{method_field('PUT')}}

				    <div class="form-group">
				        <label for="inputEmail1" class="col-sm-8 control-label">Nom de la Direction</label>
	 	 			        <div class="col-sm-20">
				            <input type="text" name="nomDir" class="form-control" id="" placeholder="" required="true" value="{{$dis->nomDirection}}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="inputPassword1" class="col-sm-4 control-label">Localisation</label>
				        <div class="col-sm-20">
				            <input type="text" name="localDir" class="form-control" id="" placeholder="" required="true" value="{{$dis->localisation}}">
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-sm-offset-4 col-sm-20">
				            <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-lg"></i> Valider</button>
				            <button type="button" class="btn btn-inverse"><i class="fa fa-times icon-lg"></i> Annule</button>
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

 @stop