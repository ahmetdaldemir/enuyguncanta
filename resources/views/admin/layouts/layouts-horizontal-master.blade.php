<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8"/>
<title> @yield('title') | Yönetim Paneli</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Enuyguncanta Yönetim Paneli" name="description"/>
<meta content="ikoncenter" name="author"/>
<!-- App favicon -->
<link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico')}}">

<!-- headerCss -->
@yield('headerCss')

<!-- Bootstrap Css -->
<link href="{{ URL::asset('/public/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
<!-- Icons Css -->
<link href="{{ URL::asset('/public/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- App Css-->
<link href="{{ URL::asset('/public/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('/public/css/custom.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

<link href="{{ URL::asset('/public/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

<script src="{{ URL::asset('/public/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/public/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('/public/libs/metismenu/metismenu.min.js')}}"></script>
<script>
    var app = angular.module('app', []);
</script>

<style>
    .select2 > .select2-choice.ui-select-match {
        /* Because of the inclusion of Bootstrap */
        height: 29px;
    }

    .selectize-control > .selectize-dropdown {
        top: 36px;
    }
    /* Some additional styling to demonstrate that append-to-body helps achieve the proper z-index layering. */
    .select-box {
        background: #fff;
        position: relative;
        z-index: 1;
    }
    .alert-info.positioned {
        margin-top: 1em;
        position: relative;
        z-index: 10000; /* The select2 dropdown has a z-index of 9999 */
    }
</style>



</head>

<body ng-app="app" data-topbar="light" data-layout="horizontal">

<!-- Begin page -->
<div id="layout-wrapper">

@include('admin.layouts.partials.navbar')

<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- content -->
                @yield('content')

                @include('admin.layouts.partials.footer')

            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

    @include('admin.layouts.partials.rightbar')

    <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('/public/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('/public/libs/node-waves/node-waves.min.js')}}"></script>
        <script src="{{ URL::asset('/public/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>
        <script src="{{ URL::asset('/public/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{ URL::asset('/public/js/pages/sweet-alerts.init.js')}}"></script>


        <!-- footerScript -->
    @yield('footerScript')

    <!-- App js -->
        <script src="{{ URL::asset('/public/js/app.min.js')}}"></script>
</body>

</html>
