@extends('template')

@section('contenu')
<div class="col-sm-offset-2 col-sm-8">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">Fiche trajet</div>
        <div class="panel-body">
			<?php
				$tab_notes=array("A éviter","Décevant", "Bien", "Excellent", "Extraordinaire");
			?>
			
			@if(Input::get('note')!=null && Input::get('user_id') != null && Input::get('trajet_id')!=null)
						<?php
						//Ici on gère le retour du formulaire lors de la création d'appréciation
							$trajet_id=Input::get('trajet_id');
							$note = Input::get('note');
							$user = Input::get('user_id');
							
							$appreciations=App\Appreciation_user::all();
							$ever_rated=false;
							foreach($appreciations as $appreciation){
								if($appreciation->trajet_id==$trajet_id
									&& $appreciation->user_rater==Auth::user()->id 
									&& $appreciation->user_id==$user){
									$ever_rated=true;
								}
							}
							
						?>
							@if(!$ever_rated)
								<?php
									DB::table('t_appreciation_user')->insert(
										['user_rater' => Auth::user()->id, 'trajet_id' => $trajet_id, 'user_id' => $user, 'valeurAppreciation' => $note]
									);
								?>
							@endif
						<div class="alert alert-success" role="alert">
							<strong>Votre note a bien été enregistrée.</strong>
						</div>
			@endif
			
			
            <p>Voici les informations du trajet sélectionné :</p><br/>
            <li>Ville de départ : <strong>{{ $trajet->villeDepartTrajet }}</strong></li>

            <li>Ville d'arrivée : <strong>{{ $trajet->villeArriveeTrajet }}</strong></li>
			
            <li>Date du trajet : <strong>{{ $trajet->dateDebutTrajet }}</strong></li>

            <li>Heure de départ : <strong>{{ $trajet->heureDepartTrajet }}</strong></li>

            <li>Prix par personne : <strong>{{ $trajet->pppTrajet }} €</strong></li>
			
			<li>Nombres de places disponibles :<strong>{{ $trajet->nbPlacesTrajet }}</strong></li>			
			
				<br/><p>Liste des passagers :</p>
				<?php
					$users = $trajet->passagers;
				?>
				<table class="table">
					<thead>
						<tr>
							<th>Pseudo</th>
							<th>Nb de places réservées</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							@if($user->pseudoUsers != Auth::user()->pseudoUsers)
							
							<?php
								//permet de récupérer le nombre de places qu'a réservé l'utilisateur
								$result = DB::select('select nbplaces from trajet_user where user_id =:userid AND trajet_id =:trajetid', ['trajetid'=>$trajet->id,'userid'=>$user->id]);
								$nbplaces = $result[0]->nbplaces;
							?>
								<tr>
									<td class="text-primary"><strong>{!! $user->pseudoUsers !!}</strong></td>
									<td>{{ $nbplaces }}</td>
									<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>	
									<td>
										{!! Form::open(array('url' => '/messages/create')) !!}
										{!! Form::hidden('dest_id', $user->id) !!}
										{!! Form::submit('Envoyer un message', ['class' => 'btn btn-success btn-block']) !!}
										{!! Form::close() !!}
									</td>
									@if($trajet->statutTrajet==1)
										<?php
											$aNote=false;
											$appreciations=$user->notes;
											
											foreach($appreciations as $appreciation){
												$idUser =  Auth::user()->id;
												if(trim($appreciation->user_rater) == trim($idUser) 
													&& trim($appreciation->user_id) == trim($user->id)
													&& $appreciation->trajet_id == $trajet->id){
													$aNote=true;
													$note=$appreciation->valeurAppreciation;
												}
											}
										?>
										@if(!$aNote && $trajet->idConducteurTrajet == Auth::user()->id)
											<td>
												{!! Form::open(array('method' => 'post')) !!}
												{!! Form::select('note', $tab_notes, null, ['class' => 'form-control']) !!}
											</td>
											
											<td>
												{!! Form::hidden('user_id', $user->id) !!}
												{!! Form::hidden('trajet_id', $trajet->id) !!}
												{!! Form::submit('Noter', ['class' => 'btn btn-warning btn-block']) !!}
												{!! Form::close() !!}
											</td>
										@elseif($trajet->idConducteurTrajet == Auth::user()->id)
											<td>
												<strong><h6><i>Vous avez noté ce passager comme étant "{{ $tab_notes[$note] }}".</i></h6></strong>
											</td>
										@endif
									@endif					
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			
			<?
			//ici on affiche les informations du conducteur si l'utilisateur n'est pas le conducteur
			?>
			@if($trajet->idConducteurTrajet != Auth::user()->id)
				<br/><p>Conducteur :</p>
				<table class="table">
					<thead>
						<tr>
							<th>Pseudo</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$user = App\User::find($trajet->idConducteurTrajet);
					?>
						<tr>
							<td class="text-primary"><strong>{!! $user->pseudoUsers!!}</strong></td>
							<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>	
							<td>
								{!! Form::open(array('url' => '/messages/create')) !!}
								{!! Form::hidden('dest_id', $user->id) !!}
								{!! Form::submit('Envoyer un message', ['class' => 'btn btn-success btn-block']) !!}
								{!! Form::close() !!}
							</td>						
						</tr>
					</tbody>
				</table>
			@endif
        </div>
    </div>
	@if(Auth::user()->admin)
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	@else
		<a href="{{ url('/mytrajet') }}" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	@endif
</div>
@stop