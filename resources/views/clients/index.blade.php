@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Llista de clients <a href="{{ route('clients.create') }}" class="btn btn-info ml-3 pull-right" >Nou Client</a></div>
                <div class="card-body">

                <table class="table table-bordered table-striped" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Mail</th>
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




<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="userForm" name="userForm" class="form-horizontal">
           <input type="hidden" name="user_id" id="user_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">

    </div>
</div>
</div>
</div>
<script>
var SITEURL = 'http://localhost:8000/'
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: SITEURL + "clients",
          type: 'GET',
         },
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  { data: 'nom', name: 'nom' },
                  { data: 'mail', name: 'mail' },
                  { data: 'NIF', name: 'NIF' },
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']]
      });
 /*  When user click add user button */
    $('#create-new-user').click(function () {
        $('#btn-save').val("create-user");
        $('#user_id').val('');
        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Add New User");
        $('#ajax-crud-modal').modal('show');
    });


   });

if ($("#userForm").length > 0) {
      $("#userForm").validate({

     submitHandler: function(form) {

      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');

      $.ajax({
          data: $('#userForm').serialize(),
          url: SITEURL + "users/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#userForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);

          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
@endsection
