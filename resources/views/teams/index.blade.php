@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Equipes 
                    <a class="btn btn-sm btn-outline-success" role="button" href="{{ route('team.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a></div>

                <div class="card-body">
                    @include('layouts.forms.confirmation-modal')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <th scope="row">{{ $team->id }}</th>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-info" role="button" href="{{ route('team.show', $team->id) }}">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-warning" role="button" href="{{ route('team.edit', $team->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger load-confirmation-modal" role="button" data-url="{{ route('team.destroy', $team->id) }}" data-type="Perfil" data-team="{{ $team->name }}" data-target="#confirmation-modal" data-toggle="modal">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-script')
<script src="{{ asset('js/confirmation-modal.js') }}"></script>
@endsection