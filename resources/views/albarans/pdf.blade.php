<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @guest
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('albarans.index') }}">{{ __('Albarans') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pressupostos.index') }}">{{ __('Pressupostos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">{{ __('Clients') }}</a>
                    </li>
                    @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4> Albarà <small>{{$albara->any}}-{{$albara->numalbara}}</small><a class="btn btn-warning float-right" href="{{ route('albarans.index') }}"> Torna</a></h4>
                </div>
                <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Client: </strong>
                            <input type="text" name="client" disabled class="form-control" placeholder="" value="{{$albara->client->nom}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Codi:</strong>
                            <input type="text" name="numalbara" disabled class="form-control" placeholder="" value="{{$albara->numalbara}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data albarà:</strong>
                            <input type="text" name="dataalbara" disabled class="form-control" placeholder="" value="{{$albara->dataalbara}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Estat:</strong>
                            <input type="text" name="estat" disabled class="form-control" placeholder="" value="{{$albara->estat}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Any:</strong>
                            <input type="text" name="any"  disabled class="form-control" placeholder="" value="{{$albara->any}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Total:</strong>
                            <input type="text" name="total" disabled class="form-control" placeholder="" value="{{$albara->total}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Observacions:</strong>
                            <textarea class="form-control" style="height:150px" disabled name="observacions" placeholder="">{{$albara->observacions}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <legend>Detall</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td>Producte</td>
                            <td>Quantitat</td>
                            <td>Preu</td>
                            <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($albara->items as $it)
                            <tr>
                                <td>{{$it->producte}}</td>
                                <td>{{$it->quantitat}}</td>
                                <td>{{$it->preu}}</td>
                                <td>{{$it->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
</main>
    </div>
</body>
</html>
