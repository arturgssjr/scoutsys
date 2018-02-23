@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Detalhes do Usuário: {{ $user->name }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Data de Nascimento</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Apelido</th>
                            <th class="text-center">Permissão</th>
                            <th class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($user->birth)) }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->nickname }}</td>
                            <td class="text-center">{{ $user->permission }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Dados cadastrais do usuário" role="button" href="{{ route('detail.show', $user->id) }}">
                                    <i class="fas fa-address-card"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection