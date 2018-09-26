<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b><img src="images/logos/logoicontest.png" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="images/logos/logotexttest.png" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">

                <li><a class="nav-link" href="{{URL::to('/event')}}">Events</a> </li>
                <li><a class="nav-link" href="{{URL::to('/article')}}">Articles</a> </li>
                <li><a class="nav-link" href="#">News</a> </li>

            </ul>
            <!-- UserController profile and search -->
            <ul class="navbar-nav my-lg-0">

                <!-- Search -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>

              @if(session()->has('user'))

                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="{{URL::to('/profile')}}"><i class="ti-user"></i> Profile</a></li>

                            <li><a href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                  @else
                      <li class="nav-item dropdown">
                          <a class="nav-link text-muted" href="{{URL::to('/login')}}" >Log in</a>

                      </li>
                @endif
            </ul>
        </div>
    </nav>
</div>