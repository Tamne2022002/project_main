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
                    <div class="flex-auth">
                            <a href="#" style="border-right:2px solid #ddd">Đăng ký</a>
                            <a href="#">Đăng nhập</a>
                            <i class="fa-regular fa-circle-user" ></i>
                        
                        <!-- <div class="social-item hvr-float-shadow">
                            <a href="https://www.facebook.com/profile.php?id=61561027564170" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div> -->
                        <!--<div class="social-item hvr-float-shadow">
                            <a href="" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <div class="social-item hvr-float-shadow">
                            <a href="" target="_blank">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </div>
                        <div class="social-item hvr-float-shadow">
                            <a href="" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <div class="flex-header-bottom">
                <div class="header-bottom-logo peShiner" width="20px">
                    <!-- <img src="{{ CHomeController::settings()->logo_path }}" alt> -->
                     <img src="../index/imgs/logo.png" alt="tpstore-logo">
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
