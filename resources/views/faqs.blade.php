@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li class="active"><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')

    <section class="content-header">
        <h1>
            FAQ's
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; FAQ's List</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Question ID</th>
                            <th>Quuestion</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($faqs as $f)
                        <tr>
                            <td>{{ $f->faq_id }}</td>
                            <td>{{ $f->faq_ques }}</td>
                            <td>{{ $f->faq_ans }}</td>
                            <td><i hint="tooltip" title="Write/Edit Answer" data-toggle="modal" data-target="#editAnswer" class="fa fa-edit faq-action faq-action-edit"
                                        data-q-id="{{ $f->faq_id }}"
                                        data-q="{{ $f->faq_ques }}"
                                        data-q-a="{{ $f->faq_ans }}"></i>
                                <i hint="tooltip" title="Delete question" data-toggle="modal" data-target="#deleteQuestion" class="fa fa-trash-o faq-action faq-action-delete"
                                   data-q-id="{{ $f->faq_id }}"></i>
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

    <div class="modal fade" id="editAnswer">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/faqAnswer" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Profession</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <input type="hidden" readonly id="qID" name="qID" required>
                                <div class="form-group">
                                    <label><span id="question">Question1</span> ?</label>
                                </div>
                                <div class="form-group">
                                    <label for="wEAns">Write/Edit answer</label>
                                    <textarea class="form-control" name="ans" id="wEAns" required></textarea>
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


    <div class="modal fade" id="deleteQuestion">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Question</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this question having ID : " <span id="idToDelete"></span> " ?</p>
                </div>
                <div class="modal-footer">
                    <form action="/deleteQuestion" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" id="idDelValue" name="qId" readonly required>
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
