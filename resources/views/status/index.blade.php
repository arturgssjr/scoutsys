@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Status 
                <a class="btn btn-sm btn-outline-success" data-toggle="tooltip" data-placement="top" title="Cadastrar status" role="button" href="{{ route('status.create') }}">
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
                            <th class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($status as $status)
                        <tr>
                            <th scope="row" class="text-center">{{ $status->id }}</th>
                            <td>{{ $status->description }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Visualizar status" role="button" href="{{ route('status.show', $status->id) }}">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Alterar status" role="button" href="{{ route('status.edit', $status->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger load-confirmation-modal" data-toggle="tooltip" data-placement="top" title="Excluir status" role="button" data-url="{{ route('status.destroy', $status->id) }}" data-type="Status" data-name="{{ $status->description }}" data-target="#confirmation-modal" data-toggle="modal">
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