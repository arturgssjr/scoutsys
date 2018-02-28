@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('team.show', $team))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
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
@endsection