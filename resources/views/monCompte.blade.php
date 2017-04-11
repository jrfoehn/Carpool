@extends('template')

@section('contenu')
    <div class="col-md-offset-3 col-md-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Espace mon compte</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					<?php 
						$user=Auth::user();
						$tab_notes=array("A éviter","Décevant", "Bien", "Excellent", "Extraordinaire");
					?>
					{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put',  'files'=>true, 'class' => 'form-horizontal panel']) !!}
						<div class="form-group">
							<p>Nom : <strong>{{ $user->name }}</strong></p>
							<p>Prénom : <strong>{{ $user->prenomUsers }}</strong></p>
							<p>Email : <strong>{{ $user->email }}</strong></p>
							<p>Pseudo : <strong>{{ $user->pseudoUsers }}</strong></p>
							<p>Date de naissance : <strong>{{ $user->dateNaissanceUsers }}</strong><p>
							<p>Solde : <strong>{{ $user->soldeUsers }}€</strong><p>
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
								<p>Note moyenne de passager : <strong>{{ $tab_notes[round($note_moyenne)] }}</strong><p>
							@else
								<p>Note moyenne de passager : vous n'avez pas encore été noté !<p>
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
									<p>Note moyenne de conducteur : <strong>{{ $tab_notes[round($note_moyenne)] }}</strong><p>
								@else
									<p>Note moyenne de conducteur : vous n'avez pas encore été noté !<p>
								@endif
							@endif
						</div>
						<div class="form-group {!! $errors->has('telPortUsers') ? 'has-error' : '' !!}">
							Téléphone portable*
							{!! Form::text('telPortUsers', null, ['class' => 'form-control']) !!}
							{!! $errors->first('telPortUsers', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group {!! $errors->has('telFixeUsers') ? 'has-error' : '' !!}">
							Téléphone fixe
							{!! Form::text('telFixeUsers', null, ['class' => 'form-control']) !!}
							{!! $errors->first('telFixeUsers', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group">
							Photo de profil actuelle :<br/>
							<img src="../../public/images/{!! $user->photoUsers !!}" alt="Photo de profil" class="img-thumbnail">
						</div>
						<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
						Changer de photo de profil
							<input type="file" class="form-control" name="photo">
							{!! $errors->first('photo', '<small class="help-block">:message</small>') !!}
						</div>
						{!!  Form::hidden('fromAccount', true) !!}
						{!! Form::submit('Enregistrer informations', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop