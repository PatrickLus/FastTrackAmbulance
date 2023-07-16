<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('img/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::to('img/favicon.png') }}">
    <title>FastTrack</title>
    <link href="toastr.css" rel="stylesheet"/>
    <script src="toastr.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="{{ URL::to('css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ URL::to('css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- Font Awesome Icons INSERT YOUR KIT-->
    <script src="https://kit.fontawesome.com/ff9727b270.js" crossorigin="anonymous"></script>
    <link href="{{ URL::to('css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::to('css/soft-ui-dashboard.css?v=1.0.6') }}" rel="stylesheet"/>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</head>
<style>
    .form-group[class*=has-icon-].has-icon-left .form-select {
        padding-left: 2.5rem;
    }
</style>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow
            position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 w-50" href="#">
                        <img src="{{ URL::to('img/logo.png') }}" class="navbar-brand-img w-30" alt="main_logo">
                    </a>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                            <li class="nav-item w-100">

                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <pre><div class="page-header min-vh-25"></pre>

        <div class="container">
            @yield('content')
        </div>
        </div>
    </section>
</main>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    FastTrack ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    ,
                    made with <i class="fa fa-heart"></i> by
                    <a href="#" class="font-weight-bold" target="_blank">P.A.L & C.K.M</a>
                </div>
            </div>

        </div>
    </div>
</footer>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>
