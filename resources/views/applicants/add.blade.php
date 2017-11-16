@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><a href="{{ url('applicants')}}">APPLICANTS</a> | <b>ADD APPLICANT</b></h2>
        </div>
        
        <!-- Advanced Form Example With Validation -->
        <form id="add_applicant_form" method="POST" action="{{ url('/add-applicant/create') }}" role="form" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>APPLICANT INFORMATION</b>
                                <small>asterisk (*) fields required</small>
                            </h2>
                        </div>
                        <div class="body">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-md-4 col-sm-12">
                                    <b>Lastname*</b>
                                    <div class="form-group form-float">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line masked-input">
                                                <input type="text" class="form-control" name="lastname" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <b>Firstname*</b>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="firstname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <b>Middlename</b>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="middlename">
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
