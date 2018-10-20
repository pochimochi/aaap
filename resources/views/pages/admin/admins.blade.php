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
    Administrators
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
    <div class="container-">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="">Add Administrator</h4>
            </div>
            </br>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="basic-elements">
                    <form action="{{action('AdminsController@store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Administrator Type</label>
                                        <select class="form-control custom-select input-default"
                                                name="role_id" id="role_id">
                                            <option value="">Select Type</option>
                                            <option value="2">Writer</option>
                                            <option value="3">Content Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input value="{{ old('email') }}" type="email"
                                               name="email" id="email"
                                               class="form-control input-default">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select class="form-control custom-select input-default"
                                                name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>

                                        <input value="{{ old('firstname') }}" type="text"
                                               name="firstname" id="firstname"
                                               class="form-control input-default">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input value="{{ old('middlename') }}" type="text"
                                               name="middlename" id="middlename"
                                               class="form-control input-default">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input value="{{ old('lastname') }}" type="text"
                                               name="lastname" id="lastname"
                                               class="form-control input-default">
                                        <i style="color:red;" id="lnErr"></i>
                                    </div>
                                </div>
                            </div>


                            <div class="form-actions">
                                <input class="btn btn-success btn-rounded" type="submit"
                                       value="Submit">
                                <input class="btn btn-reset btn-rounded" type="reset"
                                       value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List of Administrators</h4>

            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Type</th>
                    <th>Email Address</th>
                    <th>Date Created</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td><input type="hidden" name="userId"
                                   value="{{ $admin->id}}">{{ $admin->id}}</td>
                        <td>{{ $admin->firstname}}</td>
                        <td>{{ $admin->lastname }}</td>
                        <td>{{ $admin->role_id == 2 ? 'Writer' : 'Content Manager'}}</td>
                        <td>{{ $admin->email}}</td>
                        <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y')}}</td>
                        <td><a id="btn"
                               href="{{URL::to('admin/changeStatus/'. $admin->id. '/'.  ($admin->active == 1 ? '0' : '1')  .'')}}"
                               class="btn  {{$admin->active == 1 ? 'btn-success' : 'btn-danger'}}">{{$admin->active == 1 ? 'Active' : 'Inactive' }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
    </div>



@endsection
