<a href="{{ route('clients.show',$id) }}" data-toggle="tooltip"  data-id="{{ $id }}" data-original-title="Mostra" class="edit btn btn-info edit-user">
    Mostra
</a>
<a href="{{ route('clients.edit',$id) }}" data-toggle="tooltip"  data-id="{{ $id }}" data-original-title="Edita" class="edit btn btn-success edit-user">
    Edita
</a>
<a href="{{ route('clients.destroy',$id) }}" id="delete-user" data-toggle="tooltip" data-original-title="Esborra" data-id="{{ $id }}" class="delete btn btn-danger">
    Esborra
</a>
