<?php
use App\Http\Controllers\Clients\IndexController;
?>
<div class="footer">
    <div class="footer-article py50 ">
        <div class="wrap-content">
            <div class="footer-row d-flex justify-content-between align-items-center">
                <div class="footer-news">
                    <div class="footer-company-name">
                        {{ IndexController::settings()->name }}
                    </div>
                    <div class="footer-info-item">
                        <span>Điện thoại: <a href="tel: {{ IndexController::settings()->phone }}">
                                {{ IndexController::settings()->phone }}</a></span>
                    </div>
                    <div class="footer-info-item">
                        <span>Email: <a href="mailto: {{ IndexController::settings()->email }}">
                                {{ IndexController::settings()->email }}</a></span>
                    </div>
                    <div class="footer-info-item">
                        <span>Địa chỉ: {{ IndexController::settings()->address }}</span>
                    </div>
                    <div class="footer-info-item">
                        <span><a href="{{ IndexController::settings()->link_map }}" target="_blank">Xem bản
                                đồ</a></span>
                    </div>
                </div>
                <div class="footer-news">
                </div>
                <div class="footer-news">
                    <div class="footer-fanpage">
                        <div id="fb-root"></div>
                        <div class="fb-page" data-href="{{ IndexController::settings()->fanpage }}" data-tabs="timeline"
                            data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="{{ IndexController::settings()->fanpage }}" class="fb-xfbml-parse-ignore"><a
                                    href="{{ IndexController::settings()->fanpage }}">Facebook</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered ">
        <div class="wrap-content ">
            <div class="footer-copyright">Copyright © 2024 TL Bookstore. All rights reserved.
            </div>
        </div>
    </div>
    <div class="footer-map">
        <div class="footer-map-iframe">
            {!! IndexController::settings()->iframe_map !!}
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
