@extends('admin.pages.dashboard.index')
@section('title_content', 'List Users')
@section('link_active_content', ' / List Users')

@section('style')
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('show_content')
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

{{-- Modal edit user --}}
    <div class="modal fade" id="edit_user_modal" role="dialog" data-backdrop="static" data-keyboard="false"
         >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert-notification"></div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

{{--    <div class="modal fade" id="edit_user_modal" role="dialog" data-backdrop="static" data-keyboard="false"--}}
{{--         >--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"--}}
{{--                            id="header_close_generate_modal_button">--}}
{{--                        <i class="fa fa-times" aria-hidden="true"></i>--}}
{{--                    </button>--}}
{{--                    <h3 class="modal-title">Edit User</h3>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="alert"></div>--}}
{{--                    <div class="row form-group">--}}
{{--                        <label for="name" class="col-md-6">Name</label>--}}
{{--                        <input type="text" name="name" id="name" class="col-md-2">--}}
{{--                    </div>--}}
{{--                    <div class="row form-group">--}}
{{--                        <label for="user_name" class="col-md-6">User Name</label>--}}
{{--                        <input type="text" name="user_name" id="user_name" class="col-md-2">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-primary" id="confirm_generate_button">--}}
{{--                        Submit--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close_generate_modal_button">--}}
{{--                        Close--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('script')
<script src=https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js></script>
<script src="{{ mix('js/admin/pages/users/index.js') }}"></script>
@endsection
