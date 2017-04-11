<?php
use Jenssegers\Date\Date;
Date::setLocale('fr');
?>

@extends('template')

@section('content')
    <div class="col-md-offset-2 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Discussion : "{!! $thread->subject !!}"</h3>
			</div>
			<script>
				function verifForm(f){
						var message = f.message;
						
						if(message.value.trim().length>0)
							return true;
						else
						{
							alert("Veuillez remplir le champ 'Message'.");
							return false;
						}
					}
			</script>
			<div class="panel-body">
			@foreach($thread->messages as $message)
				
				@if($message->user->name!=Auth::user()->name)
					<div class="media">			
						<div class="col-md-6">
							<div class="alert alert-info" role="alert">
								<div class="media-body">
									<h5 class="media-heading"><strong>{!! $message->user->pseudoUsers !!}</strong></h5>
									<p>{!! $message->body !!}</p>
									<div class="text-muted"><small>Posté {!! Date::parse($message->created_at)->diffForHumans() !!}</small></div>
								</div>
							</div>
						</div>
						<div class="row"></div>
					</div>

				@else
					<div class="media">			
						<div class="col-md-offset-6">
							<div class="alert alert-success" role="alert">
								<div class="media-body">
									<h5 class="media-heading"><strong>Moi</strong></h5>
									<p>{!! $message->body !!}</p>
									<div class="text-muted"><small>Posté {!! Date::parse($message->created_at)->diffForHumans() !!}</small></div>
								</div>
							</div>
						</div>
					</div>
				@endif		
			@endforeach
	
			<h5><strong><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Ajouter un nouveau message</strong></h5>
			{!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT', 'onsubmit' => 'return verifForm(this)']) !!}
			<!-- Message Form Input -->
			<div class="form-group">
				{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
			</div>
	
						<!-- Submit Form Input -->
				<div class='col-md-offset-9 col-md-3'>
					<div class="form-group">
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary form-control']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		<a href="{{ url('/messages') }}" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
    </div>
@stop