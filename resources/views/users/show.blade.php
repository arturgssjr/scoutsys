@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Detalhes do Usuário: {{ $user->name }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Data de Nascimento</th>
                                <th>E-mail</th>
                                <th>Apelido</th>
                                <th>Permissão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->birth }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nickname }}</td>
                                <td>{{ $user->permission }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection