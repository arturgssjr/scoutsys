@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Detalhes da Categoria: {{ $category->description }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection