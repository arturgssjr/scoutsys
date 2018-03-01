@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('category.show', $category))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Equipes</th>
                    <th class="text-center">Treinadores</th>
                    <th class="text-center">Jogadores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">{{ $category->id }}</th>
                    <td>{{ $category->description }}</td>
                    <td>
                        @foreach ($category->teams as $team) 
                            <a href="{{ route('team.show', $team->id) }}">{{ $team->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($category->users->where('permission', 'app.coach') as $coach) 
                            <a href="{{ route('user.show', $coach->id) }}">{{ $coach->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($category->users->where('permission', 'app.player') as $player) 
                            <a href="{{ route('user.show', $player->id) }}">{{ $player->name }}</a>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection