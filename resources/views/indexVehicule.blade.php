@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des véhicules</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vehicules as $vehicule)
						<tr>
							<td>{!! $vehicule->idVehicule !!}</td>
							<td class="text-primary"><strong>{!! $vehicule->nomVehicule !!}</strong></td>
							<td>{!! link_to_route('vehicule.show', 'Voir', [$vehicule->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('vehicule.edit', 'Modifier', [$vehicule->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['vehicule.destroy', $vehicule->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('user.create', 'Ajouter un véhicule', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop