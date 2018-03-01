@extends('layouts.login')

@section('content')
<form class="form-signin" method="POST" action="{{ route('password.email') }}">
    @csrf

    {{--  <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">  --}}
    <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name', 'Laravel') }}<br>Redefinir Senha</h1>

    <label for="email" class="sr-only">E-Mail</label>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">

    <button class="btn btn-primary btn-block" type="submit">Enviar Link Para Redefinição da Senha</button>    
    <a href="{{ route('home') }}" class="btn btn-block btn-link">
        Cancelar
    </a>

</form>
@endsection
