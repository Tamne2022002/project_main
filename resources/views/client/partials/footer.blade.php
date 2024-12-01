<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="footer">
    <div class="footer-article py50 ">
        <div class="wrap-content">
            <div class="footer-row d-flex justify-content-between align-items-center">
                <div class="footer-news">
                    <div class="footer-inf align-items-center">
                        <div class="footer-company-name">
                            {{ CHomeController::settings()->name }}
                        </div>
                        <div class="footer-info-item">
                            <span>Điện thoại: <a href="tel: {{ CHomeController::settings()->phone }}">
                                    {{ CHomeController::settings()->phone }}</a></span>
                        </div>
                        <div class="footer-info-item">
                            <span>Email: <a href="mailto: {{ CHomeController::settings()->email }}"> 
                                    {{ CHomeController::settings()->email }}</a></span>
                        </div>
                        <div class="footer-info-item">
                            <span>Địa chỉ: {{ CHomeController::settings()->address }}</span>
                        </div>
                        <div class="footer-info-item">
                            <span><a href="{{ CHomeController::settings()->link_map }}" target="_blank">Xem bản
                                    đồ</a></span>
                        </div>
                    </div>
                    <div class="footer-social d-flex">
                        <a class="footer-social-icon" href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a class="footer-social-icon" href="#">
                            <i class="fa-brands fa-google"></i>
                        </a>
                        <a class="footer-social-icon" href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div class="footer-paymet">
                        <h6 class="footer-payment-title">Phương thức thanh toán</h6>
                        <div class="payment-list d-flex">                          
                            <img src="../index/imgs/money.png" alt="Momo" width="50px" height="50px" style="margin:8px"> 
                            <img src="../index/imgs/napas.png" alt="zalo-pay" width="50px" height="50px" style="margin:8px" > 
                            <img src="../index/imgs/vn-pay.png" alt="vn-pay" width="50px" height="50px" style="margin:8px">                            
                        </div>
                        <img src="../index/imgs/visa.png" alt="the-ngan-hang" width="100px" height="50px" style="margin:8px"> 
                    </div>
                </div>
                <div class="footer-news">
                    <div class="footer-fanpage">
                        {!! CHomeController::settings()->fanpage !!}
                    </div>            
                </div>
                <div class="footer-news">
                    <div class="footer-map">
                        <div class="footer-map-iframe">
                            {!! CHomeController::settings()->iframe_map !!}
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-powered ">
        <div class="wrap-content ">
            <div class="footer-copyright">Copyright © 2024 TP Bookstore. All rights reserved.
            </div>
        </div>
    </div>
    
</div>

<div class="scrollToTop cursor-pointer active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 0;">
        </path>
    </svg>
</div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0"></script>

