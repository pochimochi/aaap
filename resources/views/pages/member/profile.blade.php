@extends('layouts.member.layout')
@section('navbar')
    @include('layouts.member.header')
    <main class="profile-page">
        <section class="section-profile-cover section-shaped my-0">
            <div class="shape shape-style-1 shape-primary alpha-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="card card-profile shadow mt--300">
                    <div class="px-4">
                        <div class="row justify-content-center pb-3">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    @if($users->profilepic)
                                        <img src="{{asset('/storage/'.$users->profilepic->location)}}"
                                             class="rounded-circle" width="180" height="180"
                                             style="background-color: white;object-fit: scale-down" alt="">

                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                <div class="card-profile-actions py-4 mt-lg-0">
                                    <a href="#" class="btn btn-sm btn-info mr-4">Edit Profile</a>
                                    <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">

                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h3>{{$users['firstname'].' '.$users['lastname']}}
                            </h3>
                        </div>
                        <div class="container">
                            <div class="box box-shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="nav nav-tabs customtab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                                        href="#profile" role="tab"><span
                                                                class="hidden-sm-up"><i class="ti-home"></i></span>
                                                        <span class="hidden-xs-down">User Information</span></a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                                        href="#address" role="tab"><span
                                                                class="hidden-sm-up"><i class="ti-user"></i></span>
                                                        <span class="hidden-xs-down">Address</span></a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pwa"
                                                                        role="tab"><span class="hidden-sm-up"><i
                                                                    class="ti-user"></i></span>
                                                        <span class="hidden-xs-down">Person with Autism Information</span></a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                                        href="#credentials" role="tab"><span
                                                                class="hidden-sm-up"><i class="ti-email"></i></span>
                                                        <span class="hidden-xs-down">Credentials</span></a></li>
                                            </ul>
                                            <form class="form" action="{{URL::to('/')}}" method="post"
                                                  id="registrationForm">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="profile">
                                                        <br>
                                                        <h6 class="heading-small text-success mb-4">PERSONAL
                                                            INFORMATION</h6>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input value="{{ $users['firstname'] }}" type="text"
                                                                           name="firstname" id="firstname"
                                                                           class="form-control input-default">
                                                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Middle Name</label>
                                                                    <input value="{{ $users['middlename'] }}"
                                                                           type="text"
                                                                           name="middlename" id="middlename"
                                                                           class="form-control input-default">
                                                                    <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input value="{{ $users['lastname'] }}" type="text"
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
                                                                        <option value="1" {{ $users->gender == 1 ? 'selected' : '' }}>
                                                                            Male
                                                                        </option>
                                                                        <option value="2" {{ $users->gender == 2 ? 'selected' : '' }}>
                                                                            Female
                                                                        </option>
                                                                    </select>
                                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Landline Number</label>
                                                                    <input value="{{ $users->contact->landline_number }}"
                                                                           type="text"
                                                                           name="landline_number" id="landline_number"
                                                                           class="form-control input-default">
                                                                    <span class="text-danger">{{ $errors->first('landline_number') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Mobile Number</label>
                                                                    <input value="{{ $users->contact->mobile_number }}"
                                                                           type="text" name="mobile_number"
                                                                           id="mobile_number"
                                                                           class="form-control input-default">
                                                                    <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="address">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <br>
                                                                <h6 class="heading-small text-success mb-4">PERMANENT
                                                                    ADDRESS</h6>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Unit Number</label>
                                                                            <input value="{{ $users->permanentaddress->unitno }}"
                                                                                   type="text" name="unitno" id="unitno"
                                                                                   class="form-control input-default">
                                                                            <span class="text-danger">{{ $errors->first('unitno') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Building</label>
                                                                            <input value="{{ $users->permanentaddress->bldg }}"
                                                                                   type="text" name="bldg" id="bldg"
                                                                                   class="form-control input-default">
                                                                            <span class="text-danger">{{ $errors->first('bldg') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Street</label>
                                                                            <input value="{{ $users->permanentaddress->street }}"
                                                                                   type="text"
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
                                                                            <input value="{{ $users->permanentaddress->city->name }}"
                                                                                   type="text" name="city" id="city"
                                                                                   class="form-control input-default">
                                                                        </div>
                                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Country</label>
                                                                            <select class="form-control custom-select input-default"
                                                                                    name="country_id" id="country_id">
                                                                                <option value="">Select Country</option>
                                                                                {{--@foreach($country as $countries)--}}
                                                                                {{--<option value="{{$countries->id}}"--}}
                                                                                {{--@if(old('country_id') == $countries->id)--}}
                                                                                {{--selected @endif>{{$countries->name}}</option>--}}
                                                                                {{--@endforeach--}}
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <br>
                                                                <h6 class="heading-small text-success mb-4">TEMPORARY
                                                                    ADDRESS</h6>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Unit Number</label>
                                                                            <input value="{{ $users->temporaryaddress->unitno }}"
                                                                                   type="text" name="tunitno"
                                                                                   id="tunitno"
                                                                                   class="form-control input-default">
                                                                            <span class="text-danger">{{ $errors->first('tunitno') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Building</label>
                                                                            <input value="{{ $users->temporaryaddress->bldg }}"
                                                                                   type="text" name="tbldg" id="tbldg"
                                                                                   class="form-control input-default">
                                                                            <span class="text-danger">{{ $errors->first('tbldg') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Street</label>
                                                                            <input value="{{ $users->temporaryaddress->street }}"
                                                                                   type="text"
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
                                                                            <input value="{{ $users->temporaryaddress->city->name }}"
                                                                                   type="text"
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
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('tcountry') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="pwa">
                                                        <div class="col-lg-12">
                                                            <br>
                                                            <h6 class="heading-small text-success mb-4">PERSON WITH
                                                                AUTISM</h6>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input value="{{ $users->pwa->pwaFirstName }}"
                                                                               type="text"
                                                                               name="pwaFirstName" id="pwaFirstName"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('pwaFirstName') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Middle Name</label>
                                                                        <input value="{{ $users->pwa->pwaMiddleName }}"
                                                                               type="text"
                                                                               name="pwaMiddleName" id="pwaMiddleName"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('pwaMiddleName') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input value="{{ $users->pwa->pwaLastName }}"
                                                                               type="text"
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
                                                                            <option value="1" {{ $users->pwa->pwaGender == 1 ? 'selected' : '' }}>
                                                                                Male
                                                                            </option>
                                                                            <option value="2" {{ $users->pwa->pwaGender == 2 ? 'selected' : '' }}>
                                                                                Female
                                                                            </option>
                                                                        </select>
                                                                        <span class="text-danger">{{ $errors->first('pwaGender') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Relationship to PWA</label>
                                                                        <input value="{{ $users->pwa->pwaRelationship }}"
                                                                               type="text"
                                                                               name="description" id="description"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('pwaRelationship') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Number of Siblings</label>
                                                                        <input value="{{ $users->pwa->siblingcount }}"
                                                                               name="siblingcount" id="siblingcount"
                                                                               type="number"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('siblingcount') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>With Intervention</label>
                                                                        <select class="form-control custom-select input-default"
                                                                                name="withintervention"
                                                                                id="withintervention">
                                                                            <option value="">Select Option</option>
                                                                            <option value="1" {{ $users->pwa->withintervention == 1 ? 'selected' : '' }}>
                                                                                Yes
                                                                            </option>
                                                                            <option value="2" {{ $users->pwa->withintervention == 2 ? 'selected' : '' }}>
                                                                                No
                                                                            </option>
                                                                        </select>
                                                                        <span class="text-danger">{{ $errors->first('withintervention') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Occupation</label>
                                                                        <input value="{{ $users->pwa->pwaOccupation }}"
                                                                               name="pwaOccupation"
                                                                               id="pwaOccupation" type="text"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('pwaOccupation') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <br>
                                                            <h6 class="heading-small text-success mb-4">ABOUT THE
                                                                EMPLOYER</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Employer's Name</label>
                                                                        <input value="{{ $users->pwa->employer->employerName}}"
                                                                               type="text"
                                                                               name="employerName" id="employerName"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('employerName') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Contact Number</label>
                                                                        <input value="{{ $users->pwa->employer->employerContactNumber }}"
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
                                                                        <input value="{{ $users->pwa->employer->address->unitno }}"
                                                                               type="text" name="eunitno"
                                                                               id="eunitno"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('eunitno') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Building</label>
                                                                        <input value="{{ $users->pwa->employer->address->bldg }}"
                                                                               type="text" name="ebldg"
                                                                               id="ebldg"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('ebldg') }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Street</label>
                                                                        <input value="{{ $users->pwa->employer->address->street }}"
                                                                               type="text" name="estreet"
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
                                                                        <input value="{{ $users->pwa->employer->address->city->name }}"
                                                                               type="text" name="ecity"
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
                                                                            @foreach($countries as $country)
                                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">{{ $errors->first('ecountry') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="credentials">
                                                        <div class="col-lg-12">
                                                            <br>
                                                            <h6 class="heading-small text-success mb-4">LOGIN
                                                                CREDENTIALS</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Email Address</label>
                                                                        <input value="{{ $users['email'] }}"
                                                                               type="email"
                                                                               name="email" id="email"
                                                                               class="form-control input-default">
                                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="g-recaptcha"
                                                                             data-sitekey="6Lfj6XAUAAAAAP9Mkg2ajxaSAZy0LaV-TS_BcnlK"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pull-right">
                                                    <button type="button" class="btn btn-success" id="save">Save Changes
                                                    </button>
                                                </div>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


