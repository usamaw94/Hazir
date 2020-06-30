@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li class="active"><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    <section class="content-header">
        <h1>
            Payments
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="panel box box-solid" style="background: #00a65a">
            <div style="color: white; cursor: pointer" class="box-header" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <h4 class="box-title">
                    Receive Payment
                </h4>
            </div>
            <div style="background-color: #fff; border-radius: 2px" id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body">
                    <div class="box-body no-padding">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#tab_1-1" data-toggle="tab"><b>Uncleared Payments</b></a></li>
                                <li><a href="#tab_2-2" data-toggle="tab"><b>Cleared Payments</b></a></li>
                            </ul>
                            <div class="tab-content" style="padding-top: 20px">
                                <div class="tab-pane active" id="tab_1-1">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Professional ID</th>
                                            <th>Chalan</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        @foreach($unclr_Payment_Notifications as $upn)
                                            <tr>
                                                <td>{{ $upn->p_n_prfnl_id }}</td>
                                                <td>
                                                    <p data-prfnl-id="{{ $upn->p_n_prfnl_id }}" data-chalan-img="{{ $upn->p_chalan_img }}" class="view-chalan" data-toggle="modal" data-target="#viewChallan">
                                                        <i class="fa fa-eye"></i> View Chalan
                                                    </p>
                                                </td>
                                                <td>{{ $upn->p_payment_status }}</td>
                                                <td><button class="btn btn-success" onclick="window.location.href='/receivePayment/{{ $upn->p_n_id }}'">Clear</button></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_2-2">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Professional ID</th>
                                            <th>Chalan</th>
                                            <th>Payment Status</th>
                                        </tr>
                                        @foreach($clr_Payment_Notifications as $cpn)
                                            <tr>
                                                <td>{{ $cpn->p_n_prfnl_id }}</td>
                                                <td>
                                                    <p data-prfnl-id="{{ $cpn->p_n_prfnl_id }}" data-chalan-img="{{ $cpn->p_chalan_img }}" class="view-chalan" data-toggle="modal" data-target="#viewChallan">
                                                        <i class="fa fa-eye"></i> View Chalan
                                                    </p>
                                                </td>
                                                <td>{{ $cpn->p_payment_status }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; Payments Record</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Professional ID</th>
                            <th>Name</th>
                            <th>Joining Date</th>
                            <th>Payment Date</th>
                            <th>Due Date</th>
                            <th>Payment Status</th>
                            <th>Paid On</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($professionals as $prf)
                        <tr>
                            <td>{{ $prf->id }}</td>
                            <td>{{ $prf->p_name }}</td>
                            <td>{{ $prf->p_joining_date }}</td>
                            <td>{{ $year }}-{{ $month }}-{{ $prf->p_payment_day }}</td>
                            <td>{{ $year }}-{{ $month }}-{{ $prf->p_due_day }}</td>
                            <td>{{ $prf->p_payment_status }}</td>
                            <td>{{ $prf->p_paid_on }}</td>
                            <td><a hint="tooltip" data-title="View Payment List" style="color: black" href="/paymentList/{{ $prf->id }}" target="_blank"><i class="fa fa-eye payment-action payment-action-view"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
@endsection

@section('modals')

    <div class="modal fade" id="viewChallan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Challan Image</h4>
                </div>
                <div class="modal-body">
                    <h4>Professional ID : <span id="prfnlId"></span></h4>
                    <img id="chalanImg" class="img-responsive">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
