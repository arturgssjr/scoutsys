@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('user.edit', $user))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH']) !!}
            
            @include('users._form')

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('user.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('name')
    
@endsection