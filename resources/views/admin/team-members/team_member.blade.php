@extends('admin.layout.app')
@section('title','Team Member')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Members List</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right top_search">
                    <a href="{{ url('admin/client_user/create') }}" class="btn btn-primary"><i
                            class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;Add Member</a>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="user_table" class="table">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Member Name</th>
                                <th width="20%">Email Address</th>
                                <th>Contact Number</th>
                                <th>Member Role</th>
                                <th>Enable | Disable</th>
                                <th width="5%">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <input type="hidden" name="list"
           id="list"
           value="{{ url('admin/client-user-list') }}">
    <script src="{{asset('assets/js/team_member/member-datatable.js')}}"></script>
@endpush
