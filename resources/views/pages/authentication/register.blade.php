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
    <style>
        #regForm {

        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }
    </style>
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
                                    data-target="#navbar-collapse-main" aria-controls="sidenav-main"
                                    aria-expanded="false"
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
                    <div class="col">
                        <h1 class="display-3  text-white">Register now
                            <span>and become a member of AAAP!</span>
                        </h1>
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
    <div class="container-fluid mt--200 pb--5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card bg-secondary shadow-lg border-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        <form action="{{URL::to('/register')}}" name="regForm" enctype="multipart/form-data"
                              id="regForm" method="post">
                            <div class="tab">
                                <h3 class="box-title m-t-40">Personal Information</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input value="{{ old('firstname') }}" type="text"
                                                   name="firstname" id="firstname"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input value="{{ old('middlename') }}" type="text"
                                                   name="middlename" id="middlename"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input value="{{ old('lastname') }}" type="text"
                                                   name="lastname" id="lastname"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Gender</label>
                                            <select class="form-control custom-select input-default"
                                                    name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="1" @if(old('gender') == 1) selected @endif>Male
                                                </option>
                                                <option value="0" @if(old('gender') == 0) selected @endif>
                                                    Female
                                                </option>

                                            </select>
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Landline Number</label>
                                            <input value="{{ old('landline_number') }}" type="text"
                                                   name="landlineNumber" id="landlineNumber"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('landline_number') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input value="{{ old('mobile_number') }}" type="text"
                                                   name="mobileNumber" id="mobileNumber"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profile Picture</label>
                                            <input value="{{ old('profile_id') }}" type="file"
                                                   name="profile_id" id="file-input"
                                                   class="form-control-file"/>
                                            <div id="thumb-output"></div>
                                            <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ID Verification</label>
                                            <input value="{{ old('idverification_id') }}" type="file"
                                                   name="idverification_id" id="id-input"
                                                   class="form-control-file"/>
                                            <div id="thumb1-output"></div>
                                            <span class="text-danger">{{ $errors->first('idverification_id') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Permanent Address</h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Unit Number</label>
                                                        <input value="{{ old('unitno') }}" type="text"
                                                               name="unitno" id="unitno"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('unitno') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Building</label>
                                                        <input value="{{ old('bldg') }}" type="text"
                                                               name="bldg"
                                                               id="bldg"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('bldg') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input value="{{ old('street') }}" type="text"
                                                               name="street" id="street"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('street') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input value="{{ old('city') }}" type="text"
                                                               name="city"
                                                               id="city"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control custom-select input-default"
                                                                name="country_id" id="country_id">
                                                            <option value="">Select Country</option>
                                                            @foreach($country as $countries)
                                                                <option value="{{$countries->id}}"
                                                                        @if(old('country_id') == $countries->id)
                                                                        selected @endif>{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Temporary Address</h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Unit Number</label>
                                                        <input value="{{ old('tunitno') }}" type="text"
                                                               name="tunitno" id="tunitno"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tunitno') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Building</label>
                                                        <input value="{{ old('tbldg') }}" type="text"
                                                               name="tbldg" id="tbldg"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tbldg') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input value="{{ old('tstreet') }}" type="text"
                                                               name="tstreet" id="tstreet"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tstreet') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input value="{{ old('tcity') }}" type="text"
                                                               name="tcity" id="tcity"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tcity') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control custom-select input-default"
                                                                name="tcountry" id="tcountry">
                                                            <option value="">Select Country</option>
                                                            @foreach($country as $countries)
                                                                <option value="{{$countries->id}}"
                                                                        @if(old('tcountry') == $countries->id)
                                                                        selected @endif>{{$countries->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{ $errors->first('tcountry') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">Person with Autism Information</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input value="{{ old('pwaFirstName') }}" type="text"
                                                       name="pwaFirstName" id="pwaFirstName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaFirstName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input value="{{ old('pwaMiddleName') }}" type="text"
                                                       name="pwaMiddleName" id="pwaMiddleName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaMiddleName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input value="{{ old('pwaLastName') }}" type="text"
                                                       name="pwaLastName" id="pwaLastName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaLastName') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Gender</label>
                                                <select class="form-control custom-select input-default"
                                                        name="pwaGender" id="pwaGender">
                                                    <option value="">Select Gender</option>
                                                    <option value="1" @if(old('gender') == 1) selected @endif>Male
                                                    </option>
                                                    <option value="0" @if(old('gender') == 0) selected @endif>
                                                        Female
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('pwaGender') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relationship to PWA</label>
                                                <input value="{{ old('pwaRelationship') }}" type="text"
                                                       name="pwaRelationship" id="pwaRelationship"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaRelationship') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Occupation</label>
                                                <input value="{{ old('pwaOccupation') }}"
                                                       name="pwaOccupation"
                                                       id="pwaOccupation" type="text"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaOccupation') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">About the Employer</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employer's Name</label>
                                                <input value="{{ old('employerName') }}" type="text"
                                                       name="employerName" id="employerName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('employerName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input value="{{ old('employerContactNumber') }}"
                                                       type="text"
                                                       name="employerContactNumber"
                                                       id="employerContactNumber"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('employerContactNumber') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Number</label>
                                                <input value="{{ old('eunitno') }}" type="text"
                                                       name="eunitno"
                                                       id="eunitno"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('eunitno') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Building</label>
                                                <input value="{{ old('ebldg') }}" type="text" name="ebldg"
                                                       id="ebldg"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('ebldg') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input value="{{ old('estreet') }}" type="text"
                                                       name="estreet"
                                                       id="estreet"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('estreet') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input value="{{ old('ecity') }}" type="text" name="ecity"
                                                       id="ecity"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('ecity') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="ecountry" id="ecountry"
                                                        class="form-control custom-select input-default">
                                                    <option value="">Select Country</option>
                                                    @foreach($country as $countries)
                                                        <option value="{{$countries->id}}"
                                                                @if(old('ecountry') == $countries->id)
                                                                selected @endif>{{$countries->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('ecountry') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">Login Credentials</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input value="{{ old('email') }}" type="email"
                                                       name="email" id="email"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input value="{{ old('password') }}" type="password"
                                                       name="password" id="password"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" align="center"
                                         data-sitekey="6Lfj6XAUAAAAAP9Mkg2ajxaSAZy0LaV-TS_BcnlK" style="display: block">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-block btn-rounded" id="prevBtn"
                                            onclick="nextPrev(-1)">Previous
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-block btn-rounded" id="nextBtn"
                                            onclick="nextPrev(1)">Next
                                    </button>
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div class="col-lg-12">
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{URL::to('/login')}}"> Sign in</a></p>
                        </div>

                        </form>
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
                    <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"><img
                                src="{{asset('images/logos/logowhite.png')}}" width="200" class="navbar-brand-img"
                                alt="..."></a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
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
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                           class="nav-link" target="_blank">MIT License</a>
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
<script type="text/javascript">
    $('table').DataTable({
        /* "dom": '<"container"<"card"<"table-responsive"<lf<t>ip>>>>',*/
        "pagingType": "numbers",
        responsive: true

    });
</script>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function validateForm() {
        return true;
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>

<script>
    $(document).ready(function () {
        $('#file-input').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                $('#thumb-output').html(''); //clear html of output element
                var data = $(this)[0].files; //this file data
                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#thumb-output').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
    $(document).ready(function () {
        $('#id-input').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                $('#thumb1-output').html(''); //clear html of output element
                var data = $(this)[0].files; //this file data
                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                $('#thumb1-output').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
</body>
</html>




