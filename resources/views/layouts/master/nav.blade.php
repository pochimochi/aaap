<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="">
            <img src="{{asset('images/logos/logo.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    @if(!session()->exists('user'))
                        <a class="dropdown-item" href="{{URL::to('/login')}}"><i class="menu-icon fa fa-sign-in"></i>Login</a>

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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="./assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li  class="nav-link">Menu</li><!-- /.menu-title -->

                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/home')}}"><i
                                class="menu-icon fa fa-home text-blue"></i>Home</a>

                @if(session('role') == 1)
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/adminMaintenance')}}"><i class="menu-icon fa fa-users"></i>Administrators</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/members')}}"><i class="menu-icon fa fa-user"></i>Members</a></li>

                @elseif(session('role') == 2)
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('writer/articles')}}"><i
                                    class="menu-icon fa fa-book"></i>View Articles</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('writer/articles/create')}}"><i
                                    class="menu-icon fa fa-plus-circle"></i>Create an Article</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('writer/newsletter')}}"><i
                                    class="ni ni-notification-70"></i>Newsletters</a></li>
                @elseif(session('role') == 3)
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/contentmanager/event')}}"><i class="menu-icon fa fa-calendar-check-o"></i>Event</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/contentmanager/announcements/create')}}"><i
                                    class="menu-icon fa fa-bookmark"></i>Announcements</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{action('AuditLogController@index')}}"><i class="menu-icon fa fa-address-book"></i>Logs</a></li>
                @endif
                <li>
                    <hr class="my-3">
                </li>
                @if(!session()->exists('user'))
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/login')}}"><i class="menu-icon fa fa-sign-in"></i>Login</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/register')}}"><i class="menu-icon fa fa-registered"></i>Register</a></li>
                @else

                    {{--<li><a href="{{URL::to('/profile')}}"><i class="menu-icon fa fa-laptop"></i>Profile</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{URL::to('/logout')}}"><i class="ni ni-button-power text-red"></i>Logout</a></li>
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