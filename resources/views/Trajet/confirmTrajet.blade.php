@extends('template')
@section('contenu')
<div class="col-sm-offset-2 col-sm-8">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Confirmation de réservation</div>
        <div class="panel-body">
            <div class="col-sm-12">
				@if(Input::get('nbPlacesTrajetReservation') != null && Input::get('nbPlacesTrajetOrigine'))
					<?php
						$nbPlaces= Input::get('nbPlacesTrajetReservation');
						$nbPlacesOrigine= Input::get('nbPlacesTrajetOrigine');
						
						$trajet_id= Input::get('trajet_id');
						
						DB::table('trajet_user')->insert(
							['user_id' => Auth::user()->id, 'trajet_id' => $trajet_id, 'nbplaces' => $nbPlaces]
						);
						
						DB::table('T_TRAJET')
							->where('id', $trajet_id)
							->update(['nbPlacesTrajet' => $nbPlacesOrigine-$nbPlaces]);
					?>
					<p>Votre réservation a été pris en compte ! Vous pouvez voir vos trajets<a href="{{ url('/mytrajet') }}"> ici</a>.</p>
				@else
					<p>Il ya eu un soucis.</p>
				@endif
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop