<!DOCTYPE html>
<html lang="en">

@include('admin.fixed.head')

<body class="">

    <div class="wrapper">

        @include('admin.fixed.nav')

        <div class="main-panel">

            <!-- header part -->
                @include('admin.fixed.header')
            <!--// header part -->


        @yield('content')

       <!-- footer part -->
       @include('admin.fixed.footer')
       <!--// footer part -->
        </div>

    </div>

    @include('admin.fixed.scripts')

    @yield('adminScripts')
</body>
</html>
