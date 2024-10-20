<?php
use App\Http\Controllers\Clients\IndexController;
?>
<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <div class="flex-header-top">
                <div class="header-top-address w-25 text-light">
                    <marquee behavior="" direction="">
                        {{ IndexController::settings()->description }}
                    </marquee>
                </div>
                <div class="header-top-social">
                    <div class="flex-social">
                        <div class="social-item hvr-float-shadow">
                            <a href="https://www.facebook.com/profile.php?id=61561027564170" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
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
                <div class="header-bottom-logo peShiner" width="">
                    <img src="{{ IndexController::settings()->logo_path }}" alt>
                </div>
                <div class="header-bottom-banner ">
                    
                </div>
                <div class="header-bottom-contact">
                    <div class="flex-header-bottom-contact">
                        <div class="header-bottom-contact-img">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="header-bottom-contact-info">
                            <div class="header-bottom-contact-text">
                                Hotline liên hệ:
                            </div>
                            <div class="header-bottom-contact-num">
                                <a
                                    href="tel:{{ IndexController::settings()->phone }}">{{ IndexController::settings()->phone }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
