@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Detalhes da Equipe: {{ $team->name }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Fundação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $team->id }}</th>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->foundation }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection