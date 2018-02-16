@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Cadastrar Usuário
                </div>
                <div class="card-body">

                    {!! Form::open(['route' => 'user.store']) !!}

                        <div class="form-group row">
                            {!! Form::label('name', 'Nome', ['class' => 'col-md-2 col-form-label']) !!}
                            <div class="col-md-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-md-2 col-form-label']) !!}
                            <div class="col-md-10">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('profile', 'Perfil', ['class' => 'col-md-2 col-form-label']) !!}
                            <div class="col-md-10">
                                {!! Form::select('profile[]', $profiles, null, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('user.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection