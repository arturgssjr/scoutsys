@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('category.create'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {!! Form::open(['route' => 'category.store']) !!}
            
            @include('categories._form')
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('category.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection