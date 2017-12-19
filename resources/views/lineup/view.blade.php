@extends('layouts.app')

<!-- TITLE -->
@section('title')
    Selection Lineup - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    <i class="fa fa-tasks"></i> Lineup of Applicants
@endsection

<!-- CAMEL PAGE TITLE -->
@section('camel-title')
    Selection Lineup
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Applicants</a></li>
    <li><a href="{{ url('/applicants/lineup') }}">Lineup</a></li>
    <li class="active">Selection Lineup</li>
@endsection

@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Position Details</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" id="" class="btn btn-primary btn-sm" data-toggle="modal"><i class="fa fa-pencil fa-fw"></i> Update</button>
                    </div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Position Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly value="{{ $selection->position['title'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Salary Grade</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" readonly value="{{ $selection->position['sal_grade'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Publication No</label>
                                    <div class="col-sm-9" style="overflow-wrap:break-word;">
                                        <?php
                                            $publication = explode(',', $selection->position->publications[0]['publication_no']);

                                            foreach ($publication as $value) {
                                                echo '<span class="label bg-primary">'.$value.'</span>&nbsp;';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Item No</label>
                                    <div class="col-sm-9" style="overflow-wrap:break-word;">
                                        <?php
                                            $item = explode(',', $selection->position->items[0]['item_no']);

                                            foreach ($item as $value) {
                                                echo '<span class="label bg-primary">'.$value.'</span>&nbsp;';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label>Qualification Standards</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Education</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" readonly>{{ $selection->position->qualifications[0]['education'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Experience</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" readonly>{{ $selection->position->qualifications[0]['experience'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Experience</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" readonly>{{ $selection->position->qualifications[0]['trainings'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Eligibilities</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" readonly>{{ $selection->position->qualifications[0]['eligibilities'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-8">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-tools pull-right">
                                <button type="button" id="btn-print-list" class="btn btn-warning btn-sm" data-toggle="modal" value='{{ url("applicants/lineup/print/{$selection->id}") }}'><i class="fa fa-print fa-fw"></i> Print Selection Lineup Form</button>
                                <button type="button" id="btn-print-criteria" class="btn btn-primary btn-sm" data-toggle="modal" value='{{ url("applicants/lineup/print/evaluation-criteria/{$selection->id}") }}'><i class="fa fa-print fa-fw"></i> Print Evaluation Criteria Form</button>
                                <button type="button" id="btn-print-consolidate" class="btn btn-success btn-sm" data-toggle="modal" value='{{ url("applicants/lineup/print/consolidated/{$selection->id}") }}'><i class="fa fa-print fa-fw"></i> Print Consolidated Rater's Assessment Form</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><b>Selection Lineup of Applicants</b></h3>
                        </div>
                        <div class="box-body">

                            @if(session('info'))
                                 <div class="alert alert-success alert-dismissible hide-alert-panel">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{ session('info') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="table-lineup-selection" class="table table-bordered table-striped table-responsive table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Education</th>
                                                <th>Relevant Trainings</th>
                                                <th>Work Experience</th>
                                                <th>Eligibility</th>
                                                <th>Performance Rating</th>
                                                <th class="no-sort action"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group as $selection)
                                                <tr>
                                                    <td>
                                                        <a href='{{ url("/applicants/edit/{$selection->applicant->id}") }}' class="font-underline">{{ $selection->applicant['lastname'] . ', ' . $selection->applicant['firstname'] }} {{ !empty($selection->applicant['middlename']) ? $selection->applicant['middlename'][0].'.' : '' }}</a>
                                                        <input type="hidden" name="applicant_id[]" value="{{ $selection->applicant['id'] }}">
                                                    </td>
                                                    <td>
                                                        @foreach($selection->applicant->educations as $educations)
                                                            {{ $educations['program'] }}
                                                            <br><small>{{ $educations['school'] }} - {{ $educations['year'] }}</small><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($selection->applicant->trainings as $training)
                                                            {{ $training['title'] }}
                                                            <br><small>{{ $training['conducted_by'] }}</small><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($selection->applicant->experiences as $experience)
                                                            {{ $experience['position'] }}
                                                            <br><small>{{ $experience['agency'] }} - {{ date("Y", strtotime($experience['to_date'])) }}</small><br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($selection->applicant->eligibilities as $eligibility)
                                                            {{ $eligibility['title'] }};<br>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-left">
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0);" class="btn btn-remove-app btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                    </td>
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
    </div>

</section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatables.mark.js/dist/datatables.mark.min.js') }}"></script>
    <script src="{{ asset('assets/mark.js/dist/jquery.mark.js') }}"></script>
    <script src="{{ asset('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-lineup.js') }}" type="text/javascript"></script>
    <script>
        $('#btn-print-list').click(function () {
            var $href  = $(this).attr('value');
            var target = window.open( $href, 'Print','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1366,height=800');
            target.print();
        });
        
        $('#btn-print-criteria').click(function () {
            var $href  = $(this).attr('value');
            var target = window.open( $href, 'Print','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1366,height=800');
            target.print();
        });

        $('#btn-print-consolidate').click(function () {
            var $href  = $(this).attr('value');
            var target = window.open( $href, 'Print','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1366,height=800');
            target.print();
        });
    </script>
@endsection('scripts')