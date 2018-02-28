@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        Bem-vindo {{ Auth::user()->name }}, você está logado!
    </div>
</div>
@endsection
