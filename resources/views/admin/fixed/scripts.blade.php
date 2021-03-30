
<!--region TEMPLATES CORE JS FILES AND PLUGINS-->
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/black-dashboard.min.js?v=1.0.0') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!--endregion-->

  <!--region MY SCRIPTS-->
  <script>
      const token = $('meta[name="csrf-token"]').attr('content');
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': token
          }
      });
  </script>
  <script type="text/javascript">
      const baseUrlAdmin = "{{url('/admin')}}";
      const publicFolder = "{{asset('/')}}";
  </script>
  <!--endregion-->


<!--region UNNECESSARY SCRIPTS-->
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
{{--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  {{--    <script src="{{ asset('assets/demo/demo.js') }}"></script>--}}

{{--  <script>--}}
{{--    // $(document).ready(function() {--}}
{{--      // Javascript method's body can be found in assets/js/demos.js--}}
{{--      // demo.initDashboardPageCharts();--}}

{{--    // });--}}
{{--  </script>--}}
{{--  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>--}}
{{--  <script>--}}
{{--    window.TrackJS &&--}}
{{--      TrackJS.install({--}}
{{--        token: "ee6fab19c5a04ac1a32a645abde4613a",--}}
{{--        application: "black-dashboard-free"--}}
{{--      });--}}
{{--  </script>--}}
{{--  <script src="{{asset('assets/js/myAdmin.js')}}"></script>--}}

<!--endregion-->
