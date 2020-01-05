@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-header">Dades</div>
            <div class="card-body">
                <h5 class="card-title">Aquí mostrarem un resum</h5>
                <p class="card-text">Amb les principals dades a tenir en compte.</p>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-header">Informació</div>
            <div class="card-body">
                <h5 class="card-title">Aquí també mostrarem dades</h5>
                <p class="card-text">Potser amb alguna gràfica amb dades importants.</p>
            </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Benvingut/da {{ Auth::user()->name }}</div>

                <div class="card-body justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="links">
                    <a class="navbar-brand" href="{{ url('/albarans') }}">
                        <img src="images/credit-card.png" height="50px" width="50px"> Albarans
                    </a>
                    <a class="navbar-brand" href="{{ url('/clients') }}">
                        <img src="images/client.png" height="50px" width="50px"> Clients
                    </a>
                    <a class="navbar-brand" href="{{ url('/pressupostos') }}">
                        <img src="images/calculator.png" height="50px" width="50px"> Pressupostos
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
