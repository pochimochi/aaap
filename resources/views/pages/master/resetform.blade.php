
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


</head>

<body class="bg-dark">


<!-- Main wrapper  -->


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">


        <div class="login-content">

            <div class="login-form">
                <h4>RESET PASSWORD</h4>
                <ul>
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                </ul>
                <form method="post" action="{{URL::to('/forgotpassword')}}">
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email address" name="email"
                               class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{asset('')}}assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="{{asset('')}}assets/js/popper.min.js"></script>
<script src="{{asset('')}}assets/js/plugins.js"></script>
<script src="{{asset('')}}assets/js/main.js"></script>
</body>
