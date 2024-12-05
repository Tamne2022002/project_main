<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="header">
    <div class="header-top">
        <img src="{{$banner[0]->photo_path}}" alt="banner" width="100%">
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="flex-header-bottom">
                <div class="header-bottom-logo peShiner">
                    <a href="{{route('index')}}">
                        <div class="main-logo" style="margin-top: 10px">
                            <img src="{{ CHomeController::settings()->logo_path }}" alt="TP-Store" width="200px" height="200px">
                        </div>
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
                            <div id="loading" class="search-loading loading-spinner">Đang tìm kiếm...</div>
                        </div> 
                    </div>
                </div>
                <div class="header-bottom-end">
                    <a class="header-bottom-item" href="{{route('user.cart')}}">
                        <i class="fa-regular fa-cart-shopping"></i>
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
