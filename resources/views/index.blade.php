@extends('template')

@section('contenu')
    <br>
    <div class="col-md-offset-3 col-sm-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Liste des utilisateurs</h3>
					</div>
		<div class="panel-body">
			@if(Auth::user()->admin==1)
				
			
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Pseudo</th>
								<th>Conducteur</th>
								<th>Admin</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<?php
									$statutAdmin="Non";
									$statutConducteur="Non";
									if($user->vehicule!=null)	$statutConducteur="Oui";
								    if($user->admin) $statutAdmin="Oui";
								?>
								<tr>
									<td>{!! $user->id !!}</td>
									<td class="text-primary"><strong>{!! $user->pseudoUsers !!}</strong></td>
									<td class="text-primary"><strong>{!! $statutConducteur !!}</strong></td>
									<td class="text-primary"><strong>{!! $statutAdmin !!}</strong></td>
									<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
									<td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
									<td>
										{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
											{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
										{!! Form::close() !!}
	
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				{!! $links !!}
		@else
				<div class="alert alert-danger" role="alert">
					<strong>Accès refusé : cette page est réservée aux administrateurs !</strong>
				</div>
		@endif			
			</div>
		</div>		
	</div>		
@stop