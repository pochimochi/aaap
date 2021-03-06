
    <!-- Header -->
    <header class="header">
        <div class="header-inner">
            <nav class="navbar navbar-expand-lg pt-5">
                <div class="container">
                    <a class="navbar-brand logo md-font-size font-family-secondary text-dark-gray m-0" href="/">
                        <img src="{{asset('images/logos/logotexttest.png')}}" class="logo-img" alt="logo">
                    </a>
                    <button class="navbar-toggler base-plus-font-size" type="button" data-toggle="collapse"
                            data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="base-color fa fa-bars xl-font-size"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3 mt-lg-0 sm-font-size" id="main-menu">
                        <ul class="navbar-nav ml-auto">
                            @if(session('user'))
                            <li class="nav-item dropdown">
                                <a href="{{URL::to('member/userevent')}}"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    Events
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{URL::to('/member/announcements')}}"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    Announcements
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{URL::to('/member/articles')}}"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    Articles
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="#about"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    Contact
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact"
                                   class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                    FAQ
                                </a>
                            </li>
                            @if(!session('user'))
                                <li class="nav-item m-1">
                                    <a href="{{URL::to('/login')}}"
                                       class="btn btn-md btn-secondary font-family-secondary sm-font-size px-3 font-weight__500">
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/register')}}"
                                       class="nav-link text-dark-gray font-family-secondary font-weight__700 mx-lg-2">
                                        Register
                                    </a>
                                </li>
                            @else
                                <li class="nav-item m-1">
                                    <a href="{{URL::to('/logout')}}"
                                       class="btn btn-md btn-danger font-family-secondary sm-font-size px-3 font-weight__500">
                                        Log Out
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--/ End Header -->


