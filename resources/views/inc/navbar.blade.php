<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        {{-- Logo --}}
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
            {{-- Logo icon --}}<b>
            {{-- You can put here icon as well // <i class="wi wi-sunset"></i> --}}
            {{-- Dark Logo icon --}}
            <img src="{{asset('materialpro')}}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
            {{-- Light Logo icon --}}
            <img src="{{asset('materialpro')}}/assets/images/logo-icon.png" alt="homepage" class="light-logo" />
            </b>
            {{-- End Logo icon --}}
            {{-- Logo text --}}<span>
            {{-- dark Logo text --}}
            <img src="{{asset('materialpro')}}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
            {{-- Light Logo text --}}
            {{-- <img src="{{asset('materialpro')}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> --}}
        </div>
        {{-- End Logo --}}
        <div class="navbar-collapse">
            {{-- toggle and nav items --}}
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                {{-- Search --}}
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
            </ul>
            {{-- User profile and search --}}
            <ul class="navbar-nav my-lg-0">
                {{-- Profile Guest--}}
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account"></i></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <a href="{{ route('login') }}"> <i class="mdi mdi-key"></i> {{__('Login')}} </a>
                            </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}"> <i class="mdi mdi-account-plus"></i>{{__(' Register') }}</a>
                            </li>
                        @endif
                        </ul>
                    </div>
                </li>
                {{-- End Profile Guest--}}
                @else
                {{-- Comment --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- End Comment --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('materialpro')}}/assets/images/users/1.jpg" alt="user" class="profile-pic">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{asset('materialpro')}}/assets/images/users/1.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#"><i class="ti-user"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @endguest
            </ul>
            {{-- End user profile and search --}}
        </div>
    </nav>
</header>
