<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <div class="flex-header-top">
                <div class="header-top-address w-25 text-light">
                    <marquee behavior="" direction="">
                        {{ CHomeController::settings()->description }}
                    </marquee>
                </div>
                <div class="header-top-auth">
                    @if (Auth::guard('member')->check())
                        <div class="menu-bottom-account-positon">
                            <a href="{{ route('user.info') }}">
                                <div class="menu-bottom-account">
                                    <div class="menu-bottom-account-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="menu-bottom-account-text">
                                        Xin chào, {{ CHomeController::getUserInfo()->name }}
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
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="flex-header-bottom">
                <div class="header-bottom-logo peShiner" width="20px">
                    <img src="{{ CHomeController::settings()->logo_path }}" alt>
                    {{-- <img src="../index/imgs/logo.png" alt="tpstore-logo"> --}}
                </div>
                <div class="header-bottom-searchbox ">
                    <div class="search-box d-flex">
                        <!-- <div class="searchbox-icon">
                            <span>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div> -->
                        <div class="container" style="width: 814px">
                            <form class="d-flex">
                                <input type="search" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                <button class="btn btn-primary" type="send">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-end">
                    <div class="header-bottom-item">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h6>Giỏ hàng</h6>
                    </div>
                    <div class="header-bottom-item">
                        <i class="fa-solid fa-truck"></i>
                        <h6>Đơn hàng</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
