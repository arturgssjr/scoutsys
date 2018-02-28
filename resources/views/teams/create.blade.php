@extends('layouts.layout') 

@section('breadcrumbs', Breadcrumbs::render('team.create'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            {!! Form::open(['route' => 'team.store']) !!}
            
            @include('teams._form')
            
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('team.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection