@extends('layouts.login')

@section('content')
<form class="form-signin" method="POST" action="{{ route('register') }}">
    @csrf

    {{--  <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">  --}}
    <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name', 'Laravel') }}<br>Cadastro</h1>

    <label for="name" class="sr-only">Nome</label>
    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome">

    <label for="email" class="sr-only">E-Mail</label>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">

    <label for="password" class="sr-only">Senha</label>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Senha">

    <label for="password-confirm" class="sr-only">Confirmar Senha</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Senha">

    <button type="submit" class="btn btn-block btn-primary">
        Cadastrar
    </button>
    <a href="{{ route('home') }}" class="btn btn-block btn-link">
        Cancelar
    </a>
</form>
@endsection
