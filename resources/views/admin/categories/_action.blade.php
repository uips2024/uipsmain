@can('edit_religion')
<a href="{{route('admin.religions.edit',$religion['rel_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_religion')
<form method="POST" action="{{route('admin.religions.destroy',$religion['rel_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_religion">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan