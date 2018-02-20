@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Equipes
                    <a class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Cadastrar equipe" role="button"
                        href="{{ route('team.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a></div>
                <div class="card-body">
    @include('layouts.forms.confirmation-modal')
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Fundação</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <th scope="row">{{ $team->id }}</th>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->category->description }}</td>
                                <td>{{ date('d/m/Y', strtotime($team->foundation)) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Atribuir treinador" role="button"
                                        href="#">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Atribuir jogadores" role="button"
                                        href="#">
                                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar equipe" role="button"
                                        href="{{ route('team.show', $team->id) }}">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar equipe" role="button"
                                        href="{{ route('team.edit', $team->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir equipe"
                                        role="button" data-url="{{ route('team.destroy', $team->id) }}" data-type="Perfil" data-name="{{ $team->name }}"
                                        data-target="#confirmation-modal" data-toggle="modal">
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
<script src="{{ asset('js/tooltip.js') }}"></script>
@endsection