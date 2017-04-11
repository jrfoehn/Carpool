@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un véhicule</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['url' => 'vehicule', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('nomVehicule') ? 'has-error' : '' !!}">
					  	{!! Form::text('nomVehicule', null, ['class' => 'form-control', 'placeholder' => 'Nom du véhicule']) !!}
					  	{!! $errors->first('nomVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('marqueVehicule') ? 'has-error' : '' !!}">
					  	{!! Form::text('marqueVehicule', null, ['class' => 'form-control', 'placeholder' => 'Marque du véhicule']) !!}
					  	{!! $errors->first('marqueVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('couleurVehicule') ? 'has-error' : '' !!}">
					  	{!! Form::text('couleurVehicule', null, ['class' => 'form-control', 'placeholder' => 'Couleur du véhicule']) !!}
					  	{!! $errors->first('couleurVehicule', '<small class="help-block">:message</small>') !!}
					</div>
					Date de mise en circulation
					<div class="form-group {!! $errors->has('dateMiseEnService') ? 'has-error' : '' !!}">
					  	{!! Form::date('dateMiseEnService', null, ['class' => 'form-control']) !!}
					  	{!! $errors->first('dateMiseEnService', '<small class="help-block">:message</small>') !!}
					</div>
					Nombre de places disponibles : 
					<div class="form-group {!! $errors->has('nbPlacesVehicules') ? 'has-error' : '' !!}">
					  	{!! Form::selectRange('nbPlacesVehicules', 1, 5, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
					  	{!! $errors->first('nbPlacesVehicules', '<small class="help-block">:message</small>') !!}
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