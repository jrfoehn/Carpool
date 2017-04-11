@extends('template')

@section('contenu')
<div class="col-sm-offset-2 col-sm-8">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Trouver un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
			
			<?php
			$villeDep = array_unique(DB::table('T_TRAJET')->lists('villeDepartTrajet'));
			$villeArr = array_unique(DB::table('T_TRAJET')->lists('villeArriveeTrajet'));
			
			?>
				{!! Form::open() !!}
				
				<div class="form-group {!! $errors->has('villeDepartTrajet') ? 'has-error' : '' !!}">
						Ville de départ* :
						{!! Form::select('villeDepartTrajet', $villeDep , ['class' => 'dropdownn-menu']) !!}
						
				</div>
				
				<div class="form-group {!! $errors->has('villeArriveeTrajet') ? 'has-error' : '' !!}">
						Ville d'arrivée* :
						{!! Form::select('villeArriveeTrajet', $villeArr , ['class' => 'form-control']) !!}
				</div>
				
				<div class="form-group {!! $errors->has('dateDebutTrajet') ? 'has-error' : '' !!}">
						Date du trajet* :
						{!! Form::date('dateDebutTrajet', null, ['class' => 'form-control']) !!}
				</div>
				
				{!! Form::submit('Lancer la recherche', ['class' => 'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
				
				@if(Input::get('villeDepartTrajet')!=null && Input::get('villeArriveeTrajet')!=null)
					<?php	
						$depart=Input::get('villeDepartTrajet');
						$arrivee=Input::get('villeArriveeTrajet');
						$date=Input::get('dateDebutTrajet');
						$trajets = App\Trajet::all();
						$nbRes=0;
					?>
					
					<br/><br/>
					<p>Résultat de la recherche :</p>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Ville de départ</th>
								<th>Ville d'arrivée</th>
								<th>Date</th>
								<th>Heure de départ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach ($trajets as $trajet)
							@if($date==null && $trajet->nbPlacesTrajet >0 && $trajet->idConducteurTrajet != Auth::user()->id)
								@if($trajet->villeDepartTrajet == $villeDep[$depart] && $trajet->villeArriveeTrajet == $villeArr[$arrivee] && !$trajet->statutTrajet)
									<?php $nbRes++; ?>
									<tr>
										<td>{!! $trajet->id !!}</td>
										<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
										<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
										<td>
											{!! Form::open(array('url' => '/confirmtrajet')) !!}
											Nb de places
											{!! Form::selectRange('nbPlacesTrajetReservation', 1, $trajet->nbPlacesTrajet, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
										</td>
										<td>
											{!! Form::hidden('trajet_id', $trajet->id) !!}
											{!! Form::hidden('nbPlacesTrajetOrigine', $trajet->nbPlacesTrajet) !!}
											{!! Form::submit('Réserver ce trajet', ['class' => 'btn btn-success btn-block', 'onclick' => 'return confirm(\'Voulez-vous vraiment vous inscrire sur ce trajet ?\')']) !!}
											{!! Form::close() !!}
										</td>
									</tr>
								@endif
							@elseif($trajet->nbPlacesTrajet >0 && $trajet->idConducteurTrajet != Auth::user()->id)
								@if($trajet->villeDepartTrajet == $villeDep[$depart] && $trajet->villeArriveeTrajet == $villeArr[$arrivee] && $trajet->dateDebutTrajet == $date && !$trajet->statutTrajet)
									{!! $nbRes++ !!}
									<tr>
										<td>{!! $trajet->id !!}</td>
										<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->nbPlacesTrajet !!}</strong></td>
										<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
										<td>
											{!! Form::open(array('url' => '/confirmtrajet')) !!}
											Nb de places
											{!! Form::selectRange('nbPlacesTrajetReservation', 1, $trajet->nbPlacesTrajet, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
										</td>
										<td>
											{!! Form::hidden('trajet_id', $trajet->id) !!}
											{!! Form::hidden('nbPlacesTrajetOrigine', $trajet->nbPlacesTrajet) !!}
											{!! Form::submit('Réserver ce trajet', ['class' => 'btn btn-success btn-block', 'onclick' => 'return confirm(\'Voulez-vous vraiment vous inscrire sur ce trajet ?\')']) !!}
											{!! Form::close() !!}
										</td>
									</tr>
								@endif
							@endif
						@endforeach
						</tbody>
					</table>
					@if($nbRes==0)
						<div class="alert alert-danger" role="alert">
							<a href="#" class="alert-link">Désolé, aucun trajet n'a été trouvé.</a>
						</div>
					@endif
				@endif
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop