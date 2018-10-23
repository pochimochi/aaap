@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('header')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    @if (session('user')['role_id'] == 3)
        <!-- Widgets  -->
        <div class="container mb-5">
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                    <span class="h2 font-weight-bold mb-0">350,897</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                    <span class="h2 font-weight-bold mb-0">2,356</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-danger mr-2"><i
                                                        class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap">Since last week</span>
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
                                        <i class="fas fa-users"></i>
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

        <!-- Widgets End -->
        <div class="container-fluid">
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
                    <div class="card-title display-4">
                        Members of AAAP
                    </div>

                    <table id="myTable" class="table bg-white table-bordered table-condensed">
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


                    @foreach($events as $event)
                        <div class="card m-2 text-dark shadow">

                            <div class="card-body">
                                <h3 class="card-title">
                                    {{$event->name}}
                                    <div class="badge {{($event->status == 1) ? 'badge-success' : 'badge-danger'}}">
                                        {{($event->status == 1) ? 'Active' : 'Inactive'}}</div>
                                </h3>


                                @foreach ($attendances = $event->attendance()->paginate(5, ['*'],'event'.$event->id.'') as $attendance)
                                    <div class="card">
                                        <div class="card-body">

                                            {{$attendance->user->firstname .' '. $attendance->user->lastname}}
                                            <div class="badge {{($attendance->status == 1) ? 'badge-success' : 'badge-danger'}}">
                                                {{($attendance->status == 1) ? 'Attending' : 'Cancelled'}}</div>


                                        </div>
                                    </div>




                                @endforeach

                                    {{$attendances->links()}}


                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    @endif
@endsection


