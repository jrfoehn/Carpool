@extends('template')

@section('content')
	<div class="col-md-offset-3 col-md-6">
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Créer un nouveau message</h3>
				</div>
				<script>
				/**
				* Cette fonction javascript permet de vérifier que les champs sujet et message ont été correctement remplis
				*/
				function verifForm(f){
					var sujet = f.subject;
					var message = f.message;
					
					if(sujet.value.trim().length >0 && message.value.trim().length>0)
						return true;
					else
					{
						alert("Veuillez remplir correctement les champs 'Sujet' et 'Message'.");
						return false;
					}
				}
				</script>
				<div class="panel-body">
					{!! Form::open(['route' => 'messages.store', 'onsubmit' => 'return verifForm(this)']) !!}
						<div class="form-group">
							{!! Form::label('subject', 'Sujet', ['class' => 'control-label']) !!}
							{!! Form::text('subject', null, ['class' => 'form-control']) !!}
						</div>
				
						<div class="form-group">
							{!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
							{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
						</div>
						
						@if(Input::get('dest_id')!=null)
				
							<?php
								$dest=App\User::find(Input::get('dest_id'));
			
							?>
							<div class="form-group">
								Destinataire : <strong>{{$dest->pseudoUsers}}</strong>
							</div>
							<input type="hidden" name="recipients[]" value="{!!$dest->id!!}">
						@else
							<?php
								$users=App\User::all();
								
								foreach($users as $user){
									if($user->id != Auth::user()->id){
										$listUsers[$user->id]=$user->pseudoUsers;
									}
								}
							?>
							Destinataire :
							{!! Form::select('recipients[]', $listUsers  , ['class' => 'dropdownn-menu']) !!}
							<br/><br/>
						@endif
									<!-- Submit Form Input -->
							<div class="col-md-offset-9 col-md-3">
								<div class="form-group">
									{!! Form::submit('Envoyer', ['class' => 'btn btn-primary form-control']) !!}
								</div>
							</div>
					{!! Form::close() !!}
		</div>
	</div>
	
	<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
@stop