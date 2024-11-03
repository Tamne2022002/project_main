<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="menu" style="">
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
                                @if (!CHomeController::MenuCategory()->isEmpty())
                                    @foreach (CHomeController::MenuCategory() as $v)
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
                                @foreach (CHomeController::MenuCategory() as $v)
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
                <a href="" title="Tin tức & sự kiện">
                    Tài khoản
                </a>
            </li>
            
        </ul>
    </div>
</div>