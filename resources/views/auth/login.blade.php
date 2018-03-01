@extends('layouts.login')

@section('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    {{--  <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">  --}}
    <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name', 'Laravel') }}</h1>
    <label for="email" class="sr-only">E-mail</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autofocus>
    <label for="password" class="sr-only">Senha</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember"> Mantenha-me conectado
        </label>
    </div>
    <button class="btn btn-primary btn-block" type="submit">Entrar</button>
    <a class="btn btn-link" href="{{ route('password.request') }}">
        Esqueceu Sua Senha?
    </a>
    <br>
    <a class="btn btn-link" href="{{ route('register') }}">
        Me Cadastrar
    </a>
</form>
@endsection
