<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title> @yield('title') | eCommerce</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link href="{{ asset('backend') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('backend') }}/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('backend') }}/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    @stack('styles')

    <style>
        .breadcrumb-nav li{
            display: inline-block;
        }
        .breadcrumb-nav li:first-child::before{
            padding: 0;
            content: '';
        }
        .breadcrumb-nav li::before{
            padding-right: .5rem;
            padding-left: .5rem;
            color: #868e96;
            content: "/";
        }
        .breadcrumb-nav li.active a{
            color: #23b7e5;
        }
        .table th{
            font-weight: 600 !important;
        }
        .table th:first-child,
        .table tr td:first-child{
            text-align: left;
            padding-left: 15px;
        }
        .table th:last-child,
        .table tr td:last-child{
            text-align: right;
            padding-right: 15px;
        }
        .pr-15{
            padding-right: 15px;
        }
        .dataTables_length,
        .dataTables_info{
            padding-left: 15px
        }
        /* btn style */
        .action-btn .btn-style{
            margin-left: 4px;
        }

        .btn-style {
            text-align: center;
            width: 15px;
            height: 15px;
            line-height: 15px;
            cursor: pointer;
            border: 0;
            border-radius: 50%;
            font-size: 12px;
            display: inline-block;
            padding: 5px;
            transition: .5s ease-in-out;
        }

        .btn-style-danger{
            background: rgba(239,72,106,.15);
            color: #ff5370;
        }
        .btn-style-danger:hover {
            background: #ff5370;
            color: #fff;
        }

        .btn-style-edit{
            background: rgba(55,125,255,.15);
            color: #377dff;
        }
        .btn-style-edit:hover {
            background: #377dff;
            color: #fff;
        }

        .btn-style-view{
            background: rgba(23, 162, 184, .15);
            color: #17a2b8;
        }
        .btn-style-view:hover {
            background: #17a2b8;
            color: #fff;
        }

        .btn-style-clone{
            background: rgba(255, 193, 7, .25);
            color: #ffc107;
        }
        .btn-style-clone:hover {
            background: #ffc107;
            color: #fff;
        }
        
    </style>
</head>

<body class="fixed-navbar">
    @auth
        @include('backend.include.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('backend.include.sidebar')   
    @endauth    
            <!-- END SIDEBAR-->
            <div class="content-wrapper">
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    {{-- Start Breadcrumb --}}
                    @include('backend.roles.breadCome')
                    {{-- End Breadcrumb --}}

                    @yield('content')
                </div>
                <!-- END PAGE CONTENT-->
                @include('backend.include.footer')
            </div>
        </div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

    
    <!-- CORE PLUGINS-->
    <script src="{{ asset('backend') }}/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('backend') }}/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="{{ asset('backend') }}/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('backend') }}/js/app.min.js" type="text/javascript"></script>
    
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('backend') }}/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        var _token="{{ csrf_token() }}";
    </script>
    @stack('script')
    
</body>

</html>
