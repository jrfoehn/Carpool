@extends('template')

@section('content')
	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Boîte de réception</h3>
			</div>
			
			<div class="panel-body">
				@if (Session::has('error_message'))
					<div class="alert alert-danger" role="alert">
						{!! Session::get('error_message') !!}
					</div>
				@endif
				@if($threads->count() > 0)
					@foreach($threads as $thread)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									<h4 class="media-heading">Sujet : {!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
								</h3>
							</div>
							<div class="panel-body">
								<?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
								<div class="media alert {!!$class!!}">
								<p>{!! $thread->latestMessage->body !!}</p>
								<p><small><strong>Pseudo du destinataire : </strong> {!! $thread->participantsString(Auth::id(), ['pseudoUsers']) !!}</small></p>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<div class="alert alert-warning" role="alert">
							<strong>Vous n'avez aucun message.</strong>
					</div>
				@endif
				
				<div class="col-md-offset-4 col-md-4">
					{!! HTML::decode(link_to_route('messages.create', '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Créer nouveau message', null, ['class' => 'btn btn-success btn-block'])) !!}
				</div>
			</div>
		</div>
	</div>
@stop