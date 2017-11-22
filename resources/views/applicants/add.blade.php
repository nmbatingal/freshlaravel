@extends('layouts.app')

<!-- TITLE -->
@section('title')
    Add Applicants - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
    <link href="{{ asset('assets/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/selectize/dist/css/selectize.css') }}" rel="stylesheet">
@endsection('styles')

<!-- PAGE TITLE -->
@section('page-title')
    <i class="fa fa-users"></i> Applicants
@endsection

<!-- CAMEL PAGE TITLE -->
@section('camel-title')
    Add Applicants
@endsection

<!-- BREADCRUMB -->
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Applicants</a></li>
    <li><a href="{{ url('/applicants/list') }}">List</a></li>
    <li class="active">Add Applicant</li>
@endsection

@section('content')
<section class="content">
    
    <br>

    <form id="add_applicant_form" class="form-horizontal" method="POST" action="{{ url('/add-applicant/create') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- APPLICANT DETAILS -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-user fa-fw"></i> <b>Applicant Details</b></h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="title" class="col-sm-4 control-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last" autofocus required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="firstname" placeholder="First" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="middlename" placeholder="MI">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group masked-input">
                                    <label for="title" class="col-sm-4 control-label">Contact Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mobile-phone-number" name="contact-number" placeholder="+63 (999) 999-9999" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group masked-input">
                                    <label for="title" class="col-sm-4 control-label">File Attachments</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="attachment[]" multiple required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- EDUCATION -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-mortar-board fa-fw"></i> <b>Education</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Program</label>
                                        <input type="text" class="form-control" name="education[program][]" placeholder="Degree taken" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>School</label>
                                        <input type="text" class="form-control" name="education[school][]" placeholder="School graduated from" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group masked-input">
                                    <div class="col-sm-12">
                                        <label>Year</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="education[year][]" class="form-control date" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TRAINING -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-cogs fa-fw"></i> <b>Trainings</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="applicant" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="training[title][]" placeholder="Training title">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Conducted By</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="training[conducted_by][]" placeholder="Department / Organization / Agency">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-1">
                                <div class="form-group masked-input">
                                    <label for="title" class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control date" name="training[from_date][]" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd">
                                        </div>
                                        <em>From</em>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control date" name="training[to_date][]" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd">
                                        </div>
                                        <em>To</em>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="title" class="col-sm-1 col-sm-offset-1 control-label">Hours</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="number" class="form-control" name="training[hours][]" min="0" step="1" placeholder="00">
                                        </div>
                                        <em>Format: number only</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- WORK EXPERIENCE -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-suitcase fa-fw"></i> <b>Work Experience</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="applicant" class="col-sm-2 col-sm-offset-1 control-label">Position</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="experience[position][]" placeholder="Position title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group masked-input">
                                    <label for="applicant" class="col-sm-5 control-label">Monthly Salary</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control money-dollar" placeholder="Ex: 000,000.00" name="experience[salary][]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title" class="col-sm-1 col-sm-offset-1 control-label">Agency</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="experience[agency][]" placeholder="Department / Organization / Agency">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-1">
                                <div class="form-group masked-input">
                                    <label for="title" class="col-sm-1 col-sm-offset-1 control-label">Date</label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control date" name="experience[from_date][]" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd">
                                        </div>
                                        <em>From</em>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control date" name="experience[to_date][]" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd">
                                        </div>
                                        <em>To</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ELIGIBILITY -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-check-square-o fa-fw"></i> <b>Eligibility</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="applicant" class="col-sm-2 col-sm-offset-1 control-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="eligibility[title][]" placeholder="Ex: CSC / LET / BAR">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group masked-input">
                                    <label for="applicant" class="col-sm-5 control-label">License No.</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="eligibility[license_no][]" placeholder="License number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="applicant" class="col-sm-2 col-sm-offset-1 control-label">Rating</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="eligibility[rating][]" placeholder="Ex: 00.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-sm-offset-3">
                                <div class="form-group masked-input">
                                    <label for="applicant" class="col-sm-5 control-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control date" name="eligibility[license_no][]" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="" placeholder="yyyy-mm-dd">
                                        </div>
                                        <em>From</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDUCATION -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-mortar-board fa-fw"></i> <b>Education</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="applicant" class="col-sm-2 col-sm-offset-1 control-label">Remarks</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="remarks" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-success" type="submit">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

<!-- JAVASCRIPTS -->
@section('scripts')
    <script src="{{ asset('assets/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery-applicant.js') }}" type="text/javascript"></script>
@endsection('scripts')