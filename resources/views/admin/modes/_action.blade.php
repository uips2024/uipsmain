@can('edit_mode')
<a href="{{route('admin.modes.edit',$mode['mod_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan
@can('delete_mode')
<form method="POST" action="{{route('admin.modes.destroy',$mode['mod_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_mode">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan