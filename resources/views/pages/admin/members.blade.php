@extends('layouts.master.admin')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function submitForm() {
        $('#submit').trigger("click");
    }
</script>
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Members
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <form id="status" action="{{URL::to('/changeStatus')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of Members</h4>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Verification File</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td></td>
                                <td>{{ $member->id}}</td>
                                <td>{{ $member->firstname}}</td>
                                <td>{{ $member->lastname }}</td>
                                <td>{{ $member->email}}</td>
                                <td>
                                    @if(file_exists(public_path('/storage/'.$member->idverification->location)))
                                        <a href="{{ asset('/storage/'.$member->idverification->location) }}">Download</a>
                                    @else
                                        No file
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d/m/Y')}}</td>
                                <td><a id="btn"
                                       href="{{URL::to('/admin/memberchangeStatus/'. $member->id. '/'.  ($member->active == 1 ? '0' : '1')  .'')}}"
                                       class="btn {{$member->active == 1 ? 'btn-success' : 'btn-danger'}}">{{$member->active == 1 ? 'Paid' : 'Unpaid' }}</a>
                                </td>
                                <td><a data-toggle="modal"
                                       data-target="#status-form{{$member->id}}"
                                       class="btn text-white btn-rounded btn-warning">View Details</a></td>
                            </tr>
                            <div class="modal fade" id="status-form{{$member->id}}"
                                 role="dialog"
                                 aria-labelledby="status-form" aria-hidden="true">
                                <div class="modal-dialog modal modal-lg modal-dialog-centered modal-sm"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">User profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-body mt-5">

                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-3 order-lg-2">
                                                            <div class="card-profile-image">
                                                                <a href="#">
                                                                    <img
                                                                            src="{{$member->profilepic ? asset('/public/'. $member->profilepic->location) : ''}}"
                                                                            alt="" width="150" height="150"
                                                                            style="object-fit:scale-down;background-color: white"
                                                                            class="bg-gradient-teal rounded-circle">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-body pt-0 pt-md-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div
                                                                        class="card-profile-stats d-flex justify-content-center mt-md-5">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-4">
                                                            <h3>
                                                                {{$member['firstname'].' '.$member['lastname']}}
                                                            </h3>
                                                            <div class="h5 font-weight-300">
                                                                <i class="ni location_pin mr-2"></i>{{$member->permanentaddress->city->name}}
                                                                <br>{{ $member->permanentaddress->country->name}}
                                                            </div>
                                                            <div class="h5 mt-4">
                                                                <i class="ni business_briefcase-24 mr-2"></i>{{$member->usertype->name}}
                                                                - AAAP
                                                            </div>
                                                        </div>
                                                        <h6 class="heading-small text-muted mb-4">Personal information</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-username">First Name</label>
                                                                        <input value="{{ $member['firstname'] }}"
                                                                               type="text"
                                                                               readonly
                                                                               class="form-control form-control-alternative">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-username">Middle Name</label>
                                                                        <input value="{{ $member['middlename'] }}"
                                                                               type="text"
                                                                               readonly
                                                                               class="form-control form-control-alternative">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-email">Last
                                                                            Name</label>
                                                                        <input value="{{ $member['lastname'] }}" type="text"
                                                                               readonly
                                                                               class="form-control form-control-alternative">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-first-name">Email Address</label>
                                                                        <input value="{{ $member['email'] }}" type="text"
                                                                               readonly
                                                                               class="form-control form-control-alternative">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-last-name">Gender</label>
                                                                        <input
                                                                                value="{{ ($member['gender'] == 1 ? 'Male' : 'Female') }}"
                                                                                readonly
                                                                                class="form-control form-control-alternative">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Address -->
                                                        <h6 class="heading-small text-muted mb-4">Permanent Address</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-address">House/Apartment/Unit
                                                                            No.</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->permanentaddress->unitno}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Building</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->permanentaddress->bldg}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Street</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->permanentaddress->street}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">City</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->permanentaddress->city->name}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-country">Country</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->permanentaddress->country->name}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="heading-small text-muted mb-4">Temporary Address</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-address">House/Apartment/Unit
                                                                            No.</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->temporaryaddress->unitno}}"
                                                                               type="text" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Building</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->temporaryaddress->bldg}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Street</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->temporaryaddress->street}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">City</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->temporaryaddress->city->name}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-country">Country</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->temporaryaddress->country->name}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <h6 class="heading-small text-muted mb-4">Person With Autism
                                                            Information</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-address">First Name</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaFirstName}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Middle
                                                                            Name</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaMiddleName}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Last Name</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaLastName}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Gender</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaGender == 1 ? 'Male' : 'Female'}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label
                                                                                class="form-control-label">Relationship</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaRelationship}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Siblings</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->siblingcount}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">With
                                                                            Intervention</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->withintervention == 1 ? 'Yes' : 'No'}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Occupation</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->pwaOccupation }}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 class="heading-small text-muted mb-4">About the Employer</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label">Name</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->employerName}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Contact
                                                                            Number</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->employerContactNumber }}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-address">House/Apartment/Unit
                                                                            No.</label>
                                                                        <input class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->address->unitno }}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Building</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->address->bldg }}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">Street</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->address->street }}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label" for="input-city">City</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->address->city->name}}"
                                                                               readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group focused">
                                                                        <label class="form-control-label"
                                                                               for="input-country">Country</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-alternative"
                                                                               value="{{ $member->pwa->employer->address->country->name}}"
                                                                               readonly>
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            <button type="submit" class="positive" name="submit" id="submit" hidden="hidden">save</button>
        </form>
    </div>
@endsection

