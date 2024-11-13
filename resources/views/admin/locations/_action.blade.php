@can('edit_location')
<a href="{{route('admin.locations.edit',$location['loc_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_location')
<form method="POST" action="{{route('admin.locations.destroy',$location['loc_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_location">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan