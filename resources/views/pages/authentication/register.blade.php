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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


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
            <a class="navbar-brand" href="{{url('/home')}}">
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
                            <a href="{{url('/home')}}">
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
                        <form action="{{URL::to('/register')}}" role="form" name="regForm" enctype="multipart/form-data"
                              id="regForm" method="post">
                            <div class="alert alert-primary" role="alert">
                                <b>Fields with asterisk (*) are required.</b>
                            </div>
                            <div class="tab">
                                <h3 class="box-title m-t-40">Personal Information</h3>
                                <div class="row">
                                    <div class="col-md-4 required">
                                        <label for="firstname">First Name</label>
                                        <div class="form-group">
                                            <input value="{{ old('firstname') }}" type="text"
                                                   name="firstname" id="firstname"
                                                   class="form-control">
                                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Middle Name</label>
                                        <div class="form-group">
                                            <input value="{{ old('middlename') }}" type="text"
                                                   name="middlename" id="middlename"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 required">
                                        <label>Last Name</label>
                                        <div class="form-group required">
                                            <input value="{{ old('lastname') }}" type="text"
                                                   name="lastname" id="lastname"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 required">
                                        <label class="control-label">Gender</label>
                                        <div class="form-group required">
                                            <select class="form-control custom-select input-default"
                                                    name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Landline Number</label>
                                        <div class="form-group">
                                            <input value="{{ old('landline_number') }}" type="text"
                                                   name="landline_number" id="landline_number" MAXLENGTH="11"
                                                   placeholder="Ex. 6245388 or 025 6245388"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('landline_number') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 required">
                                        <label>Mobile Number</label>
                                        <div class="form-group required">
                                            <input value="{{ old('mobile_number') }}" type="text"
                                                   name="mobile_number" id="mobile_number" MAXLENGTH="12"
                                                   placeholder="Ex. 09214444444"
                                                   class="form-control input-default">
                                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profile Picture</label>
                                        <div class="form-group">
                                            <input value="{{ old('profile_id') }}" type="file"
                                                   name="profile_id" id="file-input"
                                                   class="form-control-file"/>
                                            <div id="thumb-output"></div>
                                            <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>ID Verification</label>
                                        <div class="form-group">
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
                                                <div class="col-md-4 required">
                                                    <label>House/Apartment/Unit No.</label>
                                                    <div class="form-group required">
                                                        <input value="{{ old('unitno') }}" type="text"
                                                               name="unitno" id="unitno"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('unitno') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <label>Building</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('bldg') }}" type="text"
                                                               name="bldg"
                                                               id="bldg"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('bldg') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 required">
                                                    <label>Street</label>
                                                    <div class="form-group required">
                                                        <input value="{{ old('street') }}" type="text"
                                                               name="street" id="street"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('street') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 required">
                                                    <label>City</label>
                                                    <div class="form-group required">
                                                        <input value="{{ old('city') }}" type="text"
                                                               name="city"
                                                               id="city"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 required">
                                                    <label>State/Province</label>
                                                    <div class="form-group required">
                                                        <input value="{{ old('province_id') }}" type="text" name="province" id="province"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('province_id') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 required">
                                                    <label>Country</label>
                                                    <div class="form-group required">
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
                                                    <label>House/Apartment/Unit No.</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('tunitno') }}" type="text"
                                                               name="tunitno" id="tunitno"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tunitno') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Building</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('tbldg') }}" type="text"
                                                               name="tbldg" id="tbldg"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tbldg') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Street</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('tstreet') }}" type="text"
                                                               name="tstreet" id="tstreet"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tstreet') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>City</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('tcity') }}" type="text"
                                                               name="tcity" id="tcity"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tcity') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>State/Province</label>
                                                    <div class="form-group">
                                                        <input value="{{ old('tprovince') }}" type="text" name="tprovince" id="tprovince"
                                                               class="form-control input-default">
                                                        <span class="text-danger">{{ $errors->first('tprovince') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Country</label>
                                                    <div class="form-group">
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
                                            <label>First Name</label>
                                            <div class="form-group">
                                                <input value="{{ old('pwaFirstName') }}" type="text"
                                                       name="pwaFirstName" id="pwaFirstName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaFirstName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Middle Name</label>
                                            <div class="form-group">
                                                <input value="{{ old('pwaMiddleName') }}" type="text"
                                                       name="pwaMiddleName" id="pwaMiddleName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaMiddleName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Last Name</label>
                                            <div class="form-group">
                                                <input value="{{ old('pwaLastName') }}" type="text"
                                                       name="pwaLastName" id="pwaLastName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaLastName') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label">Gender</label>
                                            <div class="form-group">
                                                <select class="form-control custom-select input-default"
                                                        name="pwaGender" id="pwaGender">
                                                    <option value="">Select Gender</option>
                                                    <option value="1" {{ old('pwaGender') == 1 ? 'selected' : '' }}>
                                                        Male
                                                    </option>
                                                    <option value="2" {{ old('pwaGender') == 2 ? 'selected' : '' }}>
                                                        Female
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('pwaGender') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Relationship to PWA</label>
                                            <div class="form-group">
                                                <input value="{{ old('pwaRelationship') }}" type="text"
                                                       name="pwaRelationship" id="pwaRelationship"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaRelationship') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Occupation</label>
                                            <div class="form-group">
                                                <input value="{{ old('pwaOccupation') }}"
                                                       name="pwaOccupation"
                                                       id="pwaOccupation" type="text"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('pwaOccupation') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Number of Siblings</label>
                                            <div class="form-group">
                                                <input value="{{ old('siblingcount') }}"
                                                       name="siblingcount"
                                                       id="siblingcount" type="number"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('siblingcount') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>With Intervention</label>
                                            <div class="form-group">
                                                <select class="form-control custom-select input-default"
                                                        name="withintervention" id="withintervention">
                                                    <option value="">Select Option</option>
                                                    <option value="1" {{ old('withintervention') == 1 ? 'selected' : '' }}>
                                                        Yes
                                                    </option>
                                                    <option value="2" {{ old('withintervention') == 2 ? 'selected' : '' }}>
                                                        No
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('withintervention') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">About the Employer</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Employer's Name</label>
                                            <div class="form-group">
                                                <input value="{{ old('employerName') }}" type="text"
                                                       name="employerName" id="employerName"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('employerName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Contact Number</label>
                                            <div class="form-group">
                                                <input value="{{ old('employerContactNumber') }}"
                                                       type="text"
                                                       name="employerContactNumber"
                                                       id="employerContactNumber" MAXLENGTH="11"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('employerContactNumber') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>House/Apartment/Unit No.</label>
                                            <div class="form-group">
                                                <input value="{{ old('eunitno') }}" type="text"
                                                       name="eunitno"
                                                       id="eunitno"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('eunitno') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Building</label>
                                            <div class="form-group">
                                                <input value="{{ old('ebldg') }}" type="text" name="ebldg"
                                                       id="ebldg"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('ebldg') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Street</label>
                                            <div class="form-group">
                                                <input value="{{ old('estreet') }}" type="text"
                                                       name="estreet"
                                                       id="estreet"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('estreet') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <div class="form-group">
                                                <input value="{{ old('ecity') }}" type="text" name="ecity"
                                                       id="ecity"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('ecity') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>State/Province</label>
                                            <div class="form-group">
                                                <input value="{{ old('eprovince') }}" type="text" name="eprovince" id="eprovince"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('eprovince') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Country</label>
                                            <div class="form-group">
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
                                        <div class="col-md-6 required">
                                            <label>Email Address</label>
                                            <div class="form-group required">
                                                <input value="{{ old('email') }}" type="email"
                                                       name="email" id="email"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 required">
                                            <label>Password</label>
                                            <div class="form-group required">
                                                <input value="{{ old('password') }}" type="password"
                                                       name="password" id="password"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 required">
                                            <label>Confirm Password</label>
                                            <div class="form-group required">
                                                <input value="{{ old('password_confirmation') }}" type="password"
                                                       name="password_confirmation" id="password_confirmation"
                                                       class="form-control input-default">
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input class="custom-control-input" name="terms" id="terms"
                                                           type="checkbox"
                                                           value="true" {{ !old('terms') ?: 'checked' }}>
                                                    <label class="custom-control-label" for="terms">
                                                        <span>I have read and agreed to the <a data-toggle="modal"
                                                                                               data-target="#status-form"
                                                                                               class="text-primary">Terms and Conditions</a>.</span>
                                                    </label>
                                                </div>
                                                <span class="text-danger">{{ $errors->first('terms') }}</span>
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
                            <div class="modal fade" id="status-form"
                                 role="dialog"
                                 aria-labelledby="status-form" aria-hidden="true">
                                <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body mt-2">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-4 order-lg-2">
                                                            <h2 class="modal-title" id="exampleModalLabel">Terms and
                                                                Conditions</h2>
                                                        </div>
                                                    </div>
                                                    <div class="card-body pt-0 pt-md-4">
                                                        <div class="pl-lg-4">
                                                            <b>Last updated: October 26, 2018</b><br><br>
                                                            Please read these Terms and Conditions ("Terms", "Terms and
                                                            Conditions") carefully before using the
                                                            https://isproj2b.benilde.edu.ph/aaap website (the "Service")
                                                            operated by AAAP Today ("us", "we", or "our").
                                                            Your access to and use of the Service is conditioned on your
                                                            acceptance of and compliance with these Terms. These Terms
                                                            apply to all visitors, users and others who access or use
                                                            the Service.<br>
                                                            By accessing or using the Service you agree to be bound by
                                                            these Terms. If you disagree with any part of the terms then
                                                            you may not access the Service. This Terms and Conditions
                                                            agreement for AAAP Today is managed by <a
                                                                    href="https://termsfeed.com/terms-conditions/generator/">the
                                                                Terms and Conditions Generator</a>.
                                                            <br><br><b>Accounts</b><br>
                                                            When you create an account with us, you must provide us
                                                            information that is accurate, complete, and current at all
                                                            times. Failure to do so constitutes a breach of the Terms,
                                                            which may result in immediate termination of your account on
                                                            our Service.
                                                            You are responsible for safeguarding the password that you
                                                            use to access the Service and for any activities or actions
                                                            under your password, whether your password is with our
                                                            Service or a third-party service.
                                                            You agree not to disclose your password to any third party.
                                                            You must notify us immediately upon becoming aware of any
                                                            breach of security or unauthorized use of your account.
                                                            <br><br><b>Links To Other Web Sites</b><br>
                                                            Our Service may contain links to third-party web sites or
                                                            services that are not owned or controlled by AAAP Today.
                                                            AAAP Today has no control over, and assumes no
                                                            responsibility for, the content, privacy policies, or
                                                            practices of any third party web sites or services. You
                                                            further acknowledge and agree that AAAP Today shall not be
                                                            responsible or liable, directly or indirectly, for any
                                                            damage or loss caused or alleged to be caused by or in
                                                            connection with use of or reliance on any such content,
                                                            goods or services available on or through any such web sites
                                                            or services.
                                                            We strongly advise you to read the terms and conditions and
                                                            privacy policies of any third-party web sites or services
                                                            that you visit.
                                                            <br><br><b>Termination</b><br>
                                                            We may terminate or suspend access to our Service
                                                            immediately, without prior notice or liability, for any
                                                            reason whatsoever, including without limitation if you
                                                            breach the Terms.
                                                            All provisions of the Terms which by their nature should
                                                            survive termination shall survive termination, including,
                                                            without limitation, ownership provisions, warranty
                                                            disclaimers, indemnity and limitations of liability.
                                                            We may terminate or suspend your account immediately,
                                                            without prior notice or liability, for any reason
                                                            whatsoever, including without limitation if you breach the
                                                            Terms.
                                                            Upon termination, your right to use the Service will
                                                            immediately cease. If you wish to terminate your account,
                                                            you may simply discontinue using the Service.
                                                            All provisions of the Terms which by their nature should
                                                            survive termination shall survive termination, including,
                                                            without limitation, ownership provisions, warranty
                                                            disclaimers, indemnity and limitations of liability.
                                                            <br><br><b>Governing Law</b><br>
                                                            These Terms shall be governed and construed in accordance
                                                            with the laws of Philippines, without regard to its conflict
                                                            of law provisions.
                                                            Our failure to enforce any right or provision of these Terms
                                                            will not be considered a waiver of those rights. If any
                                                            provision of these Terms is held to be invalid or
                                                            unenforceable by a court, the remaining provisions of these
                                                            Terms will remain in effect. These Terms constitute the
                                                            entire agreement between us regarding our Service, and
                                                            supersede and replace any prior agreements we might have
                                                            between us regarding the Service.
                                                            <br><br><b>Changes</b><br>
                                                            We reserve the right, at our sole discretion, to modify or
                                                            replace these Terms at any time. If a revision is material
                                                            we will try to provide at least 30 days notice prior to any
                                                            new terms taking effect. What constitutes a material change
                                                            will be determined at our sole discretion.
                                                            By continuing to access or use our Service after those
                                                            revisions become effective, you agree to be bound by the
                                                            revised terms. If you do not agree to the new terms, please
                                                            stop using the Service.
                                                            <br><br><b>Contact Us</b><br>
                                                            If you have any questions about these Terms, please contact
                                                            us. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js')}}"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\RegisterFormRequest', '#regForm'); !!}


<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')

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
        var x, y, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        if ($('#regForm').valid()) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
            return valid;
        } else {
            y.className += "invalid"
        }
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
                                var img = $('<img/>').addClass('img-fluid').attr('src', e.target.result); //create image element
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
                                var img = $('<img/>').addClass('img-fluid').attr('src', e.target.result); //create image element
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




