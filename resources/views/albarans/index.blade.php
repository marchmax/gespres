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
                <div class="card-header"><h4>Llista d'Albarans
                        <a class="btn btn-success float-right" href="{{ route('albarans.create') }}"> Crea albarà nou</a></h4>
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
                        <th>Accions</th>

                    </tr>
                    </thead>
                    @foreach ($albara as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->numalbara }}</td>
                        <td>{{ $product->dataalbara }}</td>
                        <td>{{ $product->client->nom }}</td>
                        <td>{{ $product->total }}</td>
                        <td><a href="{{ route('albarans.show',$product->id) }}" data-toggle="tooltip"  data-id="{{ $product->id }}" data-original-title="Mostra" class="edit btn btn-info edit-user">
                                Mostra
                            </a>
                            <a href="{{ route('albarans.edit',$product->id) }}" data-toggle="tooltip"  data-id="{{ $product->id }}" data-original-title="Edita" class="edit btn btn-success edit-user">
                                Edita
                            </a>
                            <form action="{{ route('albarans.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Esborra</button>
                            </form>
                        </td>
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
