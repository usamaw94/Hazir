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
            Payment Lists
        </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-solid">
            <div class="box-body">
                <h4>Professional Id: {{ $professional[0]->id }}</h4>
                <h5>Name: {{ $professional[0]->p_name }}</h5>
                <h5>Email : {{ $professional[0]->p_email }}</h5>
                <button class="btn btn-success" onclick="window.location.href='/payments'">Go back</button>
            </div>
        </div>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp; Payment List</h3>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Payment Month</th>
                            <th>Year</th>
                            <th>Date</th>
                        </tr>
                        @foreach($payments as $pym)
                        <tr>
                            <td>{{ $pym->payment_month }}</td>
                            <td>{{ $pym->payment_year }}</td>
                            <td>{{ $pym->payment_date }}</td>
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