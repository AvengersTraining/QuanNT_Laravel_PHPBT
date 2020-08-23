<a class="btn btn-xs btn-info btn-edit-post"
   href="{{ route('admin.posts.show', ['slug' => $slug]) }}">
    <i class="fa fa-eye"></i> Show
</a>
<a class="btn btn-xs btn-warning btn-edit-post"
   href="{{ route('admin.posts.edit', ['slug' => $slug]) }}">
    <i class="fa fa-edit"></i> Edit
</a>
<a class="btn btn-xs btn-danger btn-delete-post">
    <i class="fa fa-trash-alt"></i> Delete
</a>

<form action="{{ route('admin.posts.destroy', ['id' => $id]) }}" method="POST" id="confirm-delete-post">
    @method('DELETE')
    @csrf
</form>
