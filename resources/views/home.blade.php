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
@endsection

@section('scripts')
<script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
@endsection('scripts')