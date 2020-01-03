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
            <div class="card ">
                <div class="card-header bg-warning"><h4> Edita albarà <small>{{$albara->any}}-{{$albara->numalbara}}</small><a class="btn btn-info float-right" href="{{ route('albarans.index') }}"> Torna</a></h4>
                </div>
                <div class="card-body">
                <form action="{{ route('albarans.update',$albara->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                            <input type="text" name="dataalbara"  class="form-control" placeholder="" value="{{$albara->dataalbara}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Estat:</strong>
                            <input type="text" name="estat"  class="form-control" placeholder="" value="{{$albara->estat}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Any:</strong>
                            <input type="text" name="any"   class="form-control" placeholder="" value="{{$albara->any}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Total:</strong>
                            <input type="text" name="total" id="total" class="form-control" placeholder="" value="{{$albara->total}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Observacions:</strong>
                            <textarea class="form-control" style="height:150px"  name="observacions" placeholder="">{{$albara->observacions}}</textarea>
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
                            <td></td>
                            <td>Producte</td>
                            <td>Quantitat</td>
                            <td>Preu</td>
                            <td>Total</td>
                            <th style="text-align: center;background: #eee">
                                <a href="#" onclick="addRow()"> +
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($albara->items as $it)
                            <tr class="item">
                                <td><input type="hidden" name="item_id[]" class="form-control" placeholder="" value="{{$it->id}}"></td>
                                <td><input type="text" name="producte[]" class="form-control" placeholder="" value="{{$it->producte}}"></td>
                                <td><input type="text" name="quantitat[]" class="form-control " placeholder="" value="{{$it->quantitat}}"></td>
                                <td><input type="text" name="preu[]" class="form-control " placeholder="" value="{{$it->preu}}"></td>
                                <td><input type="text" name="totals[]" class="form-control " placeholder="" value="{{$it->total}}"></td>
                                <td  style="text-align: center" class="remove">
                                    <a href="#" class="btn btn-danger " onclick="deleteRow()"> -
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center float-right">
              <button type="submit" class="btn btn-primary">Actualitza</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onkeyup=function() {

    var items = document.querySelectorAll(".item");
    var itemsArray = Array.prototype.slice.call(items,0);
    var unit, rate, total, net = 0;
    itemsArray.forEach(function(el){
        unit = el.querySelector('input[name="preu[]"]').value;
        rate = el.querySelector('input[name="quantitat[]"]').value;
        total = unit * rate;
        el.querySelector('input[name="totals[]"]').value = total;
        net+=total;
    });
    document.getElementById('total').value=net;
    }

    function addRow()
    {
        var tr='<tr>'+
                '<td><input type="hidden" name="item_id[]" class="form-control quantity"></td>'+
                '<td><input type="text" name="producte[]" class="form-control producte"></td>'+
                '<td><input type="text" name="quantitat[]" class="form-control quantity"></td>'+
                '<td><input type="text" name="preu[]" class="form-control costprice"></td>'+
                '<td><input type="text" name="totals[]" class="form-control quantity"></td>'+
                '<td class="remove" style="text-align: center"><a href="#" class="btn btn-danger" onclick="deleteRow()"> - <i class="fa fa-times"></i></a></td>'+
                '</tr>';

        $('tbody').append(tr);
    }

    function deleteRow()
    {
        $(document).on('click', '.remove', function()
        {
            $(this).parent('tr').remove();
        });
    }

    function cannotdelete()
    {
        alert('No es pot eliminar la primera fila !!!')
    }
</script>
@endsection
