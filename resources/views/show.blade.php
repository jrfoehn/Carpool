@extends('template')

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'utilisateur</div>
			<div class="panel-body"> 
				Voici les informations du compte sélectionné :
				<li>Nom : {{ $user->name }}</li>
				<li>Prénom : {{ $user->prenomUsers }}</li>
				<li>Pseudo : {{ $user->pseudoUsers }}</li>
				<li>Email : {{ $user->email }}</li>
				<li>Date de naissance : {{ $user->dateNaissanceUsers }}</li>
				
				<?php
				
					$tab_notes=array("A éviter","Décevant", "Bien", "Excellent", "Extraordinaire");
				
				?>
				
				@if($user->notes->count()!=0)
								<?php
									$note_moyenne=0;
									$i=0;
									foreach($user->notes as $appreciation){
										$i++;
										$note=$appreciation->valeurAppreciation;
										$note_moyenne+=$note;
									}
									$note_moyenne=$note_moyenne/$i;
								?>
								<li>Note moyenne de passager : <strong>{{ $tab_notes[round($note_moyenne)] }}</strong></li>
							@else
								<li>Note moyenne de passager : cet utilisateur n'a pas encore été noté!<li>
							@endif
							
							@if($user->trajets->count()!=0)
								<?php
									$aEteNote= false;
									foreach($user->trajets as $trajet){
										if($trajet->note->count()!=0){
											$aEteNote=true;
										}
									}
								?>
								@if($aEteNote)
									<?php
									
										$note_moyenne=0;
										$i=0;
										foreach($user->trajets as $trajet){
											foreach($trajet->note as $appreciation){
												$i++;
												$note=$appreciation->valeurAppreciation;
												$note_moyenne+=$note;
											}
										}
										$note_moyenne=$note_moyenne/$i;
									?>
								
									<li>Note moyenne de conducteur : <strong>{{ $tab_notes[round($note_moyenne)] }}</strong></li>
								@else
									<li>Note moyenne de conducteur : Cet utilisateur n'a pas encore été noté !<li>
								@endif
							@endif
				<?php if($user->telPortUsers !=''){ ?>
					<li>Numéro de tel. portable : {{ $user->telPortUsers }}</li>				
				<?php } ?>
				
				<?php if($user->telFixeUsers !=''){ ?>
					<li>Numéro de tel. fixe : {{ $user->telFixeUsers }}</li>				
				<?php } ?>
				
				<div class="form-group">
						Photo de profil actuelle :
						<img src="../../../public/images/{!! $user->photoUsers !!}" alt="Photo de profil" class="img-thumbnail">
				</div>
				
				@if($user->admin == 1)
					Administrateur
				@endif
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop