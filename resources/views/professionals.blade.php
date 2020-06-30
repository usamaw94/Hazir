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
            Professionals
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; Professional's List</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Professional ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profession</th>
                            <th>Activation Status</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($professionals as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->p_name }}</td>
                            <td>{{ $p->p_email }}</td>
                            <td>{{ $p->pr_name }}</td>
                            <td>{{ $p->p_active }}</td>
                            <td>{{ $p->p_status }}</td>
                            <td><i hint="tooltip" title="View Details" onclick="window.location.href='/viewProfessional/{{ $p->id }}'" class="fa fa-eye professionals-action professionals-action-view"></i>
                                @if($p->p_active == 'Deactivated')
                                    <i hint="tooltip" title="Activate Account" data-professional-id="{{ $p->id }}" data-toggle="modal" data-target="#activateAccount" class="fa fa-check professionals-action professionals-action-activate"></i>
                                @elseif($p->p_active == 'Activated')
                                    <i hint="tooltip" title="Deactivate Account" data-professional-id="{{ $p->id }}" data-toggle="modal" data-target="#deactivateAccount" class="fa fa-times professionals-action professionals-action-deactivate"></i>
                                @endif
                                <i hint="tooltip" title="Delete" data-professional-id="{{ $p->id }}" data-toggle="modal" data-target="#deleteProfessional" class="fa fa-trash-o professionals-action professionals-action-delete"></i>
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
    <!-- /.modal -->

@endsection
