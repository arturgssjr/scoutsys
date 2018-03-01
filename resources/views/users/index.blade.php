@extends('layouts.layout') 

@section('breadcrumbs', Breadcrumbs::render('user.index'))

@section('content')

<a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Cadastrar usuário" role="button" href="{{ route('user.create') }}">
    Cadastrar usuário <i class="fas fa-plus-circle"></i>
</a>
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layouts.forms.confirmation-modal')
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Data de Nascimento</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Permissão</th>
                    <th class="text-center">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row" class="text-center">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($user->birth)) }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @foreach ($user->categories as $category)
                        <a href="{{ route('category.show', $category->id) }}">
                            {{ $category->description }}
                        </a>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ($user->statuses as $status)
                        <a href="{{ route('status.show', $status->id) }}">
                            {{ $status->description }}
                        </a>
                        @endforeach
                    </td>
                    <td class="text-center">{{ $user->permission }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar usuário" role="button" href="{{ route('user.show', $user->id) }}">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar usuário" role="button" href="{{ route('user.edit', $user->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir usuário" role="button" data-url="{{ route('user.destroy', $user->id) }}" data-type="Usuário" data-name="{{ $user->name }}" data-target="#confirmation-modal" data-toggle="modal">
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