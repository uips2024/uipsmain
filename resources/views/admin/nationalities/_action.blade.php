@can('edit_nationality')
<a href="{{route('admin.nationalities.edit',$nationality['nat_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_nationality')
<form method="POST" action="{{route('admin.nationalities.destroy',$nationality['nat_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_gender">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan