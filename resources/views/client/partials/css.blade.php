<?php
use App\Http\Controllers\Client\CHomeController;
?>
<link href="{{ CHomeController::settings()->favicon_path }}" rel="icon" type="image/x-icon">

<link href="{{ asset('index/css/effect.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/fontawesome640/all.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/simplenotify/simple-notify.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/style.css') }}" rel="stylesheet">

<link href="{{ asset('index/css/main.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
@yield('css')
