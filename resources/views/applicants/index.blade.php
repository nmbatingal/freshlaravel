@extends('layouts.app')

<!-- TITLE -->
@section('title')
    List of Applicants - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/dist/css/selectize.default.css') }}">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    List of Applicants
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Applicants</a></li>
    <li class="active">List of Applicants</li>
@endsection

<!-- MAIN PAGE CONTENT -->
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users fa-fw"></i> <b>List of Applicants</b></h3>
                    <div class="box-tools pull-right">
                        <a href="{{ url('/applicants/list/add')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Add Applicant</a>
                        <button type="button" id="submitlist" class="btn btn-warning btn-sm" data-toggle="modal"><i class="fa fa-list-ul"></i> Create Line-up</button>
                    </div>
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
                                            <th>Attachments</th>
                                            <th>Status</th>
                                            <th>Date Filed</th>
                                            <th class="no-sort action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applicants as $applicant)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a href='{{ url("/applicants/update/{$applicant->id}") }}' class="font-underline">{{ $applicant['lastname'] . ', ' . $applicant['firstname'] }} {{ !empty($applicant['middlename']) ? $applicant['middlename'][0].'.' : '' }}</a>
                                                    <input type="hidden" name="applicant_id[]" value="{{ $applicant['id'] }}">
                                                </td>
                                                <td>
                                                    @foreach($applicant->educations as $educations)
                                                        <dt>{{ $educations['program'] }}</dt>
                                                        <dd>{{ $educations['school'] }} - {{ $educations['year'] }}</dd>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($applicant->trainings as $training)
                                                        {{ $training['title'] }}
                                                        <br><small>{{ $training['conducted_by'] }}</small><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($applicant->experiences as $experience)
                                                        {{ $experience['position'] }}
                                                        <br><small>{{ $experience['agency'] }} - {{ date("Y", strtotime($experience['to_date'])) }}</small><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($applicant->eligibilities as $eligibility)
                                                        {{ $eligibility['title'] }};<br>
                                                    @endforeach
                                                </td>
                                                <td class="text-left">
                                                    @foreach($applicant->fileAttachments as $file)
                                                        <a href="{{ asset($file['path'].'/'.$file['filename']) }}" class=""><small><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;<u>{{ $file['filename'] }}</u></small></a><br>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    @if($applicant['status'] == 0)
                                                        <span class="label bg-red">not yet interviewed</span>
                                                    @else
                                                        <span class="label bg-green">interviewed</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ date("M-d-Y", strtotime($applicant['created_at'])) }}
                                                </td>
                                                <td class="text-center">
                                                    <a href='{{ url("/applicants/update/{$applicant->id}") }}' class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    <a href='{{ url("/applicants/delete/{$applicant->id}") }}' class="btn-app-delete btn btn-danger btn-xs" data-method="delete" data-token="{{csrf_token()}}"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-trash"></i></a>
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

    <!-- Large Size -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="largeModalLabel">SELECTION LINE-UP</h4>
                </div>
                
                <form id="create_lineup" method="POST" class="form-horizontal" action="{{ url('applicants/lineup/create') }}" role="form">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Position Title</label>
                                    <div class="col-sm-8">
                                        <select id="select-position" name="position_title" placeholder="Select a title..." required></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group masked-input">
                                    <label for="title" class="col-sm-3 control-label">Interview Date</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date_interview" class="form-control date" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Notes</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="notes" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box box-solid">
                                    <div class="box-body no-wrap">
                                        <div class="table-responsive">
                                            <table id="table-lineup" class="table table-bordered table-striped table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Education</th>
                                                        <th>Eligibility</th>
                                                        <th class="no-sort action"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- selection -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-save fa-fw"></i> SAVE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cancel"></i> CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- JAVASCRIPTS -->
@section('scripts')
    <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatables.mark.js/dist/datatables.mark.min.js') }}"></script>
    <script src="{{ asset('assets/mark.js/dist/jquery.mark.js') }}"></script>
    <script src="{{ asset('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-datatable.js') }}"></script>
    <script src="{{ asset('assets/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery-applicant.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/selectize/dist/js/standalone/selectize.js') }}" type="text/javascript"></script>
    <script>

        $.get('{{ url("/applicants/list/positions") }}', function(data) {
            
            $('#select-position').append(data).selectize({
                create: false,
                sortField: 'text'
            });

        });
    </script>
@endsection('scripts')