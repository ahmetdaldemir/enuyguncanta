<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8" />
    <title> @yield('title')  | Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Enuyguncanta Yönetim Paneli" name="description" />
    <meta content="ikoncenter" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico')}}">

     <!-- headerCss -->
    @yield('headerCss')

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/public/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/public/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/public/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js" ></script>
</head>

<body ng-app="app" ng-controller="mainController" data-topbar="light" data-layout="horizontal">

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
            <script src="{{ URL::asset('/public/libs/jquery/jquery.min.js')}}"></script>
            <script src="{{ URL::asset('/public/libs/bootstrap/bootstrap.min.js')}}"></script>
            <script src="{{ URL::asset('/public/libs/metismenu/metismenu.min.js')}}"></script>
            <script src="{{ URL::asset('/public/libs/simplebar/simplebar.min.js')}}"></script>
            <script src="{{ URL::asset('/public/libs/node-waves/node-waves.min.js')}}"></script>
            <script src="{{ URL::asset('/public/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>

            <!-- footerScript -->
             @yield('footerScript')

            <!-- App js -->
            <script src="{{ URL::asset('/public/js/app.min.js')}}"></script>
</body>

</html>
