@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Llista de pressupostos <a href="javascript:void(0)" class="btn btn-info ml-3 pull-right" id="create-new-user">Nou pressupost</a></div>
                <div class="card-body">

                <table class="table table-bordered table-striped" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>Codi</th>
                            <th>Data</th>
                            <th>Total</th>
                            <th>NIF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
