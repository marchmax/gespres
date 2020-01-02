@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4> Client </h4>
                </div>
                <div class="card-body">

    <form action="{{ route('clients.update',$client->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nom" value="{{ $client->nom }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adreça:</strong>
                    <input type="text" name="adresa" value="{{ $client->adresa }}" class="form-control" placeholder="Adreça">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telèfon:</strong>
                    <input type="text" name="telefon" value="{{ $client->telefon }}" class="form-control" placeholder="Telèfon">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Població:</strong>
                    <input type="text" name="poblacio" value="{{ $client->poblacio }}" class="form-control" placeholder="Població">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Codi postal:</strong>
                    <input type="text" name="codipostal" value="{{ $client->codipostal }}" class="form-control" placeholder="codipostal">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="mail" value="{{ $client->mail }}" class="form-control" placeholder="mail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIF:</strong>
                    <input type="text" name="NIF" value="{{ $client->NIF }}" class="form-control" placeholder="NIF">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nota:</strong>
                    <textarea class="form-control" style="height:150px" name="nota" placeholder="Nota">{{ $client->nota }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Actualitza</button>
            </div>
        </div>

    </form>
    <div class="pull-right">
    <a class="btn btn-warning" href="{{ route('clients.index') }}"> Torna</a>
</div>
</div>
</div>
@endsection
