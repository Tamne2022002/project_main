<?php
use App\Http\Controllers\Client\CHomeController;
?>
<div class="container-menu-cate">
    <div class="category-drop-menu">
        
            <div class="category-drop-title">
                <a class="category-drop-title-inner">
                    <span>
                        <!-- <img src=""> -->
                        <i class="fa-solid fa-bars" style="color:#fff"></i>
                    </span>
                    Danh mục sản phẩm
                </a>
            </div>
        
        <div class="category-drop-main">
            <ul class="category-drop-list">
                @foreach ($category_first as $cate)
                    <li class="category-drop-item">
                        <a class="category-drop-item-inner" href="">
                            <h3 class="category-drop-name text-spit transition">{{$cate->name}}</h3>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>