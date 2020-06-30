@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li class="active"><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    <section class="content-header">
        <h1>
            Complaints
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab_1-1" data-toggle="tab"><b>User's Complaints</b></a></li>
                <li><a href="#tab_2-2" data-toggle="tab"><b>Professional's Complaints</b></a></li>
            </ul>
            <div class="tab-content" style="padding-top: 20px">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="box-body no-padding">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Complaint Id</th>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>Professional Id</th>
                                    <th>Professional Name</th>
                                    <th>Complaint</th>
                                    <th>Response status</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($userComplaints as $uc)
                                    <tr>
                                        <td>{{ $uc->cmp_id }}</td>
                                        <td>{{ $uc->customer_id }}</td>
                                        <td>{{ $uc->usr_name }}</td>
                                        <td>{{ $uc->professional_id }}</td>
                                        <td>{{ $uc->p_name }}</td>
                                        <td>{{ $uc->complaint }}</td>
                                        <td>
                                            @if($uc->response == '')
                                                <label class="label label-warning">Not responded</label>
                                            @else
                                                <label class="label label-success">Responded</label>
                                            @endif
                                        </td>
                                        <td><i hint="tooltip" title="View Details" data-toggle="modal" data-target="#viewUserComplaint" class="fa fa-eye complaint-action complaint-action-view complaint-user"
                                               data-complaint-id="{{ $uc->cmp_id }}"
                                               data-complaint-prfl-id="{{ $uc->professional_id }}"
                                               data-complaint-u-id="{{ $uc->customer_id }}"
                                               data-complaint-prfn-id="{{ $uc->profession_id }}"
                                               data-complaint-cmplt="{{ $uc->complaint }}"
                                               data-complaint-prfl-name="{{ $uc->p_name }}"
                                               data-complaint-prfl-email="{{ $uc->p_email }}"
                                               data-complaint-prfn-name="{{ $uc->pr_name }}"
                                               data-complaint-u-name="{{ $uc->usr_name }}"
                                               data-complaint-u-email="{{ $uc->usr_email }}"
                                               data-complaint-response="{{ $uc->response }}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    <div class="box-body">
                        <div class="box-body no-padding">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Complaint Id</th>
                                    <th>Professional Id</th>
                                    <th>Professional Name</th>
                                    <th>Customer Id</th>
                                    <th>Customer Name</th>
                                    <th>Complaint</th>
                                    <th>Response status</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($professionalComplaints as $pc)
                                <tr>
                                    <td>{{ $pc->cmp_id }}</td>
                                    <td>{{ $pc->professional_id }}</td>
                                    <td>{{ $pc->p_name }}</td>
                                    <td>{{ $pc->customer_id }}</td>
                                    <td>{{ $pc->usr_name }}</td>
                                    <td>{{ $pc->complaint }}</td>
                                    <td>
                                        @if($pc->response == '')
                                            <label class="label label-warning">Not responded</label>
                                        @else
                                            <label class="label label-success">Responded</label>
                                        @endif
                                    </td>
                                    <td><i hint="tooltip" title="View Details" data-toggle="modal" data-target="#viewProfessionalComplaint" class="fa fa-eye complaint-action complaint-action-view complaint-professional"
                                           data-complaint-id="{{ $pc->cmp_id }}"
                                           data-complaint-prfl-id="{{ $pc->professional_id }}"
                                           data-complaint-u-id="{{ $pc->customer_id }}"
                                           data-complaint-prfn-id="{{ $pc->profession_id }}"
                                           data-complaint-cmplt="{{ $pc->complaint }}"
                                           data-complaint-prfl-name="{{ $pc->p_name }}"
                                           data-complaint-prfl-email="{{ $pc->p_email }}"
                                           data-complaint-prfn-name="{{ $pc->pr_name }}"
                                           data-complaint-u-name="{{ $pc->usr_name }}"
                                           data-complaint-u-email="{{ $pc->usr_email }}"
                                           data-complaint-response="{{ $pc->response }}"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->

    </section>
    <!-- /.content -->
@endsection

@section('modals')

    <div class="modal fade" id="viewUserComplaint">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">View User Complaint</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="margin-bottom: 0px">
                        <tr>
                            <td>Complaint ID</td>
                            <td id="ucMId"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Complaint By</th>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td id="ucMUId"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td id="ucMUName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="ucMUEmail"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Against</th>
                        </tr>
                        <tr>
                            <td>Professional ID</td>
                            <td id="ucMPrflId"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td id="ucMPrflName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="ucMPrflEmail"></td>
                        </tr>
                        <tr>
                            <td>Profession</td>
                            <td id="ucMPrfnName"></td>
                        </tr>
                        <tr>
                            <th>Complaint</th>
                            <th id="ucMCmplt"></th>
                        </tr>
                        <tr id="showResponse">
                            <th>Admin Response</th>
                            <td id="ucMRspns"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <div id="respondComplaint">
                        <h5 style="text-align: left"><b>Respond complaint</b></h5>
                        <form action="/respondComplaint" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="ucmpIdVal" name="cmpId">
                            <textarea class="form-control" name="response" placeholder="Write response to the complain" required></textarea>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="viewProfessionalComplaint">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">View Professional Complaint</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="margin-bottom: 0px">
                        <tr>
                            <td>Complaint ID</td>
                            <td id="pcMId"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Complaint By</th>
                        </tr>
                        <tr>
                            <td>Professional ID</td>
                            <td id="pcMPrflId"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td id="pcMPrflName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="pcMPrflEmail"></td>
                        </tr>
                        <tr>
                            <td>Profession</td>
                            <td id="pcMPrfnName"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Against</th>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td id="pcMUId"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td id="pcMUName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="pcMUEmail"></td>
                        </tr>
                        <tr>
                            <th>Complaint</th>
                            <th id="pcMCmplt"></th>
                        </tr>
                        <tr id="pShowResponse">
                            <th>Admin Response</th>
                            <td id="pcMRspns"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <div id="pRespondComplaint">
                        <h5 style="text-align: left"><b>Respond complaint</b></h5>
                        <form action="/respondComplaint" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="pcmpIdVal" name="cmpId">
                            <textarea class="form-control" name="response" placeholder="Write response to the complain" required></textarea>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
