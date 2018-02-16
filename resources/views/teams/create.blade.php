@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Cadastrar Equipe
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'team.store']) !!}
                    <div class="form-group row">
                        {!! Form::label('name', 'Nome', ['class' => 'col-md-2 col-form-label']) !!}
                        <div class="col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('coachs', 'Treinador', ['class' => 'col-md-2 col-form-label']) !!}
                        <div class="col-md-10">
                            <select name="coachs" class="custom-select">
                                @foreach ($users as $user)
                                @foreach ($user->coachs as $coach)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('players', 'Jogadores', ['class' => 'col-md-2 col-form-label']) !!}
                        <div class="col-md-10">
                            <select name="players[]" class="custom-select" multiple>
                                @foreach ($users as $user)
                                @foreach ($user->players as $player)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
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