@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des véhicules</h3>
			</div>
		<div class="panel-body">
		@if(Auth::user()->admin==1)
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Propriétaire</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vehicules as $vehicule)
						<tr>
							<td>{!! $vehicule->id !!}</td>
							<td class="text-primary"><strong>{!! $vehicule->nomVehicule !!}</strong></td>
							<td>{!! $vehicule->user->pseudoUsers !!}</td>
							<td>{!! link_to_route('vehicule.show', 'Voir', [$vehicule->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['vehicule.destroy', $vehicule->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce véhicule ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		@else
			<div class="alert alert-danger" role="alert">
				<strong>Accès refusé : cette page est réservée aux administrateurs !</strong>
			</div>
		@endif

		</div>
	</div></div>
@stop