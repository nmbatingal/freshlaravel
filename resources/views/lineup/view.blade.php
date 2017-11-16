@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><a href="{{ url('lineup')}}">LINE-UP</a> | <b>SELECTION LINE-UP</b></h2>
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
                        <h2>
                            JOB APPLICATION
                            <small>asterisk (*) fields required</small>
                        </h2>
                    </div>

                    <div class="body">
                        <form id="update_lineup" method="POST" action="{{ url('lineup/update') }}" role="form">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Position Title*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Acronym</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Qualification Standards</h2>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Education</label>
                                            <textarea rows="1" class="form-control no-resize auto-growth" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Experience</label>
                                            <textarea rows="1" class="form-control no-resize auto-growth" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Trainings</label>
                                            <textarea rows="1" class="form-control no-resize auto-growth" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Eligibilities</label>
                                            <textarea rows="1" class="form-control no-resize auto-growth" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SELECTED APPLICANTS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-lineup-selection" class="table table-bordered table-striped table-condensed table-hover dataTable">
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
                                    @foreach($selections as $selection)
                                        <tr>
                                            <td>
                                                <a href='{{ url("/applicants/update/{$selection->applicant->id}") }}' class="font-underline">{{ $selection->applicant['lastname'] . ', ' . $selection->applicant['firstname'] }} {{ !empty($selection->applicant['middlename']) ? $selection->applicant['middlename'][0].'.' : '' }}</a>
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
                                            <td class="align-left">
                                            </td>
                                            <td class="align-center">
                                                <a href="javascript:void(0);" class="btn btn-remove-app btn-danger btn-xs"><i class="material-icons md-18">close</i></a>
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
