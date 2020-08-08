<a class="btn btn-xs btn-warning btn-edit-user"
    href="{{ route('admin.users.edit', ['id' => $id]) }}">
    <i class="fa fa-edit"></i> Edit
</a>
<a class="btn btn-xs btn-danger btn-delete-user">
    <i class="fa fa-trash-alt"></i> Delete
</a>
<form action="{{ route('admin.users.destroy', ['id' => $id]) }}" method="POST" id="confirm-delete-user">
    @method('DELETE')
    @csrf
</form>


