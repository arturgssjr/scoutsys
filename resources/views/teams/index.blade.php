@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('team.index'))

@section('content')

<a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Cadastrar equipe" role="button" href="{{ route('team.create') }}">
    Cadastrar equipe <i class="fas fa-plus-circle"></i>
</a>
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.forms.confirmation-modal')
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Fundação</th>
                    <th class="text-center">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr>
                    <th scope="row" class="text-center">{{ $team->id }}</th>
                    <td>{{ $team->name }}</td>
                    <td>
                        @foreach ($team->categories as $category)
                        <a href="{{ route('category.show', $category->id) }}">
                            {{ $category->description }}
                        </a>
                        @endforeach
                    </td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($team->foundation)) }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Atribuir treinador" role="button"
                            href="#">
                            <i class="fas fa-user"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Atribuir jogadores" role="button"
                            href="#">
                            <i class="fas fa-users"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar equipe" role="button"
                            href="{{ route('team.show', $team->id) }}">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar equipe" role="button"
                            href="{{ route('team.edit', $team->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir equipe"
                            role="button" data-url="{{ route('team.destroy', $team->id) }}" data-type="Equipes" data-name="{{ $team->name }}"
                            data-target="#confirmation-modal" data-toggle="modal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection
 
@section('after-script')
<script src="{{ asset('js/confirmation-modal.js') }}"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
@endsection