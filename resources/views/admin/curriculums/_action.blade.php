@can('edit_curriculum')
<a href="{{route('admin.curriculums.edit',$curriculum['cur_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_curriculum')
<form method="POST" action="{{route('admin.curriculums.destroy',$curriculum['cur_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_curriculum">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan