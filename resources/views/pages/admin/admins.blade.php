@include ('layouts.master.header')
@include ('layouts.admin.adminmenu')
<script>
    function submitForm() {
        $("#form2").submit();
    }
</script>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Manage Administrators</h3></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0    text-white">Add Administrator</h4>
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
                            <form action="{{URL::to('/adminSubmit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Administrator Type</label>
                                                <select class="form-control custom-select input-default"
                                                        name="userTypeId" id="userTypeId">
                                                    <option value="">Select Type</option>
                                                    <option value="2">Writer</option>
                                                    <option value="3">Event Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input value="{{ old('emailAddress') }}" type="email"
                                                       name="emailAddress" id="emailAddress"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input value="{{ old('userPassword') }}" type="password"
                                                       name="userPassword" id="userPassword"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>

                                                <input value="{{ old('userFirstName') }}" type="text"
                                                       name="userFirstName" id="userFirstName"
                                                       class="form-control input-default">
                                                <i style="color:red;" id="fnErr"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input value="{{ old('userMiddleName') }}" type="text"
                                                       name="userMiddleName" id="userMiddleName"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input value="{{ old('userLastName') }}" type="text"
                                                       name="userLastName" id="userLastName"
                                                       class="form-control input-default">
                                                <i style="color:red;" id="lnErr"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Gender</label>
                                                <select class="form-control custom-select input-default"
                                                        name="userGenderId" id="userGenderId">
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
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
            {{--<form id="form2" action="{{URL::to('/changeStatus')}}" method="POST">--}}
                @csrf

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List of Administrators</h4>
                        </div>
                        <div class="table-responsive m-t-40">
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
                                                   value="{{ $admin->userId}}">{{ $admin->userId}}</td>
                                        <td>{{ $admin->userFirstName}}</td>
                                        <td>{{ $admin->userLastName }}</td>
                                        <td>{{ $admin->userTypeId == 2 ? 'Writer' : 'Event Manager'}}</td>
                                        <td>{{ $admin->emailAddress}}</td>
                                        <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y')}}</td>
                                        <td><select onchange="submitForm()"
                                                    class="form-control custom-select input-default"
                                                    name="membershipStatus" id="membershipStatus">
                                                <option value="1"
                                                        @if($admin->membershipStatus=="1") selected @endif>
                                                    Active
                                                </option>
                                                <option value="0"
                                                        @if($admin->membershipStatus=="0") selected @endif>
                                                    Inactive
                                                </option>
                                            </select></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            {{--</form>--}}
        </div>
    </div>
</div>
<footer class="footer"> © 2018 All rights reserved. Template designed by <a
            href="https://colorlib.com">Colorlib</a>
</footer>
@include('layouts.master.footer')

