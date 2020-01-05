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
                <div class="card-header"><h4> Crea un nou albarà </h4>
                <div class="pull-right">
                        <a class="btn btn-warning" href="{{ route('albarans.index') }}"> <i class="fas fa-hand-point-left"></i>Torna</a>
                    </div>
                </div>
                <div class="card-body">
<form action="{{ route('albarans.store') }}" method="POST">
    @csrf
     <div class="row">
         <div class="col-md-4">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Client: </strong>
                {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codi:</strong>
                <input type="text" name="numalbara" class="form-control" placeholder="NumAlbarà">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data albarà:</strong>
                <input type="text" name="dataalbara" class="form-control" placeholder="dataalbara">
            </div>
        </div>

         </div>
         <div class="col-md-4">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estat:</strong>
                <input type="text" name="estat" class="form-control" placeholder="estat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Any:</strong>
                <input type="text" name="any" class="form-control" placeholder="any">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                <input type="text" name="total" class="form-control" placeholder="total">
            </div>
        </div>
        </div>
        <div class="col-md-4">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Observacions:</strong>
                <textarea class="form-control" style="height:150px" name="observacions" placeholder="Total"></textarea>
            </div>
        </div>
         </div>

         <div class="col-md-12">
         <table class="table table-bordered table-striped" id="laravel_datatable">
            <thead>
            <tr>
                <th>Producte</th>
                <th>Quantitat</th>
                <th>Preu</th>
                <th>Total</th>
                <th style="text-align: center;background: #eee">
                    <a href="#" onclick="addRow()"> +
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>

            </tr>
            </thead>

            <tr>
                <td><input type="text" name="producte[]" class="form-control" placeholder=""></td>
                <td><input type="text" name="quantitat[]" class="form-control" placeholder=""></td>
                <td><input type="text" name="preu[]" class="form-control" placeholder=""></td>
                <td><input type="text" name="totals[]" class="form-control" placeholder=""></td>
                <td  style="text-align: center"  onclick="cannotdelete()">
                    <a href="#" class="btn btn-danger remove"> -
                        <i class="fa fa-times"></i>
                    </a>
                </td>
            </tr>

            </table>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
            </div>
        </div>
    </div>
    <script>
    function addRow()
    {
        var tr='<tr>'+
                '<td><input type="text" name="producte[]" class="form-control quantity"></td>'+
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
