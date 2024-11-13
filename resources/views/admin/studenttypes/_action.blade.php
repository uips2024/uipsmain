@can('edit_studenttype')
<a href="{{route('admin.studenttypes.edit',$studenttype['stud_type_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_studenttype')
<form method="POST" action="{{route('admin.studenttypes.destroy',$studenttype['stud_type_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_studenttype">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan