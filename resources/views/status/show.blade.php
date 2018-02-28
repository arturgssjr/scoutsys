@extends('layouts.layout')

@section('breadcrumbs', Breadcrumbs::render('status.show', $status))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">{{ $status->id }}</th>
                    <td>{{ $status->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection