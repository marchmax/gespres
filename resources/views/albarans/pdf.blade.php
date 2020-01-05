<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css\factura.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('assets\bootstrap-4.4.1\css\bootstrap.min.css') }}" media="all" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Albarà</title>


    </head>
<body>
<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="col-md-4 float-left">
                    <p class="negreta">Albarà no.: {{$albara->numalbara}}</p>
                    <p>Data: <?php
                                $data = explode("-",$albara->dataalbara);
                                echo  $data[2]."/".$data[1]."/".$data[0];
                                ?></p>
                    <address >
                        <strong>Client: </strong>{{$albara->client->nom}}<br />
                        NIF: {{$albara->client->NIF}}<br />
                        Adreça: {{$albara->client->adresa}}<br />
                        Tel: {{$albara->client->telefon}}
                    </address>
            </div>
            <div class="col-md-4 float-left">
                <h3> ALBARÀ MANTENIMENT JARDINERIA </h3>
                    <address> <br />
                        Cristian Ros<br />
                        Girona<br />
                        Tel: 619 856122
                    </address>
            </div>
            <div class="col-md-4 float-left">
                <img alt="olivera de girona" src="{{ asset('images/logo_2.png') }}" />
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


    <div class="row">
		<div class="span12">
			<div  class="esquerra">
			</div>
			<div  class="esquerra">
			</div>
			<div  class="esquerra">
				<div class="table-responsive">
					<table class="taula2 table table-bordered table-condensed">
						<tbody>
							<tr><td class="negreta">Total:</td><td>{{$albara->total}} €</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    </div>
    </div>

<div id="footer">
		<hr>
		<div class="inner">
			<div class="container">
				<p>Observacions: </p>
				<p class="footer"></p>
				<p>{{$albara->observacions}}</p>
			</div>
		</div>
	</div>
</div>

</body>
</html>
