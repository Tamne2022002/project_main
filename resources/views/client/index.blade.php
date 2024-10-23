<?php
use App\Http\Controllers\Client\CHomeController;
?>

@extends('client.layouts.index')
@section('title')
    <title>{{ CHomeController::settings()->name }}</title>
@endsection
@section('content')
@endsection
