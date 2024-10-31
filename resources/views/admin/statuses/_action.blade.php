@can('edit_status')
<a href="{{route('admin.statuses.edit',$status['stat_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_status')
<form method="POST" action="{{route('admin.statuses.destroy',$status['stat_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_status">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan