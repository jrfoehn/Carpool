@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche véhicule</div>
			<div class="panel-body"> 
				Voici les informations du véhicule sélectionné :
				<li>Nom  du véhicule: <strong> {{ $vehicule->nomVehicule }}</strong></li>
				
				<li>Marque du véhicule : <strong> {{ $vehicule->marqueVehicule }}</strong></li>
				
				<li>Couleur du véhicule : <strong>{{ $vehicule->couleurVehicule }}</strong></li>

				<li>Nb de places diponibles : <strong> {{ $vehicule->nbPlacesVehicule }}</strong> </li>
				
				<li>Date de mise en service : <strong> {{ $vehicule->dateMiseEnService }}</strong> </li>
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop