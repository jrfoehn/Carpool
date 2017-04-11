@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Inscription</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nom*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Prénom*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenomUsers" value="{{ old('prenomUsers') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Pseudo*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="pseudoUsers" value="{{ old('pseudoUsers') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Date de naissance*</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="dateNaissanceUsers" value="{{ old('dateNaissanceUsers') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse e-mail*</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Téléphone portable*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telPortUsers" value="{{ old('telPortUsers') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Téléphone fixe</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telFixeUsers" value="{{ old('telFixeUsers') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe*</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmer mot de passe*</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						
						<div class="form-group {!! $errors->has('photoUsers') ? 'has-error' : '' !!}">
						<label class="col-md-4 control-label">Photo de profil*</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="photo">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Inscription
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
