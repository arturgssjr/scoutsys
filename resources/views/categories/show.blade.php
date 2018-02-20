@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalhes da Categoria: {{ $category->description }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Equipes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->description }}</td>
                                <td>
                                    @foreach ($category->teams as $team) 
                                        <a href="{{ route('team.show', $team->id) }}">{{ $team->name }}</a>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection