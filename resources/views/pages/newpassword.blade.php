<!DOCTYPE html>
<html lang="en">

@include('layouts.master.header')


<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
<link rel="stylesheet" type="text/css" href="css/demo.css"/>

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
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h3>Reset Password</h3>

                                <ul>
                                    @foreach($errors->all() as $error)

                                        <div class="alert alert-danger">
                                            {{$error}}
                                        </div>

                                    @endforeach
                                </ul>
                                <form method="post" action="{{URL::to('/savepassword')}}" id="form">
                                    <div class="form-group">

                                        <input type="text" placeholder="New Password" name="password"
                                               class="form-control input-rounded">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Confirm Password" name="password_confirmation"
                                               class="form-control input-rounded">
                                    </div>
                                    <div class="form-group">

                                        <button type="submit" id="button" onclick="return confirm('Are you sure?')"
                                                class="btn btn-primary btn-rounded">Submit
                                        </button>

                                        <input type="hidden" name="emailAddress" value="{{ $email }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="js/lib/jquery/jquery.min.js"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!--SVG background-->
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/scrollMonitor.js"></script>
<script src="js/demo1.js"></script>
@include('layouts.master.footer')
</body>

</html>