@can('edit_motherlanguage')
<a href="{{route('admin.motherlanguages.edit',$motherlanguage['lang_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_motherlanguage')
<form method="POST" action="{{route('admin.motherlanguages.destroy',$motherlanguage['lang_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_motherlanguage">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan