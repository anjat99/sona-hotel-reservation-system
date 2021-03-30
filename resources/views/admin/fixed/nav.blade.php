<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->

    <div class="sidebar-wrapper">
{{--      <div class="logo">--}}
{{--        <a href="javascript:void(0)" class="simple-text logo-mini">--}}
{{--          CT--}}
{{--        </a>--}}
{{--        <a href="javascript:void(0)" class="simple-text logo-normal">--}}
{{--          Creative Tim--}}
{{--        </a>--}}
{{--      </div>--}}
      <ul class="nav">
            @foreach ($adminMenu as $link)
                <li class="
                   @if(request()-> routeIs($link->url))
                        active
                    @endif ">
                    @if(session()->has("user"))
                        <a href="{{ route($link->url) }}">
                            <i class="tim-icons {{ $link->icon }}"></i>
                            <p>{{ $link->name }}</p>
                        </a>
                    @endif
                </li>
            @endforeach
      </ul>
    </div>
  </div>

