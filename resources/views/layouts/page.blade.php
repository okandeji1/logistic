<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!-- Developed by Okandeji https://kandesoft.herokuapp.com -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="Developer" name="Radtech http://radtech.tech" />
  <title>{{ config('app.name', 'Coach-Admin') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet"
    href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('site/images/favicon.ico')}}' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- Navbar -->
      @include('partials.user.navbar')
      <!-- Sidebar -->
      @include('partials.user.sidebar')
      <!-- Main Content -->
      @yield('content')
      <!-- Footer -->
      @include('partials.user.footer')
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/bundles/amcharts4/core.js')}}"></script>
  <script src="{{asset('assets/bundles/amcharts4/charts.js')}}"></script>
  <script src="{{asset('assets/bundles/amcharts4/animated.js')}}"></script>
  <script src="{{asset('assets/bundles/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
</body>

<!-- Developed by Okandeji https://kandesoft.herokuapp.com -->

</html>
