@extends('layouts.app')

<!-- TITLE -->
@section('title')
    User Accounts - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.default.css') }}">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
   User Accounts
@endsection

<!-- CAMEL PAGE TITLE -->
@section('camel-title')
    
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Users</li>
@endsection

<!-- MAIN PAGE CONTENT -->
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
                <div class="box-header with boarder">
                    <h3 class="box-title"><i class="fa fa-users"></i> <b>User Accounts</b></h3>
                </div>
                <div class="box-body">

                    @if(session('info'))
                        <div class="alert alert-success alert-dismissible hide-alert-panel">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> {{ session('info') }}</h4>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="table-applicant" class="table table-responsive table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Education</th>
                                            <th>Relevant trainings</th>
                                            <th>Work Experience</th>
                                            <th>Eligibility</th>
                                            <th class="no-sort action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
@endsection('scripts')