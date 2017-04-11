@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un véhicule</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($vehicule, ['route' => ['vehicule.update', $vehicule->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('nomVehicule') ? 'has-error' : '' !!}">
						Nom :
					  	{!! Form::text('nomVehicule', null, ['class' => 'form-control', 'placeholder' => 'Nom du véhicule']) !!}
					  	{!! $errors->first('nomVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('marqueVehicule') ? 'has-error' : '' !!}">
						Marque :
					  	{!! Form::text('marqueVehicule', null, ['class' => 'form-control', 'placeholder' => 'Marque du véhicule']) !!}
					  	{!! $errors->first('marqueVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('couleurVehicule') ? 'has-error' : '' !!}">
						Couleur :
					  	{!! Form::text('couleurVehicule', null, ['class' => 'form-control', 'placeholder' => 'Couleur du véhicule']) !!}
					  	{!! $errors->first('couleurVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('dateMiseEnService') ? 'has-error' : '' !!}">
						Date de mise en service :
					  	{!! Form::date('dateMiseEnService', null, ['class' => 'form-control']) !!}
					  	{!! $errors->first('dateMiseEnService', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('nbPlacesVehicule') ? 'has-error' : '' !!}">
						Nombre de places disponibles : 
					  	{!! Form::selectRange('nbPlacesVehicule', 1, 5, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
					  	{!! $errors->first('nbPlacesVehicule', '<small class="help-block">:message</small>') !!}
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop