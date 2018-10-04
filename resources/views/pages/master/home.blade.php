@extends('layouts.member.layout')
@section('content')

    <div class="cover">
    @include('layouts.member.header')
    <!-- Hero -->
        <div class="jumbotron jumbotron-fluid bg-transparent font-weight__500 hero mb-0 pt-3">
            <!-- Empty Space -->
            <div class="lg-space"></div>
            <!--/ End Empty Space -->
            <div class="container hero-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 mx-lg-auto">
                        <div class="text-center text-lg-left">
                            <h1 class="xxl-font-size font-weight__700 text-black">
                                Join Association for Adults with Autism, Philippines.
                            </h1>
                            <div class="md-space"></div>
                            <a href="#" class="btn btn-primary btn-rounded base-plus-font-size py-3 px-5">Be a
                                Member Today!</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 mt-5 mt-lg-0">
                        <img src="{{asset('')}}assetsuser/images/hero-image.svg" class="img-fluid" alt="Browser Image">
                    </div>
                </div>
                <!-- Empty Space -->
                <div class="lg-space"></div>
            </div>
        </div>

    </div>
    <!--/ End Hero -->
    <!-- Features Grid -->
    <section id="about">
        <div class="section feature-grid bg-light">
            <!-- Empty Space -->
            <div class="lg-space"></div>
            <!--/ End Empty Space -->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 text-center text-lg-left">
                        <h2 class="lg-font-size font-weight__700">ABOUT US</h2>
                        <p class="lead">
                            The Association for Adults with Autism, Philippines is an organization established by
                            parents of
                            individuals within the Autism Spectrum Disorder (ASD). The organization aims to provide
                            sustained enrichment opportunities and long-term care to individuals on the spectrum. It
                            will
                            provide means to achieve personal growth, social interaction, and a cooperative life among
                            their
                            peers. AAAP is registered with the Philippine Securities and Exchange Commission as a
                            non-stock,
                            non-profit corporation.
                        </p>
                    </div>
                </div>
                <!-- Enpty Space -->
                <div class="lg-space"></div>
                <!--/ End Empty Space -->
                <div class="row">
                    <div class="col-10 mx-auto col-md-4">
                        <div class="my-3 box box-shadow">
                            <div class="row align-items-center text-md-center text-lg-left">
                                <div class="col-12 col-sm-3 col-md-12 col-xl-4 text-center px-0">
                                    <div class="icon-wrap text-primary my-3">
                                        <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-calendar"></i>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-9 col-md-12 col-xl-8 mt-3 mt-lg-0">
                                    <h3 class="base-plus-font-size font-weight__500">
                                        Events
                                    </h3>
                                    <!-- Empty Space -->
                                    <div class="sm-sapce"></div>
                                    <!--/ End Empty Space -->
                                    <p class="lead sm-font-size text-dark-gray mb-0">
                                        Find out our latest events and join us!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto col-md-4">
                        <div class="my-3 box box-shadow">
                            <div class="row align-items-center text-md-center text-lg-left">
                                <div class="col-12 col-sm-3 col-md-12 col-xl-4 text-center px-0">
                                    <div class="icon-wrap text-primary my-3">
                                        <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-bullhorn"></i>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-9 col-md-12 col-xl-8 mt-3 mt-lg-0">
                                    <h3 class="base-plus-font-size font-weight__500">
                                        Announcements
                                    </h3>
                                    <!-- Empty Space -->
                                    <div class="sm-sapce"></div>
                                    <!--/ End Empty Space -->
                                    <p class="lead sm-font-size text-dark-gray mb-0">
                                        Keep up with our latest announcements!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto col-md-4">
                        <div class="my-3 box box-shadow">
                            <div class="row align-items-center text-md-center text-lg-left">
                                <div class="col-12 col-sm-3 col-md-12 col-xl-4 text-center px-0">
                                    <div class="icon-wrap text-primary my-3">
                                        <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-9 col-md-12 col-xl-8 mt-3 mt-lg-0">
                                    <h3 class="base-plus-font-size font-weight__500">
                                        Articles
                                    </h3>
                                    <!-- Empty Space -->
                                    <div class="sm-sapce"></div>
                                    <!--/ End Empty Space -->
                                    <p class="lead sm-font-size text-dark-gray mb-0">
                                        Read our articles regarding ASD.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Empty Space -->
            <div class="lg-space"></div>
            <!--/ End Empty Space -->
        </div>
    </section>
    <section class="section features">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-12 justify-content-center">
                            <div class="text-center text-lg-left">
                                <h2 class="lg-font-size font-weight__700">
                                    Get Involved
                                </h2>
                                <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                    <a href="#">
                                        <div class="row align-items-center">
                                            <div class="col-4 bg-secondary text-center rounded">
                                                <img src="assetsuser/images/feature-2-small.svg"
                                                     class="img-fluid w-50 py-2"
                                                     alt="features">
                                            </div>
                                            <div class="col-8">
                                                <h3 class="sm-font-size text-primary font-weight__500">Donate</h3>
                                                <p class="lead xs-font-size m-0 text-gray">
                                                    Make your deposit at any Bank of the Philippine Island branch or
                                                    on-line. Account Number 0401.0099.49. A method of on-line donations
                                                    will be available shortly.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--/ End Small Feature Box -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-5 ml-lg-auto order-lg-2">
                            <div class="text-center text-lg-left">
                                <h2 class="lg-font-size font-weight__700">
                                </h2>
                                <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                    <a href="#">
                                        <div class="row align-items-center">
                                            <div class="col-4 bg-secondary text-center rounded">
                                                <img src="assetsuser/images/feature-grid-2.svg"
                                                     class="img-fluid w-50 py-2"
                                                     alt="features">
                                            </div>
                                            <div class="col-8">
                                                <h3 class="sm-font-size text-primary font-weight__500">Help</h3>
                                                <p class="lead xs-font-size m-0 text-gray">
                                                    Send us an email at adultautismphil@gmail.com. Include your contact
                                                    details and a short introduction, and one of our members will be in
                                                    touch.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="CTA section bg-light" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="text-center text-lg-left mb-3 mb-lg-0">
                                <h2 class="md-font-size font-weight__700">
                                    Contact Us
                                </h2>
                                <div class="my-3 box box-shadow">
                                    <div class="row align-items-center text-md-center text-lg-left">
                                        <div class="col-3 text-center col-md-12 col-lg-4 px-0">
                                            <div class="icon-wrap text-white my-3">
                                                <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-map-marker-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-md-12 col-lg-8">
                                            <h3 class="base-plus-font-size">
                                                Location
                                            </h3>
                                            <p class="lead sm-font-size text-gray mb-0">
                                                51-A West Capitol Drive, Kapitolyo
                                                Pasig City, Manila
                                            </p>
                                        </div>
                                        <div class="col-3 col-md-12 text-center col-lg-4 px-0">
                                            <div class="icon-wrap text-white my-3">
                                                <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-mobile"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-md-12 col-lg-8">
                                            <h3 class="base-plus-font-size">
                                                Mobile Number
                                            </h3>
                                            <p class="lead sm-font-size text-gray mb-0">
                                                +1 63 917 881 2836
                                            </p>
                                        </div>
                                        <div class="col-3 col-md-12 text-center col-lg-4 px-0">
                                            <div class="icon-wrap text-white my-3">
                                                <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-md-12 col-lg-8">
                                            <h3 class="base-plus-font-size">
                                                Email Address
                                            </h3>
                                            <p class="lead sm-font-size text-gray mb-0">
                                                adultautismphil@gmail.com
                                            </p>
                                        </div>
                                        <div class="col-3 col-md-12 text-center col-lg-4 px-0">
                                            <div class="icon-wrap text-white my-3">
                                                <i class="icon p-4 bg-secondary text-primary md-font-size rounded-circle fab fa-facebook-square"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-md-12 col-lg-8">
                                            <h3 class="base-plus-font-size">
                                                Facebook
                                            </h3>
                                            <p class="lead sm-font-size text-gray mb-0">
                                                Association for Adults with Autism Philippines
                                            </p>
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
@endsection