<!DOCTYPE HTML>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('images/logos/logoicontest.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logos/logoicontest.png')}}">

    <link rel="stylesheet" href="{{asset('')}}assets/css/normalize.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    <link href="{{asset('')}}assets/weather/css/weather-icons.css" rel="stylesheet"/>
    <link href="{{asset('')}}assets/calendar/fullcalendar.css" rel="stylesheet"/>


    <link href="{{asset('')}}assets/css/charts/chartist.min.css" rel="stylesheet">
    <link href="{{asset('')}}assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
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
<!--SVG background-->
<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}"/>
<link rel="stylesheet" type="text/css"
      href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>


<main class="bg-dark">

    <div id="main-wrapper">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <form action="{{URL::to('/register')}}" name="regForm" id="regForm" method="post">
                            <div class="login-content card" style="max-width: inherit">
                                <div class="login-form" style="width: available">
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
                                                        <option value="0">Female</option>

                                                    </select>
                                                    <i style="color:red;" id="gErr"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Landline Number</label>
                                                    <input value="{{ old('landlineNumber') }}" type="text"
                                                           name="landlineNumber" id="landlineNumber"
                                                           class="form-control input-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input value="{{ old('mobileNumber') }}" type="text"
                                                           name="mobileNumber" id="mobileNumber"
                                                           class="form-control input-default">
                                                    <i style="color:red;" id="mnErr"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Profile Picture</label>


                                                    <input value="{{ old('userProfPic') }}" type="file"
                                                           name="userProfPic" id="file-input"
                                                           class="form-control-file"/>

                                                    <div id="thumb-output"></div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ID Verification</label>

                                                    <input value="{{ old('idVerification') }}" type="file"
                                                           name="idVerification" id="id-input"
                                                           class="form-control-file"/>

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
                                                                <input value="{{ old('unitno') }}" type="text"
                                                                       name="unitno" id="unitno"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Building</label>
                                                                <input value="{{ old('bldg') }}" type="text"
                                                                       name="bldg"
                                                                       id="bldg"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street</label>
                                                                <input value="{{ old('street') }}" type="text"
                                                                       name="street" id="street"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input value="{{ old('city') }}" type="text"
                                                                       name="city"
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
                                                                <input value="{{ old('tunitno') }}" type="text"
                                                                       name="tunitno" id="tunitno"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Building</label>
                                                                <input value="{{ old('tbldg') }}" type="text"
                                                                       name="tbldg" id="tbldg"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street</label>
                                                                <input value="{{ old('tstreet') }}" type="text"
                                                                       name="tstreet" id="tstreet"
                                                                       class="form-control input-default">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input value="{{ old('tcity') }}" type="text"
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
                                    </div>
                                    <div class="tab">
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Person with Autism Information</h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input value="{{ old('pwaFirstName') }}" type="text"
                                                               name="pwaFirstName" id="pwaFirstName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Middle Name</label>
                                                        <input value="{{ old('pwaMiddleName') }}" type="text"
                                                               name="pwaMiddleName" id="pwaMiddleName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input value="{{ old('pwaLastName') }}" type="text"
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
                                                        <input value="{{ old('relationship') }}" type="text"
                                                               name="description" id="description"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Occupation</label>
                                                        <input value="{{ old('pwaOccupation') }}"
                                                               name="pwaOccupation"
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
                                                        <input value="{{ old('employerName') }}" type="text"
                                                               name="employerName" id="employerName"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input value="{{ old('employerContactNumber') }}"
                                                               type="text"
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
                                                        <input value="{{ old('eunitno') }}" type="text"
                                                               name="eunitno"
                                                               id="eunitno"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Building</label>
                                                        <input value="{{ old('ebldg') }}" type="text" name="ebldg"
                                                               id="ebldg"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input value="{{ old('estreet') }}" type="text"
                                                               name="estreet"
                                                               id="estreet"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input value="{{ old('ecity') }}" type="text" name="ecity"
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
                                    <div class="tab">
                                        <div class="col-lg-12">
                                            <h3 class="box-title m-t-40">Login Credentials</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input value="{{ old('emailAddress') }}" type="email"
                                                               name="emailAddress" id="emailAddress"
                                                               class="form-control input-default">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input value="{{ old('userPassword') }}" type="password"
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


<!-- Custom scripts for this template -->
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
        return true;
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
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
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
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
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