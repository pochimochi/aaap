<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{env('APP_NAME')}}</title>
    <!-- Favicon -->
    <link href="{{asset('images/logos/logoicontest.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/assets/css/argon.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/extensions/Responsive/css/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/extensions/Responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/extensions/Buttons/css/buttons.bootstrap4.css')}}">
    {{--<link rel="stylesheet" href="{{asset('argon/DataTables-1.10.19/media/css/dataTables.bootstrap4.min.css')}}">--}}

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        $('#btnSubmit, #btnChange').on('click', function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        });

    </script>

</head>

<body>
<!-- Sidenav -->
@yield('sidenav')
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h1 mb-0 text-white  d-none d-lg-inline-block" href="#">@yield('pagetitle')</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        @if(session('role_id') == 4)
                        <div class="media align-items-center">

                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{session('user')['firstname'] .' ' . session('user')['lastname']}}</span>
                            </div>
                        </div>
                            @else

                            <button class="rounded-circle icon icon-shape bg-warning text-white dropdown-toggle border-0" >
                                <span class="btn-inner--icon"><i class="fa fa-user  "></i></span>


                            </button>
                            @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        @if(session('user')['email'] != 'admin@aaap.com')
                            <a href="{{url('profile')}}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                        @endif

                        <div class="dropdown-divider"></div>
                        @if(!session()->exists('user'))
                            <a class="dropdown-item" href="{{URL::to('/login')}}"><i
                                        class="menu-icon fa fa-sign-in"></i>Login</a>

                            <a class="dropdown-item" href="{{URL::to('/register')}}"><i
                                        class="menu-icon fa fa-registered"></i>Register</a>
                        @else

                            {{--<li><a href="{{URL::to('/profile')}}"><i class="menu-icon fa fa-laptop"></i>Profile</a></li>--}}
                            <a class="dropdown-item" href="{{URL::to('/logout')}}"><i
                                        class="ni ni-button-power text-red"></i>Logout</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
@yield('header')
{{-- <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
     <div class="container-fluid">
         <div class="header-body">
             <!-- Card stats -->

         </div>
     </div>
 </div>--}}
<!-- Page content -->
    <div class="container-fluid mt--8">
        @yield('content')
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        <a href="" class="font-weight-bold ml-1"><img src="{{asset('images/logos/logo.png')}}"
                                                                      width="200" class="navbar-brand-img"
                                                                      alt="..."></a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                               class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js')}}"></script>

<script src="{{asset('argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


<script type="text/javascript" charset="utf8" src="{{asset('argon/DataTables-1.10.19/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('argon/DataTables-1.10.19/extensions/Buttons/js/buttons.print.js')}}"></script>
<script src="{{asset('argon/DataTables-1.10.19/extensions/Buttons/css/buttons.bootstrap4.css')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>





<script type="text/javascript" charset="utf8" src="{{asset('argon/DataTables-1.10.19/media/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{asset('argon/DataTables-1.10.19/extensions/Responsive/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{asset('argon/DataTables-1.10.19/extensions/Responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
/*
    $(document).ready(function() {
        $('table').DataTable( {
            pagingType: 'numbers',
            dom: 'Bfrtip',
            buttons: [
                'print'
            ],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets:   0
            } ],
            order: [ 1, 'asc' ]
        } );
    } );
*/

    $(document).ready(function() {
        var table = $('table').DataTable( {
            pagingType: 'numbers',
            lengthChange: false,
            buttons: {
                buttons: [
                    { extend: 'print', className: 'btn btn-info' },
                    { extend: 'pdf', className: 'btn btn-success ' }
                ]
            },
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets:   0
            } ],
            order: [ 1, 'asc' ]
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );

</script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')



</body>

</html>