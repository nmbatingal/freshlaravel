@extends('layouts.app')

<!-- TITLE -->
@section('title')
    Lineup of Applicants - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    Lineup of Applicants
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="{{ url('/applicants/list') }}">Applicants</a></li>
    <li class="active">Lineup of Applicants</li>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tasks fa-fw"></i> <b>Lineup of Applicants</b></h3>
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
                            <table id="table-lineup" class="table table-bordered table-striped table-hover table-responsive dataTable">
                                <thead>
                                    <tr>
                                        <th>Position Title</th>
                                        <th class="col-md-1">Interview Date</th>
                                        <th class="col-md-1">Status</th>
                                        <th class="col-md-1 no-sort action"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Position Title</th>
                                        <th>Interview Date</th>
                                        <th>Status</th>
                                        <th class="no-sort action"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <td>
                                                <a href='{{ url("applicants/lineup/view/{$applicant->id}") }}' class="font-underline">{{ $applicant->position['title']}}</a>&nbsp;&nbsp;<span class="label bg-green">{{ count($applicant->applicantSelections) }}</span>
                                            </td>
                                            <td class="text-center">
                                                {{ $applicant['date_interview'] ? date("M-d-Y", strtotime($applicant['date_interview'])) : '' }}
                                            </td>
                                            <td class="text-center">
                                                @if($applicant['status'] == 0)
                                                    <span class="badge bg-red">not yet conducted</span>
                                                @else
                                                    <span class="badge bg-green">conducted</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href='{{ url("applicants/lineup/view/{$applicant->id}") }}' class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                <a href='{{ url("applicants/lineup/delete/{$applicant->id}") }}' class="btn-app-delete btn btn-danger btn-xs" data-method="delete" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-trash"></i></a>
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
</section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatables.mark.js/dist/datatables.mark.min.js') }}"></script>
    <script src="{{ asset('assets/mark.js/dist/jquery.mark.js') }}"></script>
    <script src="{{ asset('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-lineup.js') }}" type="text/javascript"></script>
@endsection('scripts')