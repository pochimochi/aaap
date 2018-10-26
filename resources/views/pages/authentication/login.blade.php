<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{env('APP_NAME')}}</title>
    <!-- Favicon -->
    <link href="{{asset('images/logos/logoicontest.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/assets/css/argon.css')}}" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="bg-default">
<div class="main-content">
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="../index.html">
                <img src="{{asset('images/logos/logowhite.png')}}" class="navbar-brand-img" alt="...">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../index.html">
                                <img src="{{asset('images/logos/logo.png')}}" class="navbar-brand-img" alt="...">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                    aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navbar items -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{url('/home')}}">
                            <i class="fa fa-home"></i>
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{url('/register')}}">
                            <i class="ni ni-circle-08"></i>
                            <span class="nav-link-inner--text">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{url('/login')}}">
                            <i class="ni ni-key-25"></i>
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Login</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--200 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Sign in with credentials</small>
                        </div>
                        <form action="{{URL::to('/login')}}" id="my-form" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input type="email" placeholder="Email" name="email"
                                           class="form-control input-rounded">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input type="password" placeholder="Password" name="password"
                                           class="form-control input-rounded">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                        <label class="custom-control-label" for=" customCheckLogin">
                                            <span class="text-muted">Remember me</span>
                                        </label>

                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="form-group">
                                <div class="g-recaptcha" align="center"
                                     data-sitekey="6Lfj6XAUAAAAAP9Mkg2ajxaSAZy0LaV-TS_BcnlK" style="display: block">

                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-rounded">Sign in
                                </button>
                            </div>

                            <input type="hidden" name="_token" value="{{ Session::token() }}">


                        </form>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="{{URL::to('/forgotpassword/create')}}" class="text-light">
                            <small>Forgot password?</small>
                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{URL::to('/register')}}" class="text-light">
                            <small>Create new account</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"><img src="{{asset('images/logos/logowhite.png')}}" width="200" class="navbar-brand-img" alt="..."></a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js')}}"></script>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js', '#my-form')}}"></script>
{!!  $jsValidator = 1 !!}
<script type="text/javascript">
    $('table').DataTable({
        /* "dom": '<"container"<"card"<"table-responsive"<lf<t>ip>>>>',*/
        "pagingType": "numbers",
        responsive: true

    });
</script>
</body>
</html>




