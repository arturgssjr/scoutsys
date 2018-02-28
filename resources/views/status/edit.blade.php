@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('status.edit', $status))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Alterar Status
                </div>

                <div class="card-body">
                    {!! Form::model($status, ['route' => ['status.update', $status->id], 'method' => 'PATCH']) !!}

                        @include('status._form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('status.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection