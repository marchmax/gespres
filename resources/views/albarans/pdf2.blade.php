<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Albarà</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ public_path('assets\bootstrap-4.4.1\css\bootstrap.min.css') }}" media="all" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        body {
            margin-top: 20px;
            margin-bottom: 20px;
        }

    </style>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: none;">
                <div class="card-body p-0">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <img alt="olivera de girona" src="{{ public_path('images/logo_2.png') }}"  height="75%"/>
                        </div>

                        <div class="col-md-6 text-right">
                        <h3> ALBARÀ MANTENIMENT JARDINERIA </h3>
                            <p class="font-weight-bold mb-1">Albarà no.: {{$albara->numalbara}}</p>
                            <p class="text-muted">Data: <?php
                                        $data = explode("-",$albara->dataalbara);
                                        echo  $data[2]."/".$data[1]."/".$data[0];
                                        ?></p>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row pb-3 p-3">
                        <div class="col-md-4">
                            <p class="font-weight-bold mb-4">Client </p>
                            <p class="mb-1">{{$albara->client->nom}}</p>
                            <p>NIF: {{$albara->client->NIF}}</p>
                            <p class="mb-1">{{$albara->client->adresa}}</p>
                            <p class="mb-1">Tel: {{$albara->client->telefon}}</p>
                        </div>
                        <div class="col-md-4  text-right">
                        <p class="font-weight-bold mb-1">Cristian Ros</p>
                            <p class="mb-1"> Girona</p>
                            <p class="mb-1"><span class="text-muted">Tel: </span> 619 856122</p>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold"></th>
                                        <th class="border-0 text-uppercase small font-weight-bold" colspan="2">Descripció</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantitat</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Preu unitat</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($albara->items as $it)
                                    <tr>
                                        <td></td>
                                        <td colspan="2">{{$it->producte}}</td>
                                        <td>{{$it->quantitat}}</td>
                                        <td>{{$it->preu}}</td>
                                        <td>{{$it->total}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row p-5">
                    </div>
                    <div class="d-flex flex-row-reverse bg-dark text-white p-3">
                        <div class="py-3 px-3 text-right">
                            <div class="mb-2"></div>
                            <div class="h2 font-weight-light"></div>
                        </div>
                        <div class="py-3 px-3 text-right">
                            <div class="mb-2">Total</div>
                            <div class="h2 font-weight-light">{{$albara->total}} €</div>
                        </div>
                        <hr class="my-2">
                        <div class="py-3 px-3 text-left">
                            <div class="mb-2">Observacions: </div> {{$albara->observacions}}
                            <div class="h2 font-weight-light"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
