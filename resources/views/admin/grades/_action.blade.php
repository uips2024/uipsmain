@can('edit_grade')
<a href="{{route('admin.grades.edit',$grade['grd_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_grade')
<form method="POST" action="{{route('admin.grades.destroy',$grade['grd_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_grade">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan