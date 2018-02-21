@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Categorias 
                <a class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Cadastrar categoria" role="button" href="{{ route('category.create') }}">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>

            <div class="card-body">
                @include('layouts.forms.confirmation-modal')
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Descrição</th>
                            <th class="text-center"># de Treinadores</th>
                            <th class="text-center"># de Jogadores</th>
                            <th class="text-center"># de Equipes</th>
                            <th class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row" class="text-center">{{ $category->id }}</th>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">{{ $category->users->where('permission', 'app.coach')->count() }}</td>
                            <td class="text-center">{{ $category->users->where('permission', 'app.player')->count() }}</td>
                            <td class="text-center">{{ $category->teams->count() }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar categoria" role="button" href="{{ route('category.show', $category->id) }}">
                                    <i class="fas fa-user-circle"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar categoria" role="button" href="{{ route('category.edit', $category->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir categoria" role="button" data-url="{{ route('category.destroy', $category->id) }}" data-type="Categoria" data-name="{{ $category->description }}" data-target="#confirmation-modal" data-toggle="modal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-script')
<script src="{{ asset('js/confirmation-modal.js') }}"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
@endsection