@extends('template')

@section('contenu')
<div class="col-sm-offset-3 col-sm-6">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Créer un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
				@if(isset(Auth::user()->vehicule->nomVehicule))
					<?php 
						$id = Auth::user()->id; 
						$nbPlaces = Auth::user()->vehicule->nbPlacesVehicule - 1; 
					?>
					{!! Form::open(['url' => 'trajet', 'method' => 'post', 'class' => 'form-horizontal']) !!}
					<div class="form-group {!! $errors->has('villeDepartTrajet') ? 'has-error' : '' !!}">
						Ville de départ* :
						{!! Form::text('villeDepartTrajet', null, ['class' => 'form-control', 'placeholder' => 'Départ']) !!}
						{!! $errors->first('villeDepartTrajet', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('villeArriveeTrajet') ? 'has-error' : '' !!}">
						Ville d'arrivée* :
						{!! Form::text('villeArriveeTrajet', null, ['class' => 'form-control', 'placeholder' => 'Arrivée']) !!}
						{!! $errors->first('villeArriveeTrajet', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('dateDebutTrajet') ? 'has-error' : '' !!}">
						Date du trajet* :
						{!! Form::date('dateDebutTrajet', null, ['class' => 'form-control']) !!}
						{!! $errors->first('dateDebutTrajet', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('heureDepartTrajet') ? 'has-error' : '' !!}">
						Heure de départ* :
						<input type="time" class="form-control" name="heureDepartTrajet">
						{!! $errors->first('heureDepartTrajet', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('nbPlacesTrajet') ? 'has-error' : '' !!}">
						Nombre de places disponibles* :
						{!! Form::selectRange('nbPlacesTrajet', 1, $nbPlaces, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
						{!! $errors->first('nbPlacesTrajet', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('pppTrajet') ? 'has-error' : '' !!}">
						Prix par passagers (€)* :
						{!! Form::selectRange('pppTrajet', 1, 99, null, ['class' => 'form-control']) !!}
					</div>
					{!! Form::hidden('fromUser', true) !!}
					{!! Form::hidden('idConducteurTrajet', $id) !!}
					{!! Form::submit('Créer trajet', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				@else
					<div class="alert alert-danger" role="alert">
							<strong>Attention, vous ne pouvez pas proposer de trajets, vous n'avez pas encore renseigné votre véhicule. Cliquez
								<a href="{{ url('/myvehicule') }}">ici</a> pour ajouter maintenant votre véhicule.
							</strong>
					</div>
				@endif
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop