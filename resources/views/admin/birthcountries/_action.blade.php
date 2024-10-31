@can('edit_birthcountry')
<a href="{{route('admin.birthcountries.edit',$birthcountry['birth_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_birthcountry')
<form method="POST" action="{{route('admin.birthcountries.destroy',$birthcountry['birth_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_birthcountry">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan