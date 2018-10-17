@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Profile
@endsection
@section('header')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 600px; background-image: url({{asset('/storage/'. $users->profilepic->location)}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello {{session('user')['firstname']}}</h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with
                        your work and manage your projects or assigned tasks</p>
                    <a href="#!" class="btn btn-info">Edit profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset('/storage/'. $users->profilepic->location)}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>
                                    <span class="heading">{{\App\Event::all()->where('posted_by', $users->id)->count()}}</span>
                                    <span class="description">Posts</span>
                                </div>
                                <div>
                                    <span class="heading">10</span>
                                    <span class="description">Photos</span>
                                </div>
                                <div>
                                    <span class="heading">89</span>
                                    <span class="description">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{$users['firstname'].' '.$users['lastname']}}
                        </h3>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{$users->permanentaddress->city->name .' ' .$users->permanentaddress->country->name}}
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>{{$users->usertype->name}} - AAAP
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">My account</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">First Name</label>
                                        <input value="{{ $users['firstname'] }}" type="text" readonly
                                               name="userFirstName" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Middle Name</label>
                                        <input value="{{ $users['middlename'] }}" type="text" readonly
                                               name="middlename" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Last Name</label>
                                        <input value="{{ $users['lastname'] }}" type="text" readonly
                                               name="userFirstName" class="form-control-plaintext">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Email Address</label>
                                        <input value="{{ $users['email'] }}" type="text" readonly
                                               name="userFirstName" class="form-control-plaintext">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Gender</label>
                                        <input value="{{ ($users['gender'] == 1 ? 'Male' : 'Female') }}" type="text" readonly
                                               name="userFirstName" class="form-control-plaintext">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-address">Address</label>
                                        <input id="input-address" class="form-control form-control-alternative"
                                               placeholder="Home Address"
                                               value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-city">City</label>
                                        <input type="text" id="input-city" class="form-control form-control-alternative"
                                               placeholder="City" value="New York">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-country">Country</label>
                                        <input type="text" id="input-country"
                                               class="form-control form-control-alternative" placeholder="Country"
                                               value="United States">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Postal code</label>
                                        <input type="number" id="input-postal-code"
                                               class="form-control form-control-alternative" placeholder="Postal code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group focused">
                                <label>About Me</label>
                                <textarea rows="4" class="form-control form-control-alternative"
                                          placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection


