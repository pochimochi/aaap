<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{url('/home')}}">
                <img src="{{asset('images/logos/logowhite.png')}}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{url('/home')}}">
                                <img src="{{asset('images/logos/logo.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
                    @if(session('user'))

                        <li class="nav-item dropdown">
                            <a href="" class="nav-link" data-toggle="dropdown" href="" role="button">
                                <i class="ni ni-collection d-lg-none"></i>
                                <span class="nav-link-inner--text">Events</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{URL::to('/member/events')}}"
                                   class="dropdown-item">List</a>
                                <a href="{{action('AttendanceController@index')}}"
                                   class="dropdown-item">Joined Events</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                                <i class="ni ni-collection d-lg-none"></i>
                                <span class="nav-link-inner--text">Announcements</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{URL::to('/member/announcements/type', '1')}}"
                                   class="dropdown-item">General</a>
                                <a href="{{URL::to('/member/announcements/type', '0')}}"
                                   class="dropdown-item">Special</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL::to('/member/articles')}}" class="nav-link">
                                <i class="ni ni-ui-04 d-lg-none"></i>
                                <span class="nav-link-inner--text">Articles</span>
                            </a>
                        </li>
                    @endif
                    @if(!session('user'))
                        <li class="nav-item">
                            <a href="#about" class="nav-link">
                                <i class="ni ni-ui-04 d-lg-none"></i>
                                <span class="nav-link-inner--text">About</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">
                                <i class="ni ni-ui-04 d-lg-none"></i>
                                <span class="nav-link-inner--text">Contact</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#faqs" class="nav-link">
                                <i class="ni ni-ui-04 d-lg-none"></i>
                                <span class="nav-link-inner--text">FAQs</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                                <i class="ni ni-collection d-lg-none"></i>
                                <span class="nav-link-inner--text">Contents</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="" class="dropdown-item">Events</a>
                                <a href="" class="dropdown-item">Announcements</a>
                                <a href="" class="dropdown-item">Articles</a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{URL::to('/login')}}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><i class="ni ni-key-25"></i></span>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL::to('/register')}}" class="nav-link">
                                <i class="ni ni-ui-04 d-lg-none"></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{URL::to('/logout')}}" class="btn btn-neutral btn-icon"><span
                                        class="btn-inner--icon"></span>
                                <span class="nav-link-inner--text">Log Out</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>