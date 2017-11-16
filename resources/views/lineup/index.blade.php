@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LINE-UP</h2>
        </div>
        @if(session('info'))
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{ session('info') }}
            </div>
        @endif

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>LINE-UP OF APPLICANTS</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-lineup" class="table table-bordered table-striped table-condensed table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Position Title</th>
                                        <th>No. of Selected Applicants</th>
                                        <th>Date Interview</th>
                                        <th>Status</th>
                                        <th class="no-sort action"></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Position Title</th>
                                        <th>No. of Selected Applicants</th>
                                        <th>Date Interview</th>
                                        <th>Status</th>
                                        <th class="no-sort action"></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <td>
                                                <a href='{{ url("/lineup/view/{$applicant->id}") }}' class="font-underline">{{ $applicant->position['title']}}</a>
                                            </td>
                                            <td>
                                                {{ count($applicant->applicantSelections) }}
                                            </td>
                                            <td class="align-center">
                                                {{ $applicant['date_interview'] ? date("M-d-Y", strtotime($applicant['date_interview'])) : '' }}
                                            </td>
                                            <td class="align-center">
                                                @if($applicant['status'] == 0)
                                                    <span class="badge bg-red">not yet conducted</span>
                                                @else
                                                    <span class="badge bg-green">conducted</span>
                                                @endif
                                            </td>
                                            <td class="align-center">
                                                <a href='{{ url("/lineup/delete/{$applicant->id}") }}' class="btn-app-delete btn btn-danger btn-xs" data-method="delete" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="material-icons md-18">delete</i></a>
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
        <!-- #END# Basic Examples -->
    </div>
</section>
@endsection
