<?php
use App\Http\Controllers\Clients\IndexController;
?>
<link href="{{ IndexController::settings()->favicon_path }}" rel="icon" type="image/x-icon">

<link href="{{ asset('index/css/effect.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/fontawesome640/all.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/simplenotify/simple-notify.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
@yield('css')
