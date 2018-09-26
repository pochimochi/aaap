<!DOCTYPE html>
<html lang="en">
@include('layouts.master.header')
<!--SVG background-->
<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}"/>
<link rel="stylesheet" type="text/css"
      href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>

<main>
    <div class="morph-wrap">
        <svg class="morph" width="1400" height="770" viewBox="0 0 1400 770">
            <path d="M 262.9,252.2 C 210.1,338.2 212.6,487.6 288.8,553.9 372.2,626.5 511.2,517.8 620.3,536.3 750.6,558.4 860.3,723 987.3,686.5 1089,657.3 1168,534.7 1173,429.2 1178,313.7 1096,189.1 995.1,130.7 852.1,47.07 658.8,78.95 498.1,119.2 410.7,141.1 322.6,154.8 262.9,252.2 Z"/>
        </svg>
    </div>
    <div id="main-wrapper">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <form action="{{URL::to('/registersubmit')}}" name="regForm" enctype="multipart/form-data" id="regForm" method="post">
                            <div class="login-content card">
                                <div class="login-form">
                                    <h4>REGISTER AS A NEW MEMBER</h4>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="tab">
                                        <h3 class="box-title m-t-40">Personal Information</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name</label>

                                                    <input value="{{ old('userFirstName') }}" type="text" name="userFirstName" id="userFirstName"
                                                           class="form-control input-default">
                                                    <i style="color:red;" id="fnErr"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input value="{{ old('userMiddleName') }}" type="text" name="userMiddleName" id="userMiddleName"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input value="{{ old('userLastName') }}" type="text" name="userLastName" id="userLastName"
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
                                                        <?php
                                                        $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From genderlist");
                                                        $row = mysqli_num_rows($sql);
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                            echo "<option value='" . $row['genderId'] . "'>" . $row['name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <i style="color:red;" id="gErr"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Landline Number</label>
                                                    <input value="{{ old('landlineNumber') }}" type="text" name="landlineNumber" id="landlineNumber"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input value="{{ old('mobileNumber') }}" type="text" name="mobileNumber" id="mobileNumber"
                                                           class="form-control input-default">
                                                    <i style="color:red;" id="mnErr"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profile Picture</label>
                                                    <input value="{{ old('userProfPic') }}" type="file" name="userProfPic" id="file-input"
                                                           class="form-control input-default"/>
                                                    <div id="thumb-output"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ID Verification</label>
                                                    <input value="{{ old('idVerification') }}" type="file" name="idVerification" id="id-input"
                                                           class="form-control input-default"/>
                                                    <div id="thumb1-output"></div>
                                                    <i style="color:red;" id="idErr"></i>
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
                                                                <input value="{{ old('unitno') }}" type="text" name="unitno" id="unitno"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Building</label>
                                                                <input value="{{ old('bldg') }}" type="text" name="bldg" id="bldg"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street</label>
                                                                <input value="{{ old('street') }}" type="text" name="street" id="street"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input value="{{ old('city') }}" type="text" name="city" id="city"
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
                                                                <input value="{{ old('tunitno') }}" type="text" name="tunitno" id="tunitno"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Building</label>
                                                                <input value="{{ old('tbldg') }}" type="text" name="tbldg" id="tbldg"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street</label>
                                                                <input value="{{ old('tstreet') }}" type="text" name="tstreet" id="tstreet"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input value="{{ old('tcity') }}" type="text" name="tcity" id="tcity"
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
                                    </div>
                                    <div class="tab">
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Person with Autism Information</h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input value="{{ old('pwaFirstName') }}" type="text" name="pwaFirstName" id="pwaFirstName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input value="{{ old('pwaMiddleName') }}" type="text" name="pwaMiddleName" id="pwaMiddleName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input value="{{ old('pwaLastName') }}" type="text" name="pwaLastName" id="pwaLastName"
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
                                                            <?php
                                                            $sql = mysqli_query(mysqli_connect("localhost", "root", "", "aaapdb"), "SELECT * From genderlist");
                                                            $row = mysqli_num_rows($sql);
                                                            while ($row = mysqli_fetch_array($sql)) {
                                                                echo "<option value='" . $row['genderId'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Relationship to PWA</label>
                                                        <input value="{{ old('relationship') }}" type="text" name="description" id="description"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Occupation</label>
                                                        <input value="{{ old('pwaOccupation') }}" name="pwaOccupation" id="pwaOccupation" type="text"
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
                                                        <input value="{{ old('employerName') }}" type="text" name="employerName" id="employerName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input value="{{ old('employerContactNumber') }}" type="text" name="employerContactNumber"
                                                               id="employerContactNumber"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Unit Number</label>
                                                        <input value="{{ old('eunitno') }}" type="text" name="eunitno" id="eunitno"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Building</label>
                                                        <input value="{{ old('ebldg') }}" type="text" name="ebldg" id="ebldg"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input value="{{ old('estreet') }}" type="text" name="estreet" id="estreet"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input value="{{ old('ecity') }}" type="text" name="ecity" id="ecity"
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
                                    <div class="tab">
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Login Credentials</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input value="{{ old('emailAddress') }}" type="email" name="emailAddress" id="emailAddress"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input value="{{ old('userPassword') }}" type="password" name="userPassword" id="userPassword"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row align-items-center">

                                                <div class="g-recaptcha"
                                                     data-sitekey="6Lfj6XAUAAAAAP9Mkg2ajxaSAZy0LaV-TS_BcnlK"></div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-rounded" id="prevBtn"
                                                    onclick="nextPrev(-1)">Previous
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-rounded" id="nextBtn"
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



</body>
</html>