<header class="header-section border fixed-top bg-light navigation">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
                        <li><i class="fa fa-envelope"></i> info.sona@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            @foreach ($socialMedias as $social)
                                <a href="{{ $social->path }}"><i class="{{ $social->icon }}"></i></a>
                            @endforeach
                        </div>
                        <a href="{{ route('rooms.index') }}" class="bk-btn">Booking Now</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                @foreach ($menu as $link)
                                    <li class="
                                        @if(request()-> routeIs($link->url))
                                            active
                                        @endif ">
                                    @if(session()->has("user") && $link->name != 'Login' && $link->name != 'Register')
                                        <a href="{{ route($link->url) }}">{{ $link->name }}</a>
                                    @elseif(!session()->has("user"))
                                        <a href="{{ route($link->url) }}">{{ $link->name }}</a>
                                    @endif

                                @endforeach
                                    @if(session()->has("user"))

                                        <li><a class="text-secondary" href="{{ route("logoutUser") }}" id="logOut">Logout</a></li>
                                        <div class="float-right ml-4">
                                            <li>
                                                <img width="30" height="30" src="{{ asset('assets/img/profileUser.png') }}" alt="profilePhoto" />
                                            </li>
                                            <li><a class="font-weight-bold text-black" href = "{{ route("profile") }}"> {{ (session()->get("user")->firstname) ." ". session()->get("user")->lastname}}  </a></li>
                                        </div>
                                    @endif

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

