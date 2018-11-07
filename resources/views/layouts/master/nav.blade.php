<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="">
            <img src="{{asset('images/logos/logo.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{url('home')}}">
                            <img src="{{asset('images/logos/logo.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">

                @if(session('role') == 1)
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/adminMaintenance')}}"><i
                                    class="fa fa-user-check text-success"></i>Administrators</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/members')}}"><i
                                    class="fa fa-users text-primary"></i>Members</a></li>
                @elseif(session('role') == 2)
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('writer/articles/create')}}"><i
                                    class="ni ni-book-bookmark text-teal"></i>Articles</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('writer/newsletter')}}"><i
                                    class="ni ni-notification-70 text-warning"></i>Newsletters</a></li>
                @elseif(session('role') == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/home')}}"><i
                                    class="menu-icon fa fa-laptop text-blue"></i>Dashboard</a>
                    <li class="nav-item"><a class="nav-link" href="{{action('EventController@index')}}"><i
                                    class="ni ni-square-pin text-red"></i>Events</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/contentmanager/announcements/create')}}"><i
                                    class="menu-icon fa fa-bullhorn text-teal"></i>Announcements</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{action('AuditLogController@index')}}"><i
                                    class="menu-icon fa fa-address-book text-success"></i>System Logs</a></li>
                @endif
                <li>
                    <hr class="my-3">
                </li>
                @if(!session()->exists('user'))
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/login')}}"><i
                                    class="menu-icon fa fa-sign-in"></i>Login</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/register')}}"><i
                                    class="menu-icon fa fa-registered"></i>Register</a></li>
                @else

                    {{--<li><a href="{{URL::to('/profile')}}"><i class="menu-icon fa fa-laptop"></i>Profile</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/logout')}}"><i
                                    class="ni ni-button-power text-red"></i>Logout</a></li>
                @endif

                {{-- <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                <ul class="sub-menu children dropdown-menu">

                </ul>
            </li>--}}


            </ul>

        </div>
    </div>
</nav>