@extends('layouts.app')

@section('styles')
@endsection('styles')

@section('page-title')
    Dashboard
@endsection

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="box box-primary">
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="box box-primary">
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="box box-primary">
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
@endsection('scripts')