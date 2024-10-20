<?php
use App\Http\Controllers\Clients\IndexController;
?>
<div class="menu">
    <div class="wrap-content">
        <ul class="menu-main">
            <li class="menu-main-li">
                <a href="{{ route('index') }}" title="Trang chủ">
                    Trang chủ
                </a>
            </li>
            <li class=" menu-main-li dropdown mega-dropdown active">
                <a href="{{ route('product') }}" class="dropdown-toggle" title="Danh mục sản phẩm"
                    data-toggle="dropdown">Danh mục sản phẩm </a>
                <div class="dropdown-menu mega-dropdown-menu" style="display: block !important;">
                    <div class="flex-menu-mega">
                        <div class="menu-mega-left ht-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                @if (!IndexController::MenuCategory()->isEmpty())
                                    @foreach (IndexController::MenuCategory() as $v)
                                        <li class="">
                                            <a href="#tab-id-{{ $v->id }}" role="tab" data-toggle="tab"
                                                class="menucategory-first-title">{{ $v->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="menu-mega-right ht-tab">
                            <div class="tab-content">
                                @foreach (IndexController::MenuCategory() as $v)
                                    <div class="tab-pane" id="tab-id-{{ $v->id }}">
                                        @foreach ($v->children as $menucategorysecond)
                                            <div class="menucategory-second-tab ht-ul">
                                                <div class="menucategory-second-title">
                                                    <a
                                                        href="{{ route('categoryid.categoryidproduct', ['id' => $menucategorysecond->id]) }}">{{ $menucategorysecond->name }}</a>
                                                </div>
                                                <ul class="nav-list list-inline">
                                                    @foreach ($menucategorysecond->children as $menucategorythird)
                                                        <li><a href="{{ route('categoryid.categoryidproduct', ['id' => $menucategorythird->id]) }}"
                                                                class="menucategory-thrid-title">{{ $menucategorythird->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </li>
           
            <li class="menu-main-li">
                <a href="{{ route('news') }}" title="Tin tức & sự kiện">
                    Tin tức & sự kiện
                </a>
            </li>
            <li class="menu-main-li">
                <a href="{{ route('search') }} " title="Tìm kiếm">
                    Tìm kiếm
                </a>
            </li> 
            <li class="menu-partials ">
                <div class="flex-menu-partials">

                    <div class="menu-user-option">
                        <div class="menu-bottom-personalized">
                            <div class="flex-menu-bottom-personalized"> 
                                <div class="menu-bottom-cart-icon-position">
                                    <a href="{{ route('user.cart') }}">
                                        <div class="menu-bottom-cart">
                                            <div class="menu-bottom-cart-icon">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <div class="menu-bottom-cart-num">
                                                   @php
                                                       $cart = session()->get('cart');
                                                   @endphp
                                                   {{ isset($cart) ? count($cart) : 0 }}
                                                </div>
                                            </div>
                                            <div class="menu-bottom-cart-text">
                                                Giỏ hàng
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                @if (Auth::guard('member')->check())
                                <div class="menu-bottom-account-positon">
                                    <a href="{{route('user.info')}}">
                                        <div class="menu-bottom-account">
                                            <div class="menu-bottom-account-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div class="menu-bottom-account-text">
                                                Xin chào, {{ IndexController::getUserInfo()->first_name }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @else
                                <div class="menu-bottom-account-positon">
                                    <a href="{{route('user.login')}}">
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
                    <div class="menu-translate">
                        <div class="box-changelang">
                            <div id="google_language_translator"></div>
                            <div class="lang_current">
                                <img src="{{ asset('index/imgs/vi-flag.svg') }}" class="img-lang"
                                    alt="Google Translate">
                            </div>
                            <div class="box-showlang">
                                <div class="lang  col-lang">
                                    <a href="" data-value="vi|vi" data-active="/vi/vi" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|vi'); return false;">
                                        <img class="hvr-float vi-flag" src="{{ asset('index/imgs/vi-flag.svg') }}"
                                            alt="Việt Nam" />
                                    </a>
                                    <a href="" data-value="vi|en" data-active="/vi/en" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|en'); return false;">
                                        <img class="hvr-float eng-flag" src="{{ asset('index/imgs/en-flag.svg') }}"
                                            alt="England" />
                                    </a>
                                    <a href="" data-value="vi|ja" data-active="/vi/ja" class="changeLanguage"
                                        onclick="doGoogleLanguageTranslator('vi|ja'); return false;">
                                        <img class="hvr-float cn-flag" src="{{ asset('index/imgs/jp-flag.svg') }}"
                                            alt="Japan" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
