@extends('layouts.login')

@section('title')
Login -
@endsection

@section('content')
<div class="container">
    <form class="form-login" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-login-heading">log in to start your session</h2>
        <div class="login-wrap">
            
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <div class="form-line">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username" autofocus>
                    </div>
                </div>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <div class="form-line">
                        <input id="password" type="password" class="form-control form-control-danger" name="password" placeholder="password" >
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <label class="checkbox">
                <span class="pull-right">
                    <!-- <a data-toggle="modal" href="#myModal"> Forgot Password?</a> -->
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                </span>
            </label>

            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-lock"></i> LOG IN</button>

            <br>

            <div class="registration">
                Don't have an account yet?<br/>
                <a href="{{ route('register') }}">
                    Create an account
                </a>
            </div>
        </div>
    </form>
</div>
@endsection