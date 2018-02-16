@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Alterar Equipe
                </div>

                <div class="card-body">
                    {!! Form::model($team, ['route' => ['team.update', $team->id]]) !!}

                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Nome', ['class' => 'col-md-2 col-form-label']) !!}
                            <div class="col-md-10">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('team.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection