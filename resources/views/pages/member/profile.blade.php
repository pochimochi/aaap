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
                            @if($users['active'] == 0)
                                <div class="alert alert-warning">Your Account is currently being processed.</div>
                            @endif
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
                                                            <input value="{{ $users['firstname'] }}" readonly
                                                                   class="form-control form-control-alternative">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Middle Name</label>
                                                            <input value="{{ $users['middlename'] }}" readonly
                                                                   class="form-control form-control-alternative">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Last Name</label>
                                                            <input value="{{ $users['lastname'] }}" readonly
                                                                   class="form-control form-control-alternative">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Gender</label>
                                                            <input value="{{ ($users['gender'] == 1 ? 'Male' : 'Female') }}"
                                                                   readonly
                                                                   class="form-control form-control-alternative">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landline Number</label>
                                                            <input value="{{ $users->contact->landline_number }}"
                                                                   readonly
                                                                   class="form-control form-control-alternative">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Mobile Number</label>
                                                            <input value="{{ $users->contact->mobile_number }}" readonly
                                                                   class="form-control form-control-alternative">
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
                                                                    <input value="{{ $users->permanentaddress->unitno }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Building</label>
                                                                    <input value="{{ $users->permanentaddress->bldg }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Street</label>
                                                                    <input value="{{ $users->permanentaddress->street }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>City</label>
                                                                    <input value="{{ $users->permanentaddress->city->name }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Country</label>
                                                                    <input value="{{ $users->permanentaddress->country->name }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
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
                                                                    <input value="{{ $users->temporaryaddress->unitno }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Building</label>
                                                                    <input value="{{ $users->temporaryaddress->bldg }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Street</label>
                                                                    <input value="{{ $users->temporaryaddress->street }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>City</label>
                                                                    <input value="{{ $users->temporaryaddress->city->name }}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Country</label>
                                                                    <input value="{{ $users->temporaryaddress->country
                                                                        ? $users->temporaryaddress->country->name : ''}}"
                                                                           readonly
                                                                           class="form-control form-control-alternative">
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
                                                                <input value="{{ $users->pwa->pwaFirstName }}" readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Middle Name</label>
                                                                <input value="{{ $users->pwa->pwaMiddleName }}" readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Last Name</label>
                                                                <input value="{{ $users->pwa->pwaLastName }}" readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Gender</label>
                                                                <input value="{{ $users->pwa->pwaGender == 1 ? 'Male' : 'Female'}}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Relationship to PWA</label>
                                                                <input value="{{ $users->pwa->pwaRelationship }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Sibling Count</label>
                                                                <input value="{{ $users->pwa->siblingcount }}" readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>With Intervention</label>
                                                                <input value="{{ $users->pwa->withintervention == 1 ? 'Yes' : 'No'}}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Occupation</label>
                                                                <input value="{{ $users->pwa->pwaOccupation }}" readonly
                                                                       class="form-control form-control-alternative">
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
                                                                <input value="{{ $users->pwa->employer->employerName }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Contact Number</label>
                                                                <input value="{{ $users->pwa->employer->employerContactNumber }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Unit Number</label>
                                                                <input value="{{ $users->pwa->employer->address->unitno }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Building</label>
                                                                <input value="{{ $users->pwa->employer->address->bldg }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Street</label>
                                                                <input value="{{ $users->pwa->siblingcount }}" readonly
                                                                       class="form-control form-control-alternative">
                                                                <p>{{ $users->pwa->employer->address->street }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>City</label>
                                                                <input value="{{ $users->pwa->employer->address->city->name }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Country</label>
                                                                <input value="{{ $users->pwa->employer->address->country ? $users->pwa->employer->address->country->name : '' }}"
                                                                       readonly
                                                                       class="form-control form-control-alternative">
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
                                                                <input value="{{ $users->email }}" readonly
                                                                       class="form-control form-control-alternative">
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


