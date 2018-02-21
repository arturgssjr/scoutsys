@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Detalhes da Equipe: {{ $team->name }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Fundação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">{{ $team->id }}</th>
                            <td>{{ $team->name }}</td>
                            <td class="text-center">
                                @foreach ($team->categories as $category)
                                    <a href="{{ route('category.show', $category->id) }}">
                                        {{ $category->description }}
                                    </a>
                                @endforeach
                            </td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($team->foundation)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection