<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{asset('images/logos/logoicontest.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/assets/css/argon.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('argon/DataTables-1.10.19/extensions/Responsive/css/responsive.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('argon/DataTables-1.10.19/extensions/Responsive/css/responsive.dataTables.min.css')}}">


</head>
<body>


<div class="row">
    <a class="col-3 " href="">
        <img src="{{asset('images/logos/logo.png')}}" width="300" class="img-fluid" alt="...">
    </a>
    <div class="col text-right display-4">Paid/Unpaid Members of AAAP</div>

</div>

<!-- Brand -->


<table id="myTable" class="mt-5  table table-dark ">
    <thead>
    <tr>

        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Paid</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>

            <td>{{$user->id}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->middlename}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{($user->gender == 1) ? 'Male' : 'Female'}}</td>
            <td>{{$user->email}}</td>
            <td>
                <div class="badge text-white {{($user->active == 1) ? 'badge-success' : 'badge-danger'}}">{{($user->active == 1) ? 'Paid' : 'Unpaid'}}</div>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
<footer class="footer">
    <div class="row">
        <div class="col-xl-6">
            <div class="copyright text-left text-muted">
                <a href="" class="font-weight-bold ml-1"><img src="{{asset('images/logos/logo.png')}}"
                                                              width="200" class="navbar-brand-img"
                                                              alt="..."></a>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="copyright text-right text-muted">
                <a href="" class="font-weight-bold ml-1">
                    Report Generated on {{today()->toDateString()}}
                </a>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js')}}"></script>

<script src="{{asset('argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" charset="utf8"

</body>
</html>

