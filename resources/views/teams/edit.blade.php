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
                    {!! Form::model($team, ['route' => ['team.update', $team->id], 'method' => 'PATCH']) !!}

                        @include('teams._form')

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
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