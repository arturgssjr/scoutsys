@extends('layouts.layout') 

@section('details-content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Endereço</th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center">CEP</th>
                    <th class="text-center">Cidade</th>
                    <th class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">{{ $details->users->address }}</th>
                    <td>{{ $details->users->phone }}</td>
                    <td class="text-center">{{ $details->users->zipcode }}</td>
                    <td class="text-center">{{ $details->users->city }}</td>
                    <td class="text-center">{{ $details->users->state }}</td>
                    {{--  <td class="text-center">
                        <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Dados cadastrais do usuário" role="button" href="{{ route('detail.show', $details->users->id) }}">
                            <i class="fas fa-address-card"></i>
                        </a>
                    </td>  --}}
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
 
@section('after-script')
<script src="{{ asset('js/confirmation-modal.js') }}"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
@endsection