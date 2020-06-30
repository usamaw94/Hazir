@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li class="active"><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    <section class="content-header">
        <h1>
            Users
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; User's List</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($users as $u)
                            <tr>
                            <td>{{ $u->usr_id }}</td>
                            <td>{{ $u->usr_name }}</td>
                            <td>{{ $u->usr_email }}</td>
                            <td>{{ $u->usr_status }}</td>
                            <td><i hint="tooltip" title="View Details" data-toggle="modal" data-target="#viewCutomer" class="fa fa-eye user-action user-action-view"
                                   data-user-id="{{ $u->usr_id }}"
                                   data-user-name="{{ $u->usr_name }}"
                                   data-user-email="{{ $u->usr_email }}"
                                   data-user-img="{{ $u->usr_img_src }}"
                                   data-user-phone="{{ $u->usr_phone }}"
                                   data-user-address="{{ $u->usr_address }}"
                                   data-user-status="{{ $u->usr_status }}"></i>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@section('modals')

    <div class="modal fade" id="viewCutomer">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">View User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="mUImg" class="img-responsive img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered table-hover" style="margin-bottom: 0px">
                                    <tr>
                                        <th>User ID</th>
                                        <td id="mUId"></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td id="mUName"></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td id="mUEmail"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td id="mUPhone"></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td id="mUAddress"></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td id="mUStatus"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--<div data-toggle="modal" data-target="#approveAccount" class="btn btn-success pull-left"><i class="fa fa-check"></i>&nbsp;&nbsp; Approve</div>-->
                        <!--<div class="btn btn-danger pull-left" data-toggle="modal" data-target="#disApproveAccount"><i class="fa fa-times"></i>&nbsp;&nbsp; Disapprove</div>-->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
