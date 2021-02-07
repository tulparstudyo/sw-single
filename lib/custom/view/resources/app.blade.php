<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', techie_get_language()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="content-language" content="{{ str_replace('_', '-', techie_get_language()) }}">
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
  <link href="{{ techie_url('assets/vendor/aos/aos.css') }}?_v=0.0.1" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ techie_url('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ techie_url('theme.css') }}?_v=0.0.3" rel="stylesheet">
  <script src="{{ techie_url('assets/vendor/jquery/jquery.min.js') }}"></script>

    
</head>
<body>
<!-- ::::::  Start Header Section  ::::::  -->
<?php if(\Request::route()->getName()=='aimeos_home'){?>
    <header id="header" class="fixed-top">
<?php } else { ?>
    <header id="header" class="fixed-top header-inner-pages">
<?php } ?>
<?php  echo techie_header(); ?>
@yield('aimeos_head')
</header>

  <main id="main">
@yield('content')
@yield('aimeos_body')
  </main>
<?php  echo techie_footer(); ?>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <script src="{{ techie_url('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ techie_url('assets/vendor/aos/aos.js') }}"></script>
  <!-- Template Main JS File -->
@yield('aimeos_scripts')
  <!--<script src="{{ asset('packages/swordbros/shop/themes/aimeos.js') }}"></script>-->
<script src="{{ techie_url('assets/js/main.js') }}"></script>
<script type="text/javascript" src="/public/js/swordbros.js"></script>
<?php if(\Request::route()->getName()=='aimeos_home'){?>
<script type="text/javascript" src="{{ asset( 'packages/aimeos/shop/themes/aimeos-detail.js' ) }}"></script>
<?php }?>
<script src="{{ techie_url('theme.js') }}"></script> 

</html>
