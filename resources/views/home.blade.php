@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
@endsection('styles')

@section('page-title')
    Dashboard
@endsection

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>{{ $applicants->count() }}</h3>
                          <p>Applicants</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-clipboard"></i>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-aqua"><b>Applicants</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">No. of Applicants <span class="pull-right badge bg-blue">{{ $applicants->count() }}</span></a></li>
                                <li><a href="#">For Interview <span class="pull-right badge bg-orange">{{ $applicants->where('status', 1)->count() }}</span></a></li>
                                <li><a href="#">Interviewed <span class="pull-right badge bg-green">{{ $applicants->where('status', 2)->count() }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="small-box bg-green">
                        <div class="inner">
                          <h3>&nbsp;</h3>
                          <p>&nbsp;</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-clipboard"></i>
                        </div>
                    </div>

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title text-green"><b></b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">&nbsp; <span class="pull-right badge bg-blue"></span></a></li>
                                <li><a href="#">&nbsp; <span class="pull-right badge bg-red"></span></a></li>
                                <li><a href="#">&nbsp; <span class="pull-right badge bg-aqua"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                          <h3>{{ $positions->count() }}</h3>
                          <p>Positions</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-edit"></i>
                        </div>
                    </div>

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title text-maroon"><b>Positions</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">No. of Positions Hiring <span class="pull-right badge bg-blue">{{ $positions->count() }}</span></a></li>
                                <li><a href="#">&nbsp; <span class="pull-right badge bg-red"></span></a></li>
                                <li><a href="#">&nbsp; <span class="pull-right badge bg-aqua"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="small-box bg-orange">
                        <div class="inner">
                          <h3>{{ $users->count() }}</h3>
                          <p>User Accounts</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-android-people"></i>
                        </div>
                    </div>

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title text-orange"><b>User Accounts</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">Registered Accounts <span class="pull-right badge bg-blue">{{ $users->count() }}</span></a></li>
                                <li><a href="#">Active Accounts <span class="pull-right badge bg-green">{{ $users->where('status', 1)->count() }}</span></a></li>
                                <li><a href="#">Inactive Accounts <span class="pull-right badge bg-red">{{ $users->where('status', 0)->count() }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title text-red"><i class="fa fa-bell-o fa-fw"></i> <b>Notifications</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="notifications" style="max-height: 500px;">
                                <ul class="nav nav-stacked">
                                    <li><a href="#" class="text-center">You have 0 notifications</a></li>
                                    <!-- <li>
                                        <a href="#">
                                            Registered Accounts 
                                            <br><small>asdasd</small>
                                            <span class="pull-right text-red">{{ $users->count() }}</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title text-green"><i class="fa fa-tasks fa-fw"></i> <b>Task</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="notifications" style="max-height: 500px;">
                                <ul class="nav nav-stacked">
                                    <li><a href="#" class="text-center">You have 0 tasks</a></li>
                                    <!-- <li>
                                        <a href="#">
                                            Registered Accounts 
                                            <br><small>asdasd</small>
                                            <span class="pull-right text-red">{{ $users->count() }}</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script>
        $('.notifications').slimScroll({
            color: '#8f8f8f',
            size: '10px',
            height: '',
            maxHeight: '400px',
            alwaysVisible: false
        });
    </script>
@endsection('scripts')