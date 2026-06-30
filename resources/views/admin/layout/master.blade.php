@php
    $backend = asset('backend') . '/';
@endphp
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title> @yield('page-title') | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $backend }}assets/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="{{ $backend }}assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ $backend }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ $backend }}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ $backend }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ $backend }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ $backend }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



    {{-- Toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- Start header --}}
        @include('admin.layout.body.header')
        {{-- End header --}}

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layout.body.siderbar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">


            <!-- Start content -->
            @yield('main-content')
            <!-- End content -->

            {{-- Start Footer --}}
            @include('admin.layout.body.footer')
            {{-- End Footer --}}


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ $backend }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ $backend }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ $backend }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ $backend }}assets/libs/node-waves/waves.min.js"></script>


    <!-- apexcharts -->
    <script src="{{ $backend }}assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ $backend }}assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ $backend }}assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
    </script>

    <!-- Required datatable js -->
    <script src="{{ $backend }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ $backend }}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ $backend }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ $backend }}assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ $backend }}assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ $backend }}assets/js/app.js"></script>

    {{-- Toaster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    {{-- Validation --}}
    <script src="{{ $backend }}assets/js/validate.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ $backend }}assets/js/sweetalertcode.js"></script>

    {{-- Notify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

    {{-- Handle Bar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script>


    @yield('code-scripts')




</body>

</html>
