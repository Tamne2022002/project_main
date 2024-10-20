<?php
use App\Http\Controllers\Clients\IndexController;

?>

 

@isset($productOutstanding)
    @if (!$productOutstanding->isEmpty())
        {{-- Product Oustanding --}}
        <div class="wrap-product-outstanding py50">
            <div class="wrap-content">
                <div class="title-main title-left">
                    <span>Sản phẩm nổi bật</span>
                </div>
                <div class="slick-product-outstanding-cover">
                    <div class="slick-product-outstanding">
                        @foreach ($productOutstanding as $v)
                            <div class="product-outstanding-item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="product" data-aos="zoom-in-up">
                                    <div class="box-product text-decoration-none">
                                        <div class="position-relative overflow-hidden  ">
                                            <a class="pic-product " href="{{ route('product.detail', ['id' => $v->id]) }}"
                                                title="Sản phẩm">
                                                <div class="pic-product-img scale-img hover_light">
                                                    @if ($v->product_photo_path)
                                                        <img class="w-100" src="{{ $v->product_photo_path }}"
                                                            alt="{{ $v->name }}">
                                                    @else
                                                        <img class="w-100" src="{{ asset('assets/noimage.jpg') }}"
                                                            alt="{{ $v->name }}">
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <div class="name-product"><a class="text-split-2"
                                                    href="{{ route('product.detail', ['id' => $v->id]) }}"
                                                    title="{{ $v->name }}">{{ $v->name }}</a>
                                            </div>
                                                                                        <div class="price-product">
                                                @if ($v->discount)
                                                    <div class="price-new">
                                                        @formatmoney($v->sale_price)
                                                    </div>
                                                    <div class="price-old">
                                                        @formatmoney($v->regular_price)
                                                    </div>
                                                    <div class="discount">
                                                        {{ $v->discount }}%
                                                    </div>
                                                @else
                                                    @if ($v->regular_price)
                                                        <div class="price-new">
                                                            @formatmoney($v->regular_price)
                                                        </div>
                                                    @else
                                                        <div class="price-new">
                                                            Liên hệ
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endisset
@isset($category_first)
    @if (!$category_first->isEmpty())
        @foreach ($category_first as $v)
            <div class="wrap-product-list-cat product-from-ajax">
                <div class="wrap-content">
                    <div class="title-main categoryfirst">
                        <span>{{ $v->name }}</span>
                    </div>
                    <div class="flex-categorysecond">
                        @foreach ($v->children()->where('outstanding', 1)->where('status', 1)->whereNull('deleted_at')->get() as $category_second)
                            <div class="categorysecond" data-idf="{{ $v->id }}"
                                data-ids="{{ $category_second->id }}"
                                data-url="{{ route('get-category-data', ['categoryId' => $category_second->id]) }}">
                                {{ $category_second->name }}
                            </div>
                        @endforeach
                    </div>
                    <div class="paging-product-category-style paging-product-category-{{ $v->id }}"
                        data-route="{{ route('add_index.cart') }}">
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endisset
@isset($publisher)
    @if (!$publisher->isEmpty())
        {{-- Publisher --}}
        <div class="wrap-publisher">
            <div class="wrap-content">
                <div class="title-main title-left">
                    <span>
                        Thương hiệu sản phẩm
                    </span>
                </div>
                <div class="slick-publisher-ex">
                    @foreach ($publisher as $v)
                        <div class="publisher-box-ex">
                            <a href="{{ route('publisher.publisherproduct', ['id' => $v->id]) }}"
                                title="{{ $v->name }}">
                                <div class="publisher-ex-img">
                                    <img class="w-100" src="{{ $v->photo_path }}" alt="{{ $v->name }}">
                                </div>
                                <div class="publisher-ex-name text-split-2">
                                    {{ $v->name }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset
@isset($news)
    @if (!$news->isEmpty())
        {{-- News --}}
        <div class="wrap-news-ex py50">
            <div class="wrap-content">
                <div class="title-main title-left">
                    <span>Tin tức & sự kiện</span>
                </div>
                <div class="slick-news-ex">
                    @foreach ($news as $v)
                        <div class="news-box-ex" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ route('news.detail', ['id' => $v->id]) }}">
                                <div class="news-box-ex-img scale-img hover_light">
                                    <img src="{{ $v->photo_path }}" alt="{{ $v->name }}" class="w-100">
                                </div>
                                <div class="news-box-ex-info">
                                    <div class="news-box-ex-name text-split-2"> {{ $v->name }}</div>
                                    <div class="news-box-ex-desc text-split-3">{!! $v->description !!}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset
 
