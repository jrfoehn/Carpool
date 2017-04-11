@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-2 col-sm-8">
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des trajets</h3>
            </div>
			<div class="panel-body">
			@if(Auth::user()->admin==1)
		
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Ville de départ</th>
							<th>Ville d'arrivée</th>
							<th>Date</th>
							<th>Heure de départ</th>
							<th>Nombre de places</th>
							<th>Effectué</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach ($trajets as $trajet)
						<?php
							if($trajet->nbPlacesTrajet !=0){
								$nbPlaces = $trajet->nbPlacesTrajet;
							}else{
								$nbPlaces = "Complet";
							}
							
							if($trajet->statutTrajet){
								$statut = "Oui";
							}else{
								$statut = "Non";
							}
						?>
						<tr>
							<td>{!! $trajet->id !!}</td>
							<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
							<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
							<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
							<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
							<td class="text-primary"><strong>{!!  $nbPlaces !!}</strong></td>
							<td class="text-primary"><strong>{!!  $statut !!}</strong></td>
							<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['trajet.destroy', $trajet->id]]) !!}
								{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce trajet ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			
			</div>
			{!! $links !!}
		@else
			<div class="alert alert-danger" role="alert">
					<strong>Accès refusé : cette page est réservée aux administrateurs !</strong>
			</div>
		@endif
    </div>
@stop