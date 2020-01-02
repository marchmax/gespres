@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4> Client </h4>
                </div>
                <div class="card-body">

    <div class="row">
        <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $client->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adreça:</strong>
                {{ $client->adresa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telèfon:</strong>
                {{ $client->telefon }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Població:</strong>
                {{ $client->poblacio }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codi postal:</strong>
                {{ $client->codipostal }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $client->mail }}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIF:</strong>
                {{ $client->NIF }}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Notes:</strong>
                {{ $client->nota }}
            </div>
        </div>
    </div>

<div class="col-md-4">
    <p> Accions </p>
<a href="#" data-toggle="tooltip"  class="edit btn btn-info edit-user"> Mostra albarans del client </a>
<a href="#" data-toggle="tooltip"   class="edit btn btn-success edit-user"> Veure pressupostos del client </a>
<a href="#"  data-toggle="tooltip"  class="delete btn btn-danger"> ... </a>

</div>
    </div>
<div class="pull-right">
    <a class="btn btn-warning" href="{{ route('clients.index') }}"> Torna</a>
</div>
</div>
</div>

</div>


@endsection
