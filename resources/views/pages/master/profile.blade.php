@extends('layouts.master.master')
<body class="open"></body>
@section('content')


<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-10">
                    <h1>{{$users['userFirstName'] . " ".$users['userMiddleName']. " ".$users['userLastName']}}</h1></div>

            </div>
            <br>
            <div class="row">
                <div class="col-sm-3"><!--left col-->


                    <div class="text-center">
                        <img src="{{asset('/storage/'.$users['imageLocation'])}}" class="avatar img-circle img-thumbnail"
                             alt="avatar">
                        <h6>Upload a different photo...</h6>

                    </div>
                    <br>


                    <ul class="list-group">
                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span>
                            125
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span>
                            78

                        </li>
                    </ul>


                </div><!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                        class="hidden-xs-down">Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                        class="hidden-xs-down">Address</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pwa" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                        class="hidden-xs-down">PWA</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#credentials" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                        class="hidden-xs-down">Credentials</span></a></li>
                    </ul>

                    <form class="form" action="{{URL::to('/')}}" method="post" id="registrationForm">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <h3 class="box-title m-t-40">Personal Information</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>

                                            <input value="{{ $users['userFirstName'] }}" type="text"
                                                   name="userFirstName" id="userFirstName"
                                                   class="form-control input-default">
                                            <i style="color:red;" id="fnErr"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input value="{{ $users['userMiddleName'] }}" type="text"
                                                   name="userMiddleName" id="userMiddleName"
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input value="{{ $users['userLastName'] }}" type="text"
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
                                                <option value="1">Female</option>

                                            </select>
                                            <i style="color:red;" id="gErr"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Landline Number</label>
                                            <input value="{{ $users['landlineNumber'] }}" type="text"
                                                   name="landlineNumber" id="landlineNumber"
                                                   class="form-control input-default">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input value="{{ $users['mobileNumber'] }}" type="text"
                                                   name="mobileNumber" id="mobileNumber"
                                                   class="form-control input-default">
                                            <i style="color:red;" id="mnErr"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3 class="box-title m-t-40">Permanent Address</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Unit Number</label>
                                                    <input value="{{ $paddress['unitno'] }}" type="text"
                                                           name="unitno" id="unitno"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Building</label>
                                                    <input value="{{ $paddress['bldg'] }}" type="text" name="bldg"
                                                           id="bldg"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input value="{{ $paddress['street'] }}" type="text"
                                                           name="street" id="street"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input value="{{ $paddress['city'] }}" type="text" name="city"
                                                           id="city"
                                                           class="form-control input-default">
                                                    <i style="color:red;" id="cErr"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select input-default"
                                                            name="countryId" id="countryId">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From countries");
                                                        $row = mysqli_num_rows($sql);
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                            echo "<option value='" . $row['countryId'] . "'>" . $row['name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <i style="color:red;" id="countryErr"></i>
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
                                                    <input value="{{ $taddress['tunitno'] }}" type="text"
                                                           name="tunitno" id="tunitno"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Building</label>
                                                    <input value="{{ $taddress['tbldg'] }}" type="text"
                                                           name="tbldg" id="tbldg"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input value="{{ $taddress['tstreet'] }}" type="text"
                                                           name="tstreet" id="tstreet"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input value="{{ $taddress['tcity'] }}" type="text"
                                                           name="tcity" id="tcity"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select input-default"
                                                            name="tcountry" id="tcountry">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From countries");
                                                        $row = mysqli_num_rows($sql);
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                            echo "<option value='" . $row['countryId'] . "'>" . $row['name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="pwa">
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">Person with Autism Information</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input value="{{ $users['pwaFirstName'] }}" type="text"
                                                       name="pwaFirstName" id="pwaFirstName"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input value="{{ $users['pwaMiddleName'] }}" type="text"
                                                       name="pwaMiddleName" id="pwaMiddleName"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input value="{{ $users['pwaLastName'] }}" type="text"
                                                       name="pwaLastName" id="pwaLastName"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Gender</label>
                                                <select class="form-control custom-select input-default"
                                                        name="pwaGenderId" id="pwaGenderId">
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="0">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Relationship to PWA</label>
                                                <input value="{{ $relationships['relationship'] }}" type="text"
                                                       name="description" id="description"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Occupation</label>
                                                <input value="{{ $users['pwaOccupation'] }}" name="pwaOccupation"
                                                       id="pwaOccupation" type="text"
                                                       class="form-control input-default">
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
                                                <input value="{{ $users['employerName'] }}" type="text"
                                                       name="employerName" id="employerName"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input value="{{ $users['employerContactNumber'] }}" type="text"
                                                       name="employerContactNumber"
                                                       id="employerContactNumber"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Number</label>
                                                <input value="{{ $eaddress['eunitno'] }}" type="text" name="eunitno"
                                                       id="eunitno"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Building</label>
                                                <input value="{{ $eaddress['ebldg'] }}" type="text" name="ebldg"
                                                       id="ebldg"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input value="{{ $eaddress['estreet'] }}" type="text" name="estreet"
                                                       id="estreet"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input value="{{ $eaddress['ecity'] }}" type="text" name="ecity"
                                                       id="ecity"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="ecountry" id="ecountry"
                                                        class="form-control custom-select input-default">
                                                    <option value="">Select Country</option>
                                                    <?php
                                                    $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From countries");
                                                    $row = mysqli_num_rows($sql);
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        echo "<option value='" . $row['countryId'] . "'>" . $row['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="credentials">
                                <div class="col-lg-12">
                                    <h3 class="box-title m-t-40">Login Credentials</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input value="{{ $users['emailAddress'] }}" type="email"
                                                       name="emailAddress" id="emailAddress"
                                                       class="form-control input-default">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input value="" type="password"
                                                       name="userPassword" id="userPassword"
                                                       class="form-control input-default">
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

                            <button type="button" class="btn btn-warning" id="cancel">Cancel
                            </button>


                            <button type="button" class="btn btn-success" id="save">Save
                            </button>

                        </div>

                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection


