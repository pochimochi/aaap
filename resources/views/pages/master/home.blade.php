<html>


@include('layouts.master.header')
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="codrops-header__title js-scroll-trigger" href="#page-top">AAAP TODAY</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contents">Contents</a>
                </li>
                @if(!session()->exists('user'))
                    <li class="nav-item">
                        <a class="btn btn-outline" href="{{URL::to('/login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{URL::to('/register')}}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline" href="{{URL::to('/logout')}}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">
    <div class="morph-wrap">
        <svg class="morph" width="1400" height="770" viewBox="0 0 1400 770">
            <path d="M 262.9,252.2 C 210.1,338.2 212.6,487.6 288.8,553.9 372.2,626.5 511.2,517.8 620.3,536.3 750.6,558.4 860.3,723 987.3,686.5 1089,657.3 1168,534.7 1173,429.2 1178,313.7 1096,189.1 995.1,130.7 852.1,47.07 658.8,78.95 498.1,119.2 410.7,141.1 322.6,154.8 262.9,252.2 Z"/>
        </svg>
    </div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-auto codrops-header__title">Association for Adults with Autism Philippines</h1>
                    <a href="{{URL::to('/register')}}" class="btn btn-outline btn-xl js-scroll-trigger">Become a
                        Member!</a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="about bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading">WHO WE ARE</h2>
                <br>
                <p>The Association for Adults with Autism, Philippines is an organization established by parents of
                    individuals within the Autism Spectrum Disorder (ASD). The organization aims to provide sustained
                    enrichment opportunities and long-term care to individuals on the spectrum. It will provide means to
                    achieve personal growth, social interaction, and a cooperative life among their peers. AAAP is
                    registered with the Philippine Securities and Exchange Commission as a non-stock, non-profit
                    corporation.</p>
            </div>
        </div>
    </div>
</section>
<div class="shape" data-negative="false">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
        <path fill="#282faf" class="elementor-shape-fill" opacity="0.33"
              d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
        <path fill="#282faf" class="elementor-shape-fill" opacity="0.66"
              d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
        <path fill="#282faf" class="elementor-shape-fill"
              d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
    </svg>
</div>

<section class="contact" id="contact">
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="login-content card">
                        <div class="login-form">
                            <div class="row">
                                <div class=col-md-5>
                                    <div id="map"></div>
                                </div>
                                <div class="col-md-3">
                                    <h3>Contact Us</h3>
                                    <p>We would like to hear from you.</p>
                                    <label><i class="fa fa-map-marker"></i> 102 New Road, New City</label>
                                    <label><i class="fa fa-phone"></i> 001 2045 509</label>
                                    <label><i class="fa fa-globe"></i> www.aaaptoday.com</label>
                                    <div class="center aligned">
                                        <button class="fa fa-car"></button>
                                        <button class="fa fa-envelope"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var myCenter = new google.maps.LatLng(51.308742, -0.320850);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

{{--<section class="contact bg-primary" id="contact">--}}
{{--<div class="container">--}}
{{--<h2>We--}}
{{--<i class="fas fa-heart"></i>--}}
{{--new friends!</h2>--}}
{{--<ul class="list-inline list-social">--}}
{{--<li class="list-inline-item social-twitter">--}}
{{--<a href="#">--}}
{{--<i class="fab fa-twitter"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="list-inline-item social-facebook">--}}
{{--<a href="#">--}}
{{--<i class="fab fa-facebook-f"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="list-inline-item social-google-plus">--}}
{{--<a href="#">--}}
{{--<i class="fab fa-google-plus-g"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</section>--}}

<footer>
    <div class="container">
        <p>&copy; AAAP Today 2018. All Rights Reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">Privacy</a>
            </li>
            <li class="list-inline-item">
                <a href="#">Terms</a>
            </li>
            <li class="list-inline-item">
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
</footer>

@include('layouts.master.footer')
</body>
</html>



