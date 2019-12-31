@extends('albarans.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Albarà</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('albarans.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número:</strong>
                {{ $albara->numalbara }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                {{ $albara->total }}
            </div>
        </div>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Producte</td>
          <td>Quantitat</td>
          <td>Preu</td>
          <td>Total</td>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->producte}}</td>
            <td>{{$contact->quantitat}}</td>
            <td>{{$contact->preu}}</td>
            <td>{{$contact->total}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
