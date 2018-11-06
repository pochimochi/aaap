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
                                    <a href="{{url('member/profile/edit')}}" class="btn btn-sm btn-info mr-4">Edit
                                        Profile</a>


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

                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="profile">
                                                        <br>
                                                        <h6 class="heading-small text-success mb-4">PERSONAL
                                                            INFORMATION</h6>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>First Name</label>
                                                                <p>{{ $users['firstname'] }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Middle Name</label>
                                                                <p>{{ $users['middlename'] }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Last Name</label>
                                                                <p>{{ $users['lastname'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Gender</label>
                                                                <p> @if($users['gender'] == '1')
                                                                        Male @elseif($users['gender'] == '0')
                                                                        Female @endif</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Landline Number</label>
                                                                <p>{{ $users->contact->landline_number }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Mobile Number</label>
                                                                <p>{{ $users->contact->mobile_number }}</p>
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
                                                                        <label>Unit Number</label>
                                                                        <p>{{ $users->permanentaddress->unitno }}</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Building</label>
                                                                        <p>{{ $users->permanentaddress->bldg }}</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Street</label>
                                                                        <p>{{ $users->permanentaddress->street }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>City</label>
                                                                        <p>{{ $users->permanentaddress->city->name }}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Country</label>
                                                                        <p>{{ $users->permanentaddress->country->name }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <br>
                                                                <h6 class="heading-small text-success mb-4">TEMPORARY
                                                                    ADDRESS</h6>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Unit Number</label>
                                                                        <p>{{ $users->temporaryaddress->unitno }}</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Building</label>
                                                                        <p>{{ $users->temporaryaddress->bldg }}</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Street</label>
                                                                        <p>{{ $users->temporaryaddress->street }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>City</label>
                                                                        <p>{{ $users->temporaryaddress->city->name }}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Country</label>
                                                                        <p>{{ $users->temporaryaddress->country
                                                                        ? $users->temporaryaddress->country->name : ''}}</p>
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
                                                                    <label>First Name</label>
                                                                    <p>{{ $users->pwa->pwaFirstName }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Middle Name</label>
                                                                    <p>{{ $users->pwa->pwaMiddleName }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Last Name</label>
                                                                    <p>{{ $users->pwa->pwaLastName }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Gender</label>

                                                                    <p> @if($users->pwa->pwaGender =='1')
                                                                            Male
                                                                        @elseif($users->pwa->pwaGender == '0')
                                                                            Female
                                                                        @else

                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Relationship to PWA</label>
                                                                    <p>{{ $users->pwa->pwaRelationship }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sibling Count</label>
                                                                    <p>{{ $users->pwa->siblingcount }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>With Intervention</label>
                                                                    <p>
                                                                        @if($users->pwa->withintervention =='1')
                                                                            Male
                                                                        @elseif($users->pwa->withintervention == '0')
                                                                            Female
                                                                        @else

                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Occupation</label>
                                                                    <p>{{ $users->pwa->pwaOccupation }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <br>
                                                            <h6 class="heading-small text-success mb-4">ABOUT THE
                                                                EMPLOYER</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Employer Name</label>
                                                                    <p>{{ $users->pwa->employer->employerName }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Contact Number</label>
                                                                    <p>{{ $users->pwa->employer->employerContactNumber }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Unit Number</label>
                                                                    <p>{{ $users->pwa->employer->address->unitno }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Building</label>
                                                                    <p>{{ $users->pwa->employer->address->bldg }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Street</label>
                                                                    <p>{{ $users->pwa->employer->address->street }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>City</label>
                                                                    <p>{{ $users->pwa->employer->address->city->name }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>City</label>
                                                                    <p>{{ $users->pwa->employer->address->country ? $users->pwa->employer->address->country->name : '' }}</p>
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
                                                                    <label>Email Address</label>
                                                                    <p>{{ $users->email }}</p>
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


