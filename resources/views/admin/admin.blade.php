@extends('admin.layout.head')
@section('title')
    <title>Trang Quản Trị</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row d-block">
                    <div class="col-md-12 text-center d-flex justify-content-center align-items-center">
                        <h2 class=" mt-5">
                            <b>Chào mừng bạn đến với trang quản trị TP Bookstore</b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection
