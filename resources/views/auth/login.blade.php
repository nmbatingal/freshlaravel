@extends('layouts.login')

@section('title')
Login
@endsection

@section('styles')
<link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form class="form-login" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-login-heading">log in to start your session</h2>
        <div class="login-wrap">
            
            <!-- <input type="text" class="form-control" placeholder="User ID" autofocus> -->

            <div class="form-group {{ $errors->has('email') ? 'has-error has-danger' : '' }}">
                <input type="email" class="form-control form-control-danger" id="email" name="email" value="{{ old('email') }}" placeholder="username"  autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error has-danger' : '' }}">
                <input id="password" type="password" class="form-control form-control-danger" name="password" placeholder="password" >

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>

            <button class="btn btn-primary btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> LOG IN</button>

            <br>

            <div class="registration">
                Don't have an account yet?<br/>
                <a class="" href="#">
                    Create an account
                </a>
            </div>

        </div>

    </form>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-theme" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection

@section('scripts')
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
<script>
    $.backstretch('img/login-bg.jpg', {speed: 500});
</script>
@endsection