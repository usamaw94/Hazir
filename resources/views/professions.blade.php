@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    @if ($errors->has('pName'))
        <span class="help-block">
            <strong>{{ $errors->first('pName') }}</strong>
        </span>
    @endif

    <section class="content-header">
        <h1>
            Professions
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="panel box box-solid" style="background: #00a65a">
            <div style="color: white; cursor: pointer" class="box-header" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <h4 class="box-title">
                    Add New Profession
                </h4>
            </div>
            <div style="background-color: #fff; border-radius: 2px" id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body">
                    <div class="col-md-offset-2 col-md-8">
                        <form role="form" action="/addProfession" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="professionName">Name</label>
                                    <input type="text" class="form-control" name="pName" id="professionName" required placeholder="Enter profession name">
                                </div>
                                <div class="form-group">
                                    <label for="professionPayment">Monthly Payment</label>
                                    <input type="number" name="pPayment" class="form-control" id="professionPayment" required placeholder="(Rupees)">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; Profession List</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Profession ID</th>
                            <th>Name</th>
                            <th>Total professionals</th>
                            <th>Monthly Payment</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($professions as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->pr_name }}</td>
                            <td>{{ $p->no_of_professionals }}</td>
                            <td>{{ $p->monthly_price }} Rs.</td>
                            <td><i hint="tooltip" title="Edit" data-toggle="modal" data-target="#editProfession" class="fa fa-edit profession-action profession-action-edit"
                                        data-profession-id="{{ $p->id }}"
                                        data-profession-name="{{ $p->pr_name }}"
                                        data-profession-payment="{{ $p->monthly_price }}"></i>
                                <i hint="tooltip" title="Delete" data-profession-id="{{ $p->id }}" data-toggle="modal" data-target="#deleteProfession" class="fa fa-trash-o profession-action profession-action-delete"></i>
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

    <div class="modal fade" id="editProfession">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/editProfession" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Profession</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <input type="hidden" id="pMId" name="pId" required>
                                <div class="form-group">
                                    <label for="pMName">Name</label>
                                    <input class="form-control" type="text" name="pName" id="pMName" required>
                                </div>
                                <div class="form-group">
                                    <label for="pMPayment">Monthly Payment</label>
                                    <input class="form-control" type="number" name="pPayment" id="pMPayment" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success pull-left">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="deleteProfession">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Profession</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete profession having ID : " <span id="idToDelete"></span> " ?</p>
                </div>
                <div class="modal-footer">
                    <form action="/deleteProfession" method="get">
                        <input type="hidden" id="idDelValue" name="professionId">
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
