@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Detalhes da Status: {{ $status->description }}</div>
            <div class="card-body">
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
    </div>
</div>
@endsection