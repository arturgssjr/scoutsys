@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Categorias 
                    <a class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Cadastrar categoria" role="button" href="{{ route('category.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a></div>

                <div class="card-body">
                    @include('layouts.forms.confirmation-modal')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar categoria" role="button" href="{{ route('category.show', $category->id) }}">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar categoria" role="button" href="{{ route('category.edit', $category->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir categoria" role="button" data-url="{{ route('category.destroy', $category->id) }}" data-type="Categoria" data-name="{{ $category->description }}" data-target="#confirmation-modal" data-toggle="modal">
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