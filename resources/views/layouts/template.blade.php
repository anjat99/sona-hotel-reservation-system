<!DOCTYPE html>
<html lang="en">

    @include('frontend.fixed.head')

<body>

     <!-- Page Preloder -->
     @include('frontend.fixed.preloader')


      <!-- Offcanvas Menu Section Begin -->
      @include('frontend.fixed.offcanvas')
    <!-- Offcanvas Menu Section End -->


    <!-- Header Section Begin -->
      @include('frontend.fixed.header')
    <!-- Header End -->



    <!--Content -->
    @yield('content')

   <!-- Footer Section Begin -->
  @include('frontend.fixed.footer')
   <!-- Footer Section End -->

   <!-- Search model Begin -->
   <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

  <!-- Js Plugins -->
  @include('frontend.fixed.scripts')

@yield('javascript')
</body>
</html>
