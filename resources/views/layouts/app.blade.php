<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') HR Applicant System</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    @yield('styles')
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="skin-blue fixed sidebar-mini">

    <div id="app" class="wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('page-title')
                    <small>@yield('camel-title')</small>
                </h1>
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </section>

            @yield('content')
        </div>

        <!--main content start-->
        

        <!-- <section id="main-content">
            <section class="wrapper">
                yield('content')
            </section>
        </section> -->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    @yield('scripts')

    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>
    <!-- <script class="include" type="text/javascript" src="{{ asset('assets/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.scrollTo.min.js') }}"></script> -->
    <!-- <script type="text/javascript" src="assets/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/assets/js/gritter-conf.js"></script> -->
    <!-- FastClick -->
    <script src="{{ asset('assets/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="{{ asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>

</body>
</html>
