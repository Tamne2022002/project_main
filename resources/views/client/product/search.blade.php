@extends('client.layouts.index')

@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                {{ $pageName }}
            </span>
        </div>
        <div class="content-main">
            <div class="form-input-search">
                <form action="" method="GET">
                    @csrf
                    <div class="input-group">
                        <select name="search_type" class="search-type form-control">
                            <option value="product">Sản phẩm</option>
                            <option value="news">Tin tức</option>
                        </select>
                        <input class="search-keyword form-control border-end-0 border"
                            value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                            placeholder="Nhập từ khóa để tìm kiếm">
                        <span class="search-button-action input-group-append">
                            <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>

            <div class="page-result-search mt-4">
                <div class="result-productpage">
                    <div class="grid-product-internal mt-3 mb-3">
                        @isset($searchresultproduct)
                            @if (!$searchresultproduct->isEmpty())
                                @foreach ($searchresultproduct as $v)
                                    <div class="product-item" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="product" data-aos="zoom-in-up">
                                            <div class="box-product text-decoration-none">
                                                <div class="position-relative overflow-hidden  ">
                                                    <a class="pic-product "
                                                        href="{{ route('product.detail', ['id' => $v->id]) }}" title="Sản phẩm">
                                                        <div class="pic-product-img scale-img hover_light">
                                                            <img class="w-100"
                                                                src="{{ $v->product_photo_path ? $v->product_photo_path : asset('assets/noimage.jpg') }}"
                                                                alt="{{ $v->name }}">
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
                                                    <!--<div class="product-button text-center">
                                                        <div class="product-button-cart btn rounded btn-success mb-1 w-100 ">
                                                            <a href="{{ route('add_index.cart', ['id' => $v->id, 'quantity' => 1]) }}"
                                                                class="product-button-cart-action button-addnow text-light add-to-cart"
                                                                data-route="{{ route('add_index.cart', ['id' => $v->id, 'quantity' => 1]) }}"><i
                                                                    class="fa-solid fa-cart-circle-plus me-1"></i>Thêm vào giỏ
                                                                hàng</a>
                                                        </div>
                                                        <div class="product-button-cart-buy btn rounded btn-primary  w-100 ">
                                                            <a href="#"
                                                                class="product-button-cart-action add-to-cart text-light"
                                                                data-route="{{ route('add_index.cart', ['id' => $v->id, 'quantity' => 1]) }}"
                                                                data-act="buynow" data-direct="{{ route('user.cart') }}"><i
                                                                    class="fa-solid fa-basket-shopping-simple me-1"></i>Mua
                                                                ngay</a>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning w-100 gr-100">
                                    <strong>Không tìm thấy kết quả nào cho từ khóa của bạn.</strong>
                                </div>
                            @endif
                        @endisset
                    </div>
                    @if ($searchresultproduct)
                        {{ $searchresultproduct->withQueryString()->links('pagination::bootstrap-5') }}
                    @endif
                </div>
                <div class="result-news-page">
                    <div class="grid-news-internal mt-3 mb-3">
                        @isset($searchresultnews)
                            @if (!$searchresultnews->isEmpty())
                                @foreach ($searchresultnews as $v)
                                    <div class="news-box-in" data-aos="fade-up" data-aos-duration="1000">
                                        <a href="{{ route('news.detail', ['id' => $v->id]) }}">
                                            <div class="news-box-in-img scale-img hover_light">
                                                <img src="{{ $v->photo_path }}" alt="{{ $v->name }}" class="w-100">
                                            </div>
                                            <div class="news-box-ex-info">
                                                <div class="news-box-ex-name text-split-2"> {{ $v->name }}</div>
                                                <div class="news-box-ex-desc text-split-3">{!! $v->description !!}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning w-100 gr-100">
                                    <strong>Không tìm thấy kết quả nào cho từ khóa của bạn.</strong>
                                </div>
                            @endif
                        @endisset
                    </div>
                    @if ($searchresultnews)
                        {{ $searchresultnews->withQueryString()->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
