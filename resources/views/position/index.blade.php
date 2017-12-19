@extends('layouts.app')

<!-- TITLE -->
@section('title')
    Positions - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.default.css') }}">
    <style>
        .form-control-feedback {
            pointer-events: auto;
        }
    </style>
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    Positions
@endsection

<!-- CAMEL PAGE TITLE -->
@section('camel-title')
    
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Positions</li>
@endsection

<!-- MAIN PAGE CONTENT -->
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border bg-orange">
                    <h3 class="box-title"><i class="fa fa-thumb-tack"></i> <b>Position Offered</b></h3>
                </div>
                <div class="box-body">
                </div>
                <div class="box-footer no-padding">
                    <div id="list-positions" style="max-height: 500px;">
                        <ul class="nav nav-stacked">
                            @if( count($positions) > 0)
                                @foreach($positions as $position)
                                    <li>
                                        <a data-id="{{ $position['id'] }}" href="#">
                                            <b>{{ $position['title'] }}</b> <small>{{ $position['acronym'] }} - SG {{ $position['sal_grade'] }}</small>
                                            <span class="pull-right label bg-orange">{{ date("M-d-Y", strtotime($position['created_at'])) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href="#">
                                        <small>no data available</small>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Create Position</b></h3>
                </div>
                <form id="form-position" method="POST" class="form" action="{{ url('positions/create') }}" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('info'))
                            <div class="alert alert-success alert-dismissible hide-alert-panel">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> {{ session('info') }}</h4>
                            </div>
                        @endif
                        <div class="callout bg-gray">
                            <p>Fill out the form to add another position offering.</p>
                        </div>

                        <div class="box box-solid">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" placeholder="Position Title" autofocus required>
                                            <span class="help-block"><em>Enter the position title offered</em></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="acronym" placeholder="Title Accronym">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="sal_grade" min="0" step="1" placeholder="Salary Grade">
                                            <span class="help-block text-right"><em>format: number only</em></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box">
                                <div class="box-header with-border bg-primary">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="text-white">
                                        <b>Publication No.</b>
                                      </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                    <div class="box-body">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="" id="input-publication" name="publication_no" placeholder="enter publication number" required>
                                                <span class="help-block"><em>Separate item by comma</em></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel box">
                                <div class="box-header with-border bg-primary">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="text-white" aria-expanded="true">
                                            <b>Item No.</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="true" style="">
                                    <div class="box-body">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="" id="input-item-no" name="item_no" placeholder="enter item number" required>
                                                <span class="help-block"><em>Separate item by comma</em></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel box">
                                <div class="box-header with-border bg-primary">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="text-white" aria-expanded="true">
                                        <b>Qualification Standards</b>
                                      </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="true" style="height: 0px;">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label><i class="fa fa-mortar-board fa-fw"></i> Education</label>
                                            <textarea class="form-control" rows="2" name="education" placeholder="Enter education required ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-briefcase fa-fw"></i> Experience</label>
                                            <textarea class="form-control" rows="2" name="experience" placeholder="Enter experience required ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-flag fa-fw"></i> Trainings</label>
                                            <textarea class="form-control" rows="2" name="trainings" placeholder="Enter trainings required ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-wrench fa-fw"></i> Eligibilities</label>
                                            <textarea class="form-control" rows="2" name="eligibilities" placeholder="Enter eligibilities required ..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/selectize/dist/js/standalone/selectize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-position.js') }}" type="text/javascript"></script>

    <script>
        $('#list-positions').slimScroll({
            color: '#8f8f8f',
            size: '10px',
            height: '',
            alwaysVisible: false
        });

        $('#input-publication').selectize({
            plugins: ['restore_on_backspace'],
            plugins: ['remove_button'],
            delimiter   : ',',
            persist     : false,
            create      : function(input) {
                return {
                    value   : input,
                    text    : input
                }
            }
        });

        $('#input-item-no').selectize({
            plugins: ['restore_on_backspace'],
            plugins: ['remove_button'],
            delimiter   : ',',
            persist     : false,
            create      : function(input) {
                return {
                    value   : input,
                    text    : input
                }
            }
        });
    </script>
@endsection('scripts')