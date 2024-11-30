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
                @foreach ($category_child as $cate)
                    <li class="category-drop-item">
                        <span class="category-drop-item-inner">
                            <h3 class="category-drop-name text-spit transition">{{$cate->name}}</h3>
                            <ul class="sub-category-drop-right">
                                @foreach($cate->children()->where('featured', 1)->where('status', 1)->whereNull('deleted_at')->get() as $sub_cate)
                                    <a href="{{route('categoryid.categoryidproduct', ['id' => $sub_cate->id])}}">
                                        <li class="sub-category-drop-item">
                                            <span class="sub-category-drop-name">{{$sub_cate->name}}</span>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>