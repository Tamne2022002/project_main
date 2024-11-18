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
            <li class="menu-main-li">
                <a href="{{ route('product') }}" title="Danh mục sản phẩm">
                     Sản phẩm
                </a>
            </li>
            <li class="menu-main-li">
                <a href="{{ route('news') }}" title="Tin tức & sự kiện">
                    Tin tức & sự kiện
                </a>
            </li>
            <li class="menu-main-li">
              
                <a href="{{route('user.info')}}" title="Thông tin tài khoản">
                    Tài khoản
                </a>
               
            </li>
            
        </ul>
    </div>
</div>