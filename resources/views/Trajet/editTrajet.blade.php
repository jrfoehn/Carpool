@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">Modification d'un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
                {!! Form::model(['url' => 'trajet', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                <div class="form-group {!! $errors->has('villeDepartTrajet') ? 'has-error' : '' !!}">
                    Nom :
                    {!! Form::text('villeDepartTrajet', null, ['class' => 'form-control', 'placeholder' => 'Départ']) !!}
                    {!! $errors->first('villeDepartTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('villeArriveeTrajet') ? 'has-error' : '' !!}">
                    Marque :
                    {!! Form::text('villeArriveeTrajet', null, ['class' => 'form-control', 'placeholder' => 'Arrivée']) !!}
                    {!! $errors->first('villeArriveeTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Date du trajet*</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="dateDebutTrajet" value="{{ old('dateDebutTrajet') }}">
                    </div>
                </div>
                <div class="form-group {!! $errors->has('nbPlacesTrajet') ? 'has-error' : '' !!}">
                    Nombre de places disponibles :
                    {!! Form::selectRange('nbPlacesTrajet', 1, 5, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
                    {!! $errors->first('nbPlacesTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('pppTrajet') ? 'has-error' : '' !!}">
                    Prix par passagers :
                    {!! Form::selectRange('pppTrajet', 1, 99, null, ['class' => 'form-control', 'placeholder' => 'Prix par passagers']) !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <a href="#" onclick="history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop