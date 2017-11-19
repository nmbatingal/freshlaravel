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

    <form id="add_applicant_form" class="form form-horizontal" method="POST" action="{{ url('/add-applicant/create') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-gray">
                        <h3 class="box-title"><i class="fa fa-user fa-fw"></i> <b>Applicant Details</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="applicant" class="col-sm-1 col-sm-offset-1 control-label">Full Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="lastname" placeholder="Last" autofocus required>
                                <span class="help-block"><em>This field is required</em></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="firstname" placeholder="First" required>
                                <span class="help-block"><em>This field is required</em></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="middlename" placeholder="MI">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-gray">
                        <h3 class="box-title"><i class="fa fa-mortar-board fa-fw"></i> <b>Education</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Program</label>
                                        <input type="text" class="form-control" name="education[program][]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>School</label>
                                        <input type="text" class="form-control" name="education[school][]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Year</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control datemask" data-inputmask="'alias': 'YYYY-MM-DD'" data-mask="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-success" type="submit">SUBMIT</button>
    </form>

    <div class="row">
        <div class="container">
          <h2>Bootstrap Mixed Form <p class="lead">with horizontal and inline fields</p></h2>
          <form role="form" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-1" for="inputEmail1">Email</label>
              <div class="col-sm-5"><input type="email" class="form-control" id="inputEmail1" placeholder="Email"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-1" for="inputPassword1">Password</label>
              <div class="col-sm-5"><input type="password" class="form-control" id="inputPassword1" placeholder="Password"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="TextArea">Textarea</label>
              <div class="col-sm-6"><textarea class="form-control" id="TextArea"></textarea></div>
            </div>
            <div class="form-group">
              <div class="col-sm-3"><label>First name</label><input type="text" class="form-control" placeholder="First"></div>
              <div class="col-sm-3"><label>Last name</label><input type="text" class="form-control" placeholder="Last"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-12">Phone number</label>
              <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">area</div></div>
              <div class="col-sm-1"><input type="text" class="form-control" placeholder="000"><div class="help">local</div></div>
              <div class="col-sm-2"><input type="text" class="form-control" placeholder="1111"><div class="help">number</div></div>
              <div class="col-sm-2"><input type="text" class="form-control" placeholder="123"><div class="help">ext</div></div>
            </div>
            <div class="form-group">
              <label class="col-sm-1">Options</label>
              <div class="col-sm-2"><input type="text" class="form-control" placeholder="Option 1"></div>
              <div class="col-sm-3"><input type="text" class="form-control" placeholder="Option 2"></div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
            </div>
          </form>
          <hr>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><a href="{{ url('applicants')}}">APPLICANTS</a> | <b>ADD APPLICANT</b></h2>
        </div>
        

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>EDUCATION</b>
                                <small>asterisk (*) fields required</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="educ_row1" class="row_educ">
                                <div class="row clearfix">
                                    <div class="col-md-4 col-xs-12">
                                        <b>Program*</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="education[program][]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <b>School*</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="education[school][]" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <b>Year*</b>
                                        <div class="form-group form-float">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line masked-input">
                                                    <input type="number" class="form-control" name="education[year][]" min="0" max="2100" placeholder="Ex: 2016" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <div class="col-xs-12 col-sm-12 align-right">
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                                <i class="material-icons">clear</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>RELEVANT TRAININGS</b>
                                <small>asterisk (*) fields required</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="training_row1" class="row_training">
                                <div class="row clearfix">
                                    <div class="col-md-6 col-xs-12">
                                        <b>Title</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="training[title][]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <b>Conducted by</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="training[conducted_by][]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 col-xs-12">
                                        <b>From</b>
                                        <div class="form-group form-float">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line masked-input">
                                                    <input type="text" class="form-control date" name="training[from_date][]" placeholder="Ex: 30/07/2017">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <b>To</b>
                                        <div class="form-group form-float">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line masked-input">
                                                    <input type="text" class="form-control date" name="training[to_date][]" placeholder="Ex: 30/07/2017">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <b>Hours</b>
                                        <div class="form-group form-float">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="training[hours][]" min="0" placeholder="Ex: 24">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-xs-12 col-sm-12 align-right">
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                                <i class="material-icons">clear</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>WORK EXPERIENCE</b>
                                <small>asterisk (*) fields required</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="experience_row1" class="row_experience">
                                <div class="row clearfix">
                                    <div class="col-md-3 col-xs-12">
                                        <b>Monthly Salary</b>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="experience[position][]">
                                                <label class="form-label">Position</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="experience[agency][]">
                                                <label class="form-label">Agency</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <b>Monthly Salary</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">attach_money</i>
                                            </span>
                                            <div class="form-line masked-input">
                                                <input type="text" class="form-control money-dollar" placeholder="Ex: 000,000.00" name="experience[salary][]">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="experience[appointment][]">
                                                <label class="form-label">Status of Appointment</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="experience[is_gov][]" min="0">
                                                <label class="form-label">is government</label>
                                            </div>
                                            <div class="help-info">Numbers only</div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="experience[from_date][]" >
                                                <label class="form-label">From</label>
                                            <div class="help-info">YYYY-MM-DD format</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="experience[to_date][]" >
                                                <label class="form-label">To</label>
                                            <div class="help-info">YYYY-MM-DD format</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-xs-12 col-sm-12 align-right">
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                                <i class="material-icons">clear</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>ELIGIBILITY</b>
                                <small>asterisk (*) fields required</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="eligibility_row1" class="row_eligibility">
                                <div class="row clearfix">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="eligibility[title][]">
                                                <label class="form-label">Title</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="eligibility[license_no][]">
                                                <label class="form-label">License No.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="eligibility[rating][]">
                                                <label class="form-label">Rating</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="eligibility[exam_date][]" >
                                                <label class="form-label">Date</label>
                                            <div class="help-info">YYYY-MM-DD format</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="col-xs-12 col-sm-12 align-right">
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" class="btn bg-gray btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                                <i class="material-icons">clear</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>FILE ATTACHMENT</b>
                                <small>required</small>
                            </h2>
                        </div>
                        <div class="body">
                                <div class="row clearfix">
                                <div class="col-md-3 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="attachment[]" multiple required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary waves-effect" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- #END# Advanced Form Example With Validation -->
    </div>
</section>
@endsection

<!-- JAVASCRIPTS -->
@section('scripts')
    <script src="{{ asset('assets/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-applicant.js') }}" type="text/javascript"></script>
@endsection('scripts')