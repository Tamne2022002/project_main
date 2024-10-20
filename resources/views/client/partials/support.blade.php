<?php
use App\Http\Controllers\Clients\IndexController;
?>
<div class="textwidget custom-html-widget">
    <div class="show-btn-wrapper">
        <div class="zalo-chat-custom " aria-hidden="true"><img class="blink" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7124%) hue-rotate(333deg) brightness(116%) contrast(102%);" width="36" height="38"
                src="{{ asset('index/imgs/icon-calltoaction-button.svg') }}"
                alt="về {{ IndexController::settings()->name }}"
                data-lazy-src="{{ asset('index/imgs/icon-calltoaction-button.svg') }}" data-ll-status="loaded"
                class="entered lazyloaded"><noscript><img width="36" height="38" alt=""></noscript></div>
        <div class="zalo-chat-custom-no-active">
            <a id="zalo-button" href="https://zalo.me/{{ IndexController::settings()->zalo }}" target="_blank"
                class="zalo-chat-custom2" rel="noopener nofollow external noreferrer" data-wpel-link="external">
                <div>Chat Zalo</div><span class="btn-calltoaction" rel="nofollow noreferrer"><img width="50"
                        height="50" src="{{ asset('index/imgs/icon-zalo.png') }}" alt="Liên hệ Zalo"
                        data-lazy-src="{{ asset('index/imgs/icon-zalo.png') }}" data-ll-status="loaded"
                        class="entered lazyloaded"><noscript><img width="50" height="50"></noscript></span>
            </a>
            <a id="mesenger-button" href="{{ IndexController::settings()->fanpage }}" target="_blank"
                class="float-button2" rel="noopener nofollow external noreferrer" data-wpel-link="external">
                <div>Chat Facebook</div><span class="btn-calltoaction" rel="nofollow noreferrer"><img width="50"
                        height="50" src="{{ asset('index/imgs/icon-mess.png') }}  " alt="Liên hệ Facebook"
                        data-lazy-src="{{ asset('index/imgs/icon-mess.png') }} "></noscript></span>
            </a>
            <a id="call-button" href="tel:{{ IndexController::settings()->phone }}" class="float-button3"
                data-wpel-link="internal">
                <div>Gọi ngay</div><span class="btn-calltoaction btn-main"><span role="img" aria-label="phone"
                        class="anticon anticon-phone icon">
                        <img width="50" height="50" src="{{ asset('index/imgs/icon-phone.png') }}"
                            alt="Gọi ngay cho chúng tôi" data-lazy-src="{{ asset('index/imgs/icon-phone.png') }}"
                            data-ll-status="loaded" class="entered lazyloaded"><noscript> </noscript>
                    </span></span>
            </a>
            <div
                style="
    position: fixed;
    right: 100px;
    bottom: -60px;
    color: white;
    width: 450px;
    max-width: 80vw;
    text-align: right;
">
                <div class="ak-info">
                    <p>
                    <div class="welcome-text">
                        {{ IndexController::settings()->name }} xin kính
                        chào quý khách</div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <style>
        .archive.tax-product_cat .sns-content .beautiful-content {
            text-align: justify;
        }
    </style>
</div>
