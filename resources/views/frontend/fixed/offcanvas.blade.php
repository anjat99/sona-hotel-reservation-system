<div class="offcanvas-menu-overlay"></div>

<div class="canvas-open">
    <i class="icon_menu"></i>
</div>

<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
         <div class="logo mb-3">
             <a href="{{ route('home') }}">
                 <img src="{{ asset('assets/img/logo.png') }}" alt="">
             </a>
         </div>

    <nav class="mainmenu mobile-menu">
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
                    <li class="d-flex align-items-center">
                        <img width="28" height="28" src="{{ asset('assets/img/profileUser.png') }}" alt="profilePhoto" class="float-left"/>
                        <a class="font-weight-bold text-black" href = "{{ route("profile") }}"> {{ (session()->get("user")->firstname) ." ". session()->get("user")->lastname}}  </a>
                    </li>
            @endif
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        @foreach ($socialMedias as $social)
            <a href="{{ $social->path }}"><i class="{{ $social->icon }}"></i></a>
        @endforeach

    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> (+381) 345 67890</li>
        <li><i class="fa fa-envelope"></i> info.sona@gmail.com</li>
    </ul>
    <div class="header-configure-area mt-2">
        <a href="{{ route('rooms.index') }}" class="bk-btn">Booking Now</a>
    </div>
</div>
