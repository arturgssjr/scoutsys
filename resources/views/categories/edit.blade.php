@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Alterar Categoria
                </div>

                <div class="card-body">
                    {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PATCH']) !!}

                        @include('categories._form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('category.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection