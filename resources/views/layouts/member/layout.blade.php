<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Design System - Free Design System for Bootstrap 4</title>
    <!-- Favicon -->
    <link href="{{asset('argonmember/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('argonmember/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argonmember/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argonmember/assets/css/argon.css?v=1.0.1')}}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{asset('argonmember/assets/css/docs.min.css')}}" rel="stylesheet">
</head>

<body>
<!-- Navbar -->
@yield('navbar')
<main>
</main>
<footer class="footer has-cards">
    <div class="container">
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    &copy; 2018
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                           class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Core -->
<script src="{{asset('argonmember/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('argonmember/assets/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('argonmember/assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('argonmember/assets/vendor/headroom/headroom.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('argonmember/assets/vendor/onscreen/onscreen.min.js')}}"></script>
<script src="{{asset('argonmember/assets/vendor/nouislider/js/nouislider.min.js')}}"></script>
<script src="{{asset('argonmember/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argonmember/assets/js/argon.js?v=1.0.1')}}"></script>
</body>

</html>