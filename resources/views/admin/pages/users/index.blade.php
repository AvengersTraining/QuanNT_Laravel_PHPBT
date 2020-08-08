@extends('admin.pages.dashboard.index')
@section('title_content', 'List Users')
@section('link_active_content', ' / List Users')

@section('style')
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('show_content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered" id="users_table"
           data-action-url="{{ route('admin.users.datatable.index') }}">
        <thead>
        <tr>
            <th>Name</th>
            <th>UserName</th>
            <th>Email</th>
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
<script src="{{ mix('js/admin/pages/users/index.js') }}"></script>
@endsection
