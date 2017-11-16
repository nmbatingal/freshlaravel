@extends('layouts.login')

@section('title')
Register -
@endsection

@section('content')
<div class="container">
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <form class="form-login" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <h2 class="form-login-heading">sign up to start your session</h2>
        <div class="login-wrap">

            <!-- FIRSTNAME -->
            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                <input id="firstname" type="text" class="form-control" name="firstname" placeholder="firstname*" value="{{ old('firstname') }}" required autofocus>
                @if ($errors->has('firstname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                @endif
            </div>

            <!-- LASTNAME -->
            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                <input id="lastname" type="text" class="form-control" name="lastname" placeholder="lastname*" value="{{ old('lastname') }}" required>
                @if ($errors->has('lastname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>

            <!-- MIDDLENAME -->
            <div class="form-group">
                <input id="middlename" type="text" class="form-control" name="middlename" placeholder="middlename" value="{{ old('middlename') }}">
            </div>

            <br/>

            <!-- EMAIL ADDRESS -->
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <div class="form-line">
                        <input id="email" type="email" class="form-control" placeholder="email address" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
                @endif
            </div>

            <!-- PASSWORD -->
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <div class="form-line ">
                        <input id="password" type="password" class="form-control" minlength="6" placeholder="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <div class="form-line">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="confirm password" required>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label>
                @endif
            </div>

            <div class="registration">
                username: <br/> first letter firstname and middlename and full lastname in small keys (e.g jdcruz)
            </div>
            
            <br/>
            
            <button class="btn btn-primary btn-block" type="submit">REGISTER ACCOUNT</button>

            <br>

            <div class="registration">
                Already have an account? &nbsp;
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>

        </div>
    </form>
</div>
@endsection