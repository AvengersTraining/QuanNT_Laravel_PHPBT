@extends('admin.pages.dashboard.index')
@section('title_content', 'List Posts')
@section('link_active_content', ' / List Posts')

@section('style')
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('show_content')
    <div class="btn-generate-group mb-3">
        <a class="btn btn-success" id="open_generate_modal_button" href="#">
            <i class="fa fa-plus" aria-hidden="true"></i> Create
        </a>
    </div>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered" id="posts_table"
           data-action-url="{{ route('admin.posts.datatable.index') }}">
        <thead>
        <tr>
            <th>Title</th>
            <th>Article Author</th>
            <th>Category</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
@endsection

@section('script')
    <script src=https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
    <script src=https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js></script>
    <script src="{{ mix('js/admin/pages/posts/index.js') }}"></script>
@endsection
