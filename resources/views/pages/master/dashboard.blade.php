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
                                            <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                            <span class="h2 font-weight-bold mb-0">924</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                <i class="fa fa-bullhorn"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-warning mr-2"><i
                                                        class="fas fa-arrow-down"></i> 1.10%</span>
                                        <span class="text-nowrap">Since yesterday</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                <i class="fas fa-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                        <span class="text-nowrap">Since last month</span>
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
                        <div class="col-9 card-title display-4">
                            Members of AAAP
                        </div>
                        <div class="col-2 pull-right">
                            <a class="btn btn-warning" target="_blank" href="{{action('PrintController@MemberStatus')}}">Paid/Unpaid Members <span class="fas fa-print"></span></a>

                        </div>
                    </div>


                    <table id="example" class="table bg-white table-bordered table-condensed shadow">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Active</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->middlename}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{($user->gender == 1) ? 'Male' : 'Female'}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="badge {{($user->active == 1) ? 'badge-success' : 'badge-danger'}}">{{($user->active == 1) ? 'Active' : 'Inactive'}}</div>
                                </td>

                            </tr>
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
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$event->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                    View Attendance
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne{{$event->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample{{$event->id}}">
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
@endsection


