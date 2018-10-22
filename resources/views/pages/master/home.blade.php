@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <div class="position-relative">
        <!-- Hero for FREE version -->
        <section class="section section-lg section-hero section-shaped">
            <!-- Background circles -->
            <div class="shape shape-style-1 shape-default">
                <span class="span-150"></span>
                <span class="span-50"></span>
                <span class="span-50"></span>
                <span class="span-75"></span>
                <span class="span-100"></span>
                <span class="span-75"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
                <span class="span-50"></span>
                <span class="span-100"></span>
            </div>
            <div class="container hero-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 mx-lg-auto">
                        <div class="text-center text-lg-left">
                            <h1 class="display-3  text-white">
                                @if(session('user') && Auth::user()) Welcome to the @else Join @endif Association for
                                Adults
                                with Autism, Philippines.
                            </h1>
                            <div class="md-space"></div>
                            @if(!session('user') || !Auth::user())
                                <a href="{{URL::to('/register')}}"
                                   class="btn btn-lg btn-success mt-4 mb-3 mb-sm-0">
                                    <span class="btn-inner--text">Become a Member</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 mt-5 mt-lg-0">
                        <img src="{{asset('argonmember/assets/img/brand/ordinaryday.svg')}}" class="img-fluid"
                             alt="Browser Image">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="section section-components pb-0" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h2 class="display-3">About Us
                    </h2>
                    <div>
                        <p class="lead text-muted">
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
            </div>
        </div>
    </section>
    <section class="section features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-12 justify-content-center">
                            <div class="text-center text-lg-left">
                                <h3 class="h4 text-success font-weight-bold mb-4">GET INVOLVED</h3>
                                <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                    <div class="row align-items-center">
                                        <div class="col-4 bg-secondary text-center rounded">
                                            <img src="{{asset('argonmember/assets/img/brand/donate.svg')}}"
                                                 class="img-fluid w-50 py-2"
                                                 alt="features">
                                        </div>
                                        <div class="col-8">
                                            <h4 class="display-4 mb-0">DONATE</h4>
                                            <p class="lead">
                                                Make your deposit at any Bank of the Philippine Island branch or
                                                on-line. Account Number 0401.0099.49. A method of on-line donations
                                                will be available shortly.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center text-lg-left">
                                <h2 class="lg-font-size font-weight__700">
                                </h2>
                                <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                    <div class="row align-items-center">
                                        <div class="col-4 bg-secondary text-center rounded">
                                            <img src="{{asset('argonmember/assets/img/brand/workers.svg')}}"
                                                 class="img-fluid w-50 py-2"
                                                 alt="features">
                                        </div>
                                        <div class="col-8">
                                            <h4 class="display-4 mb-0">HELP</h4>
                                            <p class="lead">
                                                Send us an email at adultautismphil@gmail.com. Include your contact
                                                details and a short introduction, and one of our members will be in
                                                touch.
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
    <section class="section section-lg section-shaped" id="contact">
        <div class="shape shape-style-1 shape-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container py-md">
            <div class="row row-grid justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h3 class="display-3 text-white">Contact Us
                        <h4 class="text-white">Reach us through the following contact details</h4>
                    </h3>
                    <div class="card shadow shadow-lg--hover mt-5">
                        <div class="card-body">
                            <div class="d-flex px-3">
                                <div>
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-map-big"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">Location</h5>
                                    <p>51-A West Capitol Drive, Kapitolyo
                                        Pasig City, Manila</p>
                                </div>
                            </div>
                            <div class="d-flex px-3">
                                <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                    <i class="ni ni-mobile-button"></i>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">Mobile Number</h5>
                                    <p>+1 63 917 881 2836</p>
                                </div>
                            </div>
                            <div class="d-flex px-3">
                                <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                    <i class="ni ni-email-83"></i>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">Email Address</h5>
                                    <p>adultautismphil@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex px-3">
                                <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                    <i class="fa fa-facebook-f"></i>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">Facebook</h5>
                                    <p> Association for Adults with Autism Philippines</p>
                                    <a href="https://www.facebook.com/AdultAutismPhil/" class="btn-sm btn-success">Visit
                                        Facebook Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
@endsection