@can('edit_gender')
<a href="{{route('admin.genders.edit',$gender['gen_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_gender')
<form method="POST" action="{{route('admin.genders.destroy',$gender['gen_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_gender">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan