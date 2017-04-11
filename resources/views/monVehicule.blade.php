@extends('template')

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Espace mon véhicule</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					@if(!isset(Auth::user()->vehicule->nomVehicule))
						<?php $id = Auth::user()->id; ?>
						
						{!! Form::open(['url' => 'vehicule', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
							<div class="form-group">
								Vous n'avez pas encore enregistré votre véhicule, vous pouvez le faire sur cette page.<br/>
								Si vous souhaitez devenir conducteur et proposer des trajets, cette étape est ogligatoire.<br/>
							</div>
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
							
							<div class="form-group {!! $errors->has('dateMiseEnService') ? 'has-error' : '' !!}">
								Date de mise en circulation
								{!! Form::date('dateMiseEnService', null, ['class' => 'form-control']) !!}
								{!! $errors->first('dateMiseEnService', '<small class="help-block">:message</small>') !!}
							</div>
							 
							<div class="form-group {!! $errors->has('nbPlacesVehicules') ? 'has-error' : '' !!}">
								Nombre de places disponibles :
								{!! Form::selectRange('nbPlacesVehicule', 2, 8, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
								{!! $errors->first('nbPlacesVehicule', '<small class="help-block">:message</small>') !!}
							</div>
							{!! Form::hidden('user_id', $id) !!}
							{!! Form::hidden('fromVehicule', true) !!}
							{!! Form::submit('Enregistrer mon véhicule', ['class' => 'btn btn-primary pull-right']) !!}
						{!! Form::close() !!}
					@else
						<?php 
							$nom = Auth::user()->vehicule->nomVehicule; 						
							$marque = Auth::user()->vehicule->marqueVehicule; 						
							$couleur = Auth::user()->vehicule->couleurVehicule; 						
							$nbPlaces = Auth::user()->vehicule->nbPlacesVehicule;
							$dateMiseEnService = Auth::user()->vehicule->dateMiseEnService; 						
						?>
						<p>Comme vous avez renseigné un véhicule, vous pouvez proposer des trajets.<br/>Voici les informations correspondant à votre véhicule :</p>
						<li>Nom du véhicule : <strong> {!! $nom !!}</strong> </li>	
						<li>Marque du véhicule : <strong> {!! $marque !!}</strong> </li>								
						<li>Couleur du véhicule : <strong> {!! $couleur!!}</strong> </li>					
						<li>Nombres de places disponibles : <strong> {!! $nbPlaces !!}</strong> </li>					
						<li>Date de mise en service du véhicule: <strong> {!! $dateMiseEnService !!}</strong> </li>					
					@endif
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop