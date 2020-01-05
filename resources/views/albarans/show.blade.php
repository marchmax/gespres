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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4> Albarà <small>{{$albara->any}}-{{$albara->numalbara}}</small><a class="btn btn-warning float-right" href="{{ route('albarans.index') }}"><i class="fas fa-hand-point-left"></i> Torna</a></h4>
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
@endsection
