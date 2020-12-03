<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LR-EC Admin Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('public/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/admin_style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/css/admin_demostyle.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
        
       @include('backend.admin.partials.nav') 

      <div class="container-fluid page-body-wrapper">
        @include('backend.admin.partials.left_sidebar') 
        <!-- partial -->
        @yield('content')

      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('public/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('public/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('public/js/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>

    <!-- endinject -->
    <!-- Plugin js for this page-->
    {{--<script src="{{ asset('public/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>--}}
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('public/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('public/js/shared/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('public/js/demo_1/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
  </body>
</html>