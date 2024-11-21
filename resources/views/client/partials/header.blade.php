<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="header">
    {{-- <div class="header-top">
        <div class="wrap-content">
            <div class="flex-header-top">
                <div class="header-top-address w-25 text-light">
                    <marquee behavior="" direction="">
                        {{ CHomeController::settings()->description }}
                    </marquee>
                </div>
                <div class="header-top-auth">
                    @if (Auth::guard('member')->check() )
                        <div class="menu-bottom-account-positon">
                            <a href="{{ route('user.info') }}">
                                <div class="menu-bottom-account">
                                    <div class="menu-bottom-account-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div> 
                                    <div class="menu-bottom-account-text">
                                        Xin chào, 
                                        <span class="header-user-name">{{ CHomeController::getUserInfo()->name }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="menu-bottom-account-positon">
                            <a href="{{ route('user.login') }}">
                                <div class="menu-bottom-account">
                                    <div class="menu-bottom-account-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="menu-bottom-account-text">
                                        Tài khoản
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>  
            </div>
        </div>
    </div> --}}
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="flex-header-bottom">
                <div class="header-bottom-logo peShiner" width="20px">
                    <a href="{{route('index')}}">
                        {{-- <img src="{{ CHomeController::settings()->logo_path }}" alt> --}}
                        <img src="../index/imgs/logo.png" alt="tpstore-logo" width="250px" height="250px">
                    </a>
                </div>
                <div class="header-bottom-searchbox ">
                    <div class="search-box">
                        <form class="d-flex"  method="GET">
                            <div class="search-box-group  d-flex" >
                                    <input type="text" id="search-input" class="form-control" placeholder="Tìm kiếm sản phẩm" autocomplete="off">
                                    <button class="btn btn-primary" type="submit">
                                        <div class="search-icon">
                                            <i class="fa-regular fa-magnifying-glass"></i>
                                        </div>
                                    </button>
                            </div>
                        </form>
                        
                        <div id="search-result" class="search-result-list">
                            <div id="loading" class="search-loading">Đang tìm kiếm...</div>
                        </div> 
                    </div>
                </div>
                <div class="header-bottom-end">
                    <a class="header-bottom-item" href="{{route('user.cart')}}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h6>Giỏ hàng</h6>
                    </a>
                    <a class="header-bottom-item" href="{{route('user.info')}}">
                        <i class="fa-solid fa-user"></i>
                        <h6>Tài khoản</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
