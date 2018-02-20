@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalhes da Equipe: {{ $team->name }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Fundação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $team->id }}</th>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <a href="{{ route('category.show', $team->category_id) }}">
                                        {{ $team->category->description }}
                                    </a>
                                </td>
                                <td>{{ date('d/m/Y', strtotime($team->foundation)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection