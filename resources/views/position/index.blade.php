@extends('layouts.app')

<!-- TITLE -->
@section('title')
    Positions - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.default.css') }}">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    <i class="fa fa-cog"></i> Positions
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
                    <h3 class="box-title"><b>Position Offered</b></h3>
                </div>
                <div class="box-body no-padding bg-gray">
                    <div id="list-positions">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="#">
                                    <b>Senior Research Specialist II</b> <small>ro 13</small>
                                    <span class="pull-right label bg-orange">new</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xs-12">
            @if(session('info'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{ session('info') }}</h4>
                </div>
            @endif
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Create Position</b></h3>
                </div>
                <form >
                    <div class="box-body">
                        <div class="callout bg-gray">
                            <p>Fill out the form to add another position offering.</p>
                        </div>

                        <div class="box box-solid">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="position_title" placeholder="Position Title" autofocus required>
                                            <span class="help-block">Enter the position title offered</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="accronym" placeholder="Title Accronym">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="salary_grade" placeholder="Salary Grade">
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
                                                <input type="text" class="" id="input-publication" placeholder="enter publication number" required>
                                                <span class="help-block">Separate item by comma</span>
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
                                                <input type="text" class="" id="input-item-no" placeholder="enter item number" required>
                                                <span class="help-block">Separate item by comma</span>
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
                                        sadsd
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </form>
            </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@section('scripts')

    <script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/selectize/dist/js/standalone/selectize.js') }}" type="text/javascript"></script>

    <script>
        $('#list-positions').slimScroll({
            color: '#8f8f8f',
            size: '10px',
            height: '500px',
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