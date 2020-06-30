@extends('layouts.custom-layout')

@section('sideContent')
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/professions"><i class="fa fa-wrench"></i> <span>Professions</span></a></li>
        <li><a href="/professionals"><i class="fa fa-users"></i> <span>Professionals</span></a></li>
        <li><a href="/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="/complaints"><i class="fa fa-frown-o"></i> <span>Complaints</span></a></li>
        <li><a href="/payments"><i class="fa fa-dollar"></i> <span>Payments</span></a></li>
        <li><a href="/faqs"><i class="fa fa-question"></i> <span>FAQ's</span></a></li>
    </ul>
    @endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/professions'" style="cursor: pointer">
                    <span class="info-box-icon bg-blue-gradient"><i class="fa fa-wrench"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>Professions</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/professionals'" style="cursor: pointer">
                    <span class="info-box-icon bg-red-gradient"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>Professionals</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/users'" style="cursor: pointer">
                    <span class="info-box-icon bg-teal-gradient"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>Users</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/complaints'" style="cursor: pointer">
                    <span class="info-box-icon bg-maroon-gradient"><i class="fa fa-frown-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>Complaints</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/payments'" style="cursor: pointer">
                    <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-dollar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>Payments</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" onclick="window.location.href='/faqs'" style="cursor: pointer">
                    <span class="info-box-icon bg-green-gradient"><i class="fa fa-question"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><br>FAQ's</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
