@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Usuários 
                    <a class="btn btn-sm btn-outline-success" role="button" href="{{ route('user.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a></div>

                <div class="card-body">
                    @include('layouts.forms.confirmation-modal')                    
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Perfil</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->profiles as $profile)
                                        <a href="{{ route('profile.show', $profile->id) }}">{{ $profile->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-info" role="button" href="{{ route('user.show', $user->id) }}">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-warning" role="button" href="{{ route('user.edit', $user->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger load-confirmation-modal" role="button" data-url="{{ route('user.destroy', $user->id) }}" data-type="Usuário" data-profile="{{ $user->name }}" data-target="#confirmation-modal" data-toggle="modal">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-script')
<script src="{{ asset('js/confirmation-modal.js') }}"></script>
@endsection