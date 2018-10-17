@extends('layouts.master.admin')
@section('sidenav')
    @include('layouts.master.nav')
@endsection
@section('pagetitle')
    Home
@endsection
@section('header')
    <div class="header bg-gradient-info  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            @if (session('user')['role_id'] == 3)
                <!-- Widgets  -->
                    <div class="card-columns border-0">
                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-1">
                                            <i class="pe-7f-cash"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">{{\App\Announcements::count()}}</span>
                                                </div>
                                                <div class="stat-heading"># of Announcements</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-2">
                                            <i class="pe-7f-cart"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">{{\App\Event::count()}}</span></div>
                                                <div class="stat-heading"># of Events</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="pe-7f-browser"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">{{\App\Articles::count()}}</span></div>
                                                <div class="stat-heading"># of Articles</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <i class="pe-7f-users"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">{{\App\User::count()}}</span></div>
                                                <div class="stat-heading">Total Users</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <i class="pe-7f-users"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span
                                                            class="count">{{\App\AuditLog::all()->where('description', 'Logged In')->count()}}</span>
                                                </div>
                                                <div class="stat-heading">No. of Logins</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Widgets End -->
            @endif
                <!-- Card stats -->

            </div>
        </div>
    </div>
@endsection
@section('content')






@endsection


