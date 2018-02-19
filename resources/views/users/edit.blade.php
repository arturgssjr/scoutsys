@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Detalhes do Usuário: {{ $user->name }}</div>
                <div class="card-body">

                    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH']) !!}
                    
                    @include('users._form')

                    <div class="form-group row">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
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

@section('name')
    
@endsection