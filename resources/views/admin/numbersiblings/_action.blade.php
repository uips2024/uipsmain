@can('edit_numbersibling')
<a href="{{route('admin.numbersiblings.edit',$numbersibling['sib_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_numbersibling')
<form method="POST" action="{{route('admin.numbersiblings.destroy',$numbersibling['sib_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_numbersibling">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan