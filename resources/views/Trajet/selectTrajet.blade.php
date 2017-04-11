@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Créer un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
				
				@if(Input::get('villeDepartTrajet')!==null && Input::get('villeArriveeTrajet')!==null)
				TEST
				@endif
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop