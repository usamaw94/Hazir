@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li class="active"><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    <section class="content-header">
        <h1>
            View Professional
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab_1-1" data-toggle="tab"><b>Basic Info.</b></a></li>
                <li><a href="#tab_2-2" data-toggle="tab"><b>Jobs</b></a></li>
                <li><a href="#tab_3-2" data-toggle="tab"><b>Complaints</b></a></li>
            </ul>
            <div class="tab-content" style="padding-top: 20px">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $professional[0]->p_image_src }}" alt="No image" class="img-responsive img-thumbnail">
                                <br><br>
                                <div class="thumbnail">
                                    <img src="{{ $professional[0]->p_id_card_img_src }}" alt="No Image" style="width:100%">
                                    <div class="caption">
                                        <p><b>ID Card</b></p>
                                    </div>
                                </div>
                                <div class="thumbnail">
                                    <img src="{{ $professional[0]->p_id_card_back_img_src }}" alt="No Image" style="width:100%">
                                    <div class="caption">
                                        <p><b>ID Card Back</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Professional ID</th>
                                        <td>{{ $professional[0]->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $professional[0]->p_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $professional[0]->p_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profession</th>
                                        <td>{{ $professional[0]->pr_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Id Card Number</th>
                                        <td>{{ $professional[0]->p_id_card_num }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $professional[0]->p_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $professional[0]->p_status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rating</th>
                                        <td>{{ $ratingJ }}</td>
                                    </tr>
                                    <tr>
                                        <th>Activation Status</th>
                                        <td>{{ $professional[0]->p_active }}</td>
                                    </tr>
                                </table>
                                @if($professional[0]->p_active == 'Deactivated')
                                    <div data-professional-id="{{ $professional[0]->id }}" data-toggle="modal" data-target="#activateAccount" class="btn btn-success btn-activate-professional pull-left"><i class="fa fa-check"></i>&nbsp;&nbsp; Activate Account</div>
                                @elseif($professional[0]->p_active == 'Activated')
                                    <div data-professional-id="{{ $professional[0]->id }}" class="btn btn-danger btn-deactivate-professional pull-left" data-toggle="modal" data-target="#deactivateAccount"><i class="fa fa-times"></i>&nbsp;&nbsp; Deactivate Account</div>
                                @endif
                                <div data-professional-id="{{ $professional[0]->id }}" style="margin-left: 10px" class="btn btn-danger btn-delete-professional pull-left" data-toggle="modal" data-target="#deleteProfessional"><i class="fa fa-trash"></i>&nbsp;&nbsp; Delete Account</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-list-ul"></i>&nbsp; Job List</h3>
                        </div>
                        <div class="box-body">
                            <div class="box-body no-padding">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>Profession</th>
                                        <th>Date</th>
                                        <th>Rating</th>
                                    </tr>
                                    @foreach($jobs as $j)
                                    <tr>
                                        <td>{{ $j->j_id }}</td>
                                        <td>{{ $j->j_customer_id }}</td>
                                        <td>{{ $j->usr_name }}</td>
                                        <td>{{ $j->pr_name }}</td>
                                        <td>{{ $j->j_date }}</td>
                                        <td>{{ $j->j_rating }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-2">

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-list-ul"></i>&nbsp; Complaint List</h3>
                        </div>
                        <div class="box-body">
                            <div class="box-body no-padding">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Complaint Id</th>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>Complaint</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($complaints as $c)
                                        <tr>
                                            <td>{{ $c->cmp_id }}</td>
                                            <td>{{ $c->customer_id }}</td>
                                            <td>{{ $c->usr_name }}</td>
                                            <td>{{ $c->complaint }}</td>
                                            <td><i hint="tooltip" title="View Details" data-toggle="modal" data-target="#viewComplaint" class="fa fa-eye complaint-action complaint-action-view"
                                                   data-complaint-id="{{ $c->cmp_id }}"
                                                   data-complaint-prfl-id="{{ $c->professional_id }}"
                                                   data-complaint-u-id="{{ $c->customer_id }}"
                                                   data-complaint-prfn-id="{{ $c->profession_id }}"
                                                   data-complaint-cmplt="{{ $c->complaint }}"
                                                   data-complaint-prfl-name="{{ $c->p_name }}"
                                                   data-complaint-prfl-email="{{ $c->p_email }}"
                                                   data-complaint-prfn-name="{{ $c->pr_name }}"
                                                   data-complaint-u-name="{{ $c->usr_name }}"
                                                   data-complaint-u-email="{{ $c->usr_email }}"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

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

    <div class="modal fade" id="activateAccount">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Activate Professional</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to activate professional having ID : " <span id="idToActivate"></span> " ?</p>
                </div>
                <div class="modal-footer">
                    <form action="/activateProfessional" method="get">
                        <input type="hidden" id="idActivateValue" name="professionalId">
                        <button type="submit" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="deactivateAccount">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Deactivate Professional</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to deactivate professional having ID : " <span id="idToDeactivate"></span> " ?</p>
                </div>
                <div class="modal-footer">
                    <form action="/deactivateProfessional" method="get">
                        <input type="hidden" id="idDeactivateValue" name="professionalId">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="deleteProfessional">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Professional</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete professional having ID : " <span id="idToDelete"></span> " ?</p>
                </div>
                <div class="modal-footer">
                    <form action="/deleteProfessional" method="get">
                        <input type="hidden" id="idDelValue" name="professionalId">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="viewComplaint">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">View Complaint</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover" style="margin-bottom: 0px">
                            <tr>
                                <td>Complaint ID</td>
                                <td id="cMId"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Complaint By</th>
                            </tr>
                            <tr>
                                <td>User ID</td>
                                <td id="cMUId"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="cMUName"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="cMUEmail"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Against</th>
                            </tr>
                            <tr>
                                <td>Professional ID</td>
                                <td id="cMPrflId"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="cMPrflName"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="cMPrflEmail"></td>
                            </tr>
                            <tr>
                                <td>Profession</td>
                                <td id="cMPrfnName"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Complaint</th>
                            </tr>
                            <tr>
                                <th colspan="2" id="cMCmplt"></th>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
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
