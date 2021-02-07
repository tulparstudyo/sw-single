<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('aimeos_header')
<title>{{ techie_option('store_name') }}</title>
<!-- Vendor CSS Files --> 
<!-- Main Style CSS File -->
      <!-- Favicons -->
  <link href="{{ techie_url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ techie_url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ techie_url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ techie_url('assets/css/style.css') }}" rel="stylesheet">

    
</head>
<body>
<!-- ::::::  Start Header Section  ::::::  -->
<header>
    <?php  echo techie_header(); ?>
    @yield('aimeos_head')
    <div class="offcanvas-overlay"></div>
</header>
<!-- :::::: End Header Section ::::::  --> 
@yield('content')
@yield('aimeos_body')
<?php  echo techie_footer(); ?>
<!-- Vendor JS Files --> 
<script src="{{ techie_url('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/vendor/jquery-ui.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/vendor/bootstrap.bundle.min.js') }}"></script> 
<!-- Plugins JS Files --> 
<script src="{{ techie_url('assets/js/plugin/slick.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/jquery.countdown.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/material-scrolltop.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/price_range_script.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/in-number.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/jquery.elevateZoom-3.0.8.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/venobox.min.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/jquery.waypoints.js') }}"></script> 
<script src="{{ techie_url('assets/js/plugin/jquery.lineProgressbar.js') }}"></script> 
<script src="{{ techie_url('assets/js/main.js') }}"></script> 
    
  <!-- Favicons -->
  <link href="{{ techie_url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ techie_url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ techie_url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ techie_url('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ techie_url('assets/css/style.css') }}" rel="stylesheet">
@yield('aimeos_scripts')
<script type="text/javascript" src="/public/js/swordbros.js"></script>
<script src="{{ techie_url('theme.js') }}"></script> 

</html>
