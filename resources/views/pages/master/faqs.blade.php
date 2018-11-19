@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <section class="section pb-0 bg-gradient-green">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-md-6 order-lg-2 ml-lg-auto">
                    <div class="position-relative pl-md-5">
                        <img src="{{asset('argonmember/assets/img/brand/community.svg')}}" class="img-center img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="d-flex px-3">
                        <div>
                            <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-success">
                                <i class="ni ni-bullet-list-67 text-success"></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <h4 class="display-3 text-white">Frequently Asked Questions</h4>
                        </div>
                    </div>
                    <div class="card shadow shadow-lg--hover mt-5">
                        <div class="card-body">
                            <div class="row" style="overflow-wrap:break-word">

                                <div class="col-lg-2 col-md-12 col-sm-12">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-satisfied"></i>
                                    </div>
                                </div>


                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <h5 class="title text-success">How can I become a member of Association for Adults
                                        with Autism, Philippines?</h5>
                                    <ul class="list-unstyled mt-5">
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-ruler-pencil"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Fill out the registration form.</h6>
                                                    <a href="{{URL::to('/register')}}" class="btn-sm btn-success">Register
                                                        Here</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-money-coins"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Deposit the <b>₱500.00</b> membership fee to
                                                        Association for Adults with Autism Philippines (Bank of the
                                                        Philippine Island c/a #0401.0099.49)</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-email-83"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Write your name on the deposit slip and send
                                                        scanned copy to <b>aspecialplace.alfonso@gmail.com</b>.</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="mb-0">After completing these steps you are now considered
                                                        as an official member of AAAP.</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card shadow shadow-lg--hover mt-5">
                        <div class="card-body">
                            <div class="d-flex px-3">
                                <div>
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-building"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h5 class="title text-success">What is "A Special Place?"</h5>
                                    <ul class="list-unstyled mt-5">
                                        <li class="py-2">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="badge badge-circle badge-success mr-3">
                                                        <i class="ni ni-bulb-61"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">It is a project of AAAP and it is a residential
                                                        community for adults with autism and related conditions.</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
@endsection
