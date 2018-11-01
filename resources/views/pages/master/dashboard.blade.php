@php
    $today = $counts->whereDate('created_at', today())->count();
    $yesterday = $counts->whereDate('created_at', today()->subDays(1))->count();
    $totalvisit = ((($yesterday == 0) ? 0 : (($today -  $yesterday) / $yesterday)) * 100);
@endphp
@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Dashboard
@endsection
@section('header')
    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8">
        <div class="container">
            <div class="header-body">
                <!-- Card stats -->
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Website Visits</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$today}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        @if($totalvisit > 0)
                                            <span class="text-success mr-2">
                                        <i class="fa fa-arrow-up"></i>
                                                {{number_format($totalvisit, 0)}}%</span>
                                        @else
                                            <span class="text-danger mr-2">
                                        <i class="fa fa-arrow-down"></i>
                                                {{number_format($totalvisit, 0)}}%</span>
                                        @endif
                                        <span class="text-nowrap">Since Yesterday</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Events</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$events->count()}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="ni ni-square-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-info mr-2"><i
                                                        class="fa fa-location-arrow"></i> {{$events->whereMonth('start_date', today()->month)->count()}}</span>
                                        <span class="text-nowrap">For this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Articles</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$articles->count()}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fa fa-bullhorn"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><i
                                                        class="fa fa-location-arrow"></i> {{$articles->whereMonth('created_at', today()->month)->count()}}</span>
                                        <span class="text-nowrap">For this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="card-title text-uppercase text-muted mb-0">Total
                                                Announcements</h6>
                                            <span class="h2 font-weight-bold mb-0">{{$announcements->count()}}</span>
                                        </div>
                                        <div class="col">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2"><i
                                                    class="fa fa-location-arrow"></i> {{$announcements->whereMonth('created_at', today()->month)->count()}}</span>
                                        <span class="text-nowrap">For this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @if (session('user')['role_id'] == 3)
        <!-- Widgets  -->


        <!-- Widgets End -->


        <div id="app">
            <div class="card shadow bg-white">
                <div class="card-body">
                    <div class="tab-pane tab-example-result fade show active">
                        <div class="chart">
                            {!! $chart->container() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>

        {!! $chart->script() !!}

        <div class="card mt-5 bg-translucent-white shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col text-center card-title display-4">
                        Members of AAAP
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-12 col-md-6 m-1">
                        <a class="btn btn-warning" target="_blank" href="{{action('PrintController@MemberStatus')}}">Paid/Unpaid
                            Members <span class="fas fa-print"></span></a>
                    </div>


                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 col-md-6">
                        <span id="statusfilter"></span>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-6">
                        <span id="countryfilter"></span>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-6">
                        <span id="cityfilter"></span>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-6">
                        <span id="genderfilter"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <span>Date From: </span><input class="form-control form-control-sm" type="text" id="min"/>

                    </div>
                    <div class="col-3">
                        <span>Date To:</span><input class="form-control form-control-sm" type="text"
                                                    id="max"/>

                    </div>
                </div>

                <hr>

                <table id="memberdashboard" class="table bg-white table-bordered table-condensed shadow">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Actions</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Date Created</th>
                        <th>Email</th>
                        <th>Active</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td><a data-toggle="modal"
                                   data-target="#status-form{{$user->id}}"
                                   class="btn text-white btn-rounded btn-warning">View Details</a></td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}&nbsp;{{$user->lastname}}</td>

                            <td>{{($user->permanentaddress && $user->permanentaddress->city) ? $user->permanentaddress->city->name : 'N/A'}}
                            <td>{{($user->permanentaddress && $user->permanentaddress->country) ? $user->permanentaddress->country->name : 'N/A'}}
                            <td>{{$user->active == 1 ? 'Paid' : 'Unpaid'}}</td>
                            <td>{{($user->gender == 1) ? 'Male' : 'Female'}}</td>
                            <td>{{$user->created_at}}</td>

                            <td>{{$user->email}}</td>
                            <td>
                                <div class="badge {{($user->active == 1) ? 'badge-success' : 'badge-danger'}}">{{($user->active == 1) ? 'Active' : 'Inactive'}}</div>
                            </td>

                        </tr>
                        <div class="modal fade" id="status-form{{$user->id}}"
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
                                                                <img src="{{$user->profilepic ? asset('/storage/'. $user->profilepic->location) : ''}}"
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
                                                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-4">
                                                        <h3>
                                                            {{$user['firstname'].' '.$user['lastname']}}
                                                        </h3>
                                                        <div class="h5 font-weight-300">
                                                            <i class="ni location_pin mr-2"></i>{{$user->permanentaddress->city->name}}
                                                            <br>{{ $user->permanentaddress->country->name}}
                                                        </div>
                                                        <div class="h5 mt-4">
                                                            <i class="ni business_briefcase-24 mr-2"></i>{{$user->usertype->name}}
                                                            - AAAP
                                                        </div>

                                                    </div>
                                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                                    <div class="pl-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-username">First Name</label>
                                                                    <input value="{{ $user['firstname'] }}" type="text"
                                                                           readonly
                                                                           name="userFirstName"
                                                                           class="form-control-plaintext">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-username">Middle Name</label>
                                                                    <input value="{{ $user['middlename'] }}" type="text"
                                                                           readonly
                                                                           name="middlename"
                                                                           class="form-control-plaintext">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="input-email">Last
                                                                        Name</label>
                                                                    <input value="{{ $user['lastname'] }}" type="text"
                                                                           readonly
                                                                           name="userFirstName"
                                                                           class="form-control-plaintext">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-first-name">Email Address</label>
                                                                    <input value="{{ $user['email'] }}" type="text"
                                                                           readonly
                                                                           name="userFirstName"
                                                                           class="form-control-plaintext">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-last-name">Gender</label>
                                                                    <input value="{{ ($user['gender'] == 1 ? 'Male' : 'Female') }}"
                                                                           type="text"
                                                                           readonly
                                                                           name="userFirstName"
                                                                           class="form-control-plaintext">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <!-- Address -->
                                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                                    <div class="pl-lg-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-address">Address</label>
                                                                    <input id="input-address"
                                                                           class="form-control form-control-alternative"
                                                                           placeholder="Home Address"
                                                                           value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label" for="input-city">City</label>
                                                                    <input type="text" id="input-city"
                                                                           class="form-control form-control-alternative"
                                                                           placeholder="City" value="New York">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group focused">
                                                                    <label class="form-control-label"
                                                                           for="input-country">Country</label>
                                                                    <input type="text" id="input-country"
                                                                           class="form-control form-control-alternative"
                                                                           placeholder="Country"
                                                                           value="United States">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="input-country">Postal code</label>
                                                                    <input type="number" id="input-postal-code"
                                                                           class="form-control form-control-alternative"
                                                                           placeholder="Postal code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <!-- Description -->
                                                    <h6 class="heading-small text-muted mb-4">About me</h6>
                                                    <div class="pl-lg-4">
                                                        <div class="form-group focused">
                                                            <label>About Me</label>
                                                            <textarea rows="4"
                                                                      class="form-control form-control-alternative"
                                                                      placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
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
        </div>

        <div class="card mt-5 border-0 text-white bg-gradient-info">
            <div class="card-body">
                <div class="card-title display-4 ">
                    Event Signups
                </div>


                @foreach($events->all() as $event)
                    <div class="card m-2 text-dark shadow">

                        <div class="card-body">
                            <h3 class="card-title" id="card{{$event->id}}">
                                {{$event->name}}
                                <div class="badge {{($event->status == 1) ? 'badge-success' : 'badge-danger'}}">
                                    {{($event->status == 1) ? 'Active' : 'Inactive'}}</div>
                            </h3>

                            <div class="accordion" id="accordionExample{{$event->id}}">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne{{$event->id}}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                View Attendance
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne{{$event->id}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample{{$event->id}}">
                                        <div class="card-body">
                                            @foreach ($attendances = $event->attendance()->paginate(5, ['*'],'event'.$event->id.'') as $attendance)
                                                <div class="card shadow-lg--hover">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <img style="object-fit: cover;"
                                                                     class="shadow avatar avatar-lg rounded-circle"
                                                                     src="{{asset('/storage/'.$attendance->user->profilepic->location)}}"
                                                                     alt="">
                                                                &nbsp;
                                                                {{$attendance->user->firstname .' '. $attendance->user->lastname}}

                                                            </div>
                                                            <div class="col-2 text-right">
                                                                <div class="badge {{($attendance->status == 1) ? 'badge-success' : 'badge-danger'}}">
                                                                    {{($attendance->status == 1) ? 'Attending' : 'Cancelled'}}</div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card-footer">
                                            {{$attendances->fragment('card'.$event->id.'')->links()}}
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                @endforeach
            </div>
        </div>

    @endif
    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    var min = $('#min').datepicker("getDate");
                    var max = $('#max').datepicker("getDate");
                    var startDate = new Date(data[3])
                    if (min == null && max == null) {
                        return true;
                    }
                    if (min == null && startDate <= max) {
                        return true;
                    }
                    if (max == null && startDate >= min) {
                        return true;
                    }
                    if (startDate <= max && startDate >= min) {
                        return true;
                    }
                    return false;
                }
            );


            $("#min").datepicker({
                onSelect: function () {
                    table.draw();
                }, changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy"
            });
            $("#max").datepicker({
                onSelect: function () {
                    table.draw();
                }, changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy"
            });

            var table = $('#memberdashboard').DataTable({
                initComplete: function () {
                    var column = this.api().column(4);
                    var select = $('<select class="form-control form-control-sm"><option value="">Show All</option></select>')
                        .appendTo($('#cityfilter').empty().text('City: '))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();

                        });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });

                    var column2 = this.api().column(5);
                    var select2 = $('<select class="form-control form-control-sm"><option value="">Show All</option></select>')
                        .appendTo($('#countryfilter').empty().text('Country: '))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column2
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();

                        });
                    column2.data().unique().sort().each(function (d, j) {
                        select2.append('<option value="' + d + '">' + d + '</option>');
                    });

                    var column3 = this.api().column(6);
                    var select3 = $('<select class="form-control form-control-sm"><option value="">Show All</option></select>')
                        .appendTo($('#statusfilter').empty().text('Status: '))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column3
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();

                        });
                    column3.data().unique().sort().each(function (d, j) {
                        select3.append('<option value="' + d + '">' + d + '</option>');
                    });
                    var column4 = this.api().column(7);
                    var select4 = $('<select class="form-control form-control-sm"><option value="">Show All</option></select>')
                        .appendTo($('#genderfilter').empty().text('Gender: '))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column4
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();

                        });
                    column4.data().unique().sort().each(function (d, j) {
                        select4.append('<option value="Male">Male</option>');
                        select4.append('<option value="Female">Female</option>');
                    });
                },
                pagingType: 'numbers',
                lengthChange: false,
                buttons: {
                    buttons: [
                        {extend: 'print', className: 'btn btn-info'},
                        {extend: 'pdf', className: 'btn btn-success '}
                    ]
                },
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
                order: [1, 'asc']
            });

            table.buttons().container().appendTo('#memberdashboard_wrapper .col-md-6:eq(0)');

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
    </script>
@endsection


