@can('edit_reservation')
<a href="{{route('admin.reservations.edit',$reservation['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_reservation')
<form method="POST" action="{{route('admin.reservations.destroy',$reservation['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_religion">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan