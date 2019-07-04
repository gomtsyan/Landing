<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="landing page laravel">
    <meta name="author" content="AG">
    <title>Admin</title>

    <!-- Icons -->
    <link href="{{ asset('assets_admin/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets_admin/css/argon.css?v=1.0.0') }}" rel="stylesheet">

    <script type="text/javascript" src="{{asset('assets_admin/js/ckeditor/ckeditor.js')}}"></script>

</head>

<body>

<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        @yield('sidebar')

    </div>
</nav>



<!-- Main content -->
<div class="main-content">

    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            @yield('header')
        </div>
    </nav>



        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" >
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid align-items-center">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger col-lg-12">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>


    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; {{ date('Y') }}
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets_admin/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets_admin/js/bootstrap-filestyle.min.js')}}"></script>

<script src="{{ asset('assets_admin/js/argon.js?v=1.0.0') }}"></script>
</body>

</html>
