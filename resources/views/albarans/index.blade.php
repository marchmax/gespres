@extends('layouts.app')
@section('content')
<div class="container">
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Llista d'Albarans
                        <a class="btn btn-success" href="{{ route('albarans.create') }}"> Create New Albarà</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped" id="laravel_datatable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Número Albarà</th>
                        <th>Data Albarà</th>
                        <th>Client</th>
                        <th>Total</th>

                    </tr>
                    </thead>
                    @foreach ($albara as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->numalbara }}</td>
                        <td>{{ $product->dataalbara }}</td>
                        <td>{{ $product->client->nom }}</td>
                        <td>{{ $product->total }}</td>
                    </tr>
                    @endforeach
                    </table>
                    {!! $albara->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
