@extends('client.layouts.index')

@section('title')
    <title> {{$pageName }}</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="grid-product-detail row">
            <div class="left-product-detail col-md-6 col-lg-5 mb-4">
                <div class="group-product-image">
                    <div class="slick-product-image-core">
                        <div class="product-image-core">
                            <img class="w-100" src="{{ $productDetail->product_photo_path }}"
                                alt="{{ $productDetail->name }}">
                        </div>
                        @foreach ($productDetail->productGallery as $galleryItem)
                            <div class="product-image-core">
                                <img class="w-100" src="{{ $galleryItem->photo_path }}">
                            </div>
                        @endforeach

                    </div>
                    <div class="slick-product-image-detail">
                        <div class="product-image-detail-item">
                            <div class="product-image-detail">
                                <img class="w-100" src="{{ $productDetail->product_photo_path }}"
                                    alt="{{ $productDetail->name }}">
                            </div>
                        </div>
                        @foreach ($productDetail->productGallery as $galleryItem)
                            <div class="product-image-detail-item">
                                <div class="product-image-detail">
                                    <img src="{{ $galleryItem->photo_path }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="right-product-detail col-md-6 col-lg-7 mb-4">
                <div class="row">
                    <div class="col-7">
                        <h1 class="name-product-detail">
                            {{ $productDetail->name }}
                        </h1>
                        <div class="attribute-product-detail">
                            Mã sách: <span
                                class="attribute-product-detail-text text-danger">{{ $productDetail->code }}</span>
                        </div>
                        <div class="attribute-product-detail">
                            Danh mục: <a class="attribute-product-detail-text-link">{{ $productDetail->category->name }}</a>
                        </div>
                        <div class="attribute-product-detail">
                            Tác giả: <a class="attribute-product-detail-text-link">{{ $productDetail->author }}</a>
                        </div>
                        <div class="attribute-product-detail">
                            Nhà xuất bản: <a class="attribute-product-detail-text-link"
                                href="{{ route('publisher.publisherproduct', ['id' => $productDetail->publisher->id]) }}">
                                {{ $productDetail->publisher->name }}</a>
                        </div>
                        <div class="attribute-product-detail">
                            Năm xuất bản: <span
                                class="attribute-product-detail-text">{{ $productDetail->publishing_year }}</span>
                        </div>
                        <div class="attribute-product-detail">
                            Số lượng tồn kho: <span
                                class="attribute-product-detail-text" id="qty_shown">{{ $qty }}</span>
                        </div>
                        <input type="hidden" id="qty" value="{{$qty}}">
                        <div class="attribute-product-detail" style="display: none">
                            Số lượng có trong giỏ hàng: <span
                                 id="cqty_shown">{{ $cqtyincart }}</span>
                        </div>
                        <input type="hidden" id="cqty" value="{{$cqtyincart}}">
                        <div class="price-product-detail">
                            Giá: 
                            @if ($productDetail->sale_price)
                                <span class="price-new-product-detail">@formatmoney($productDetail->sale_price)</span> <span
                                class="price-old-product-detail">@formatmoney($productDetail->regular_price)</span>
                            @else
                                <span  class="price-new-product-detail">@formatmoney($productDetail->regular_price)</span>
                            @endif
                        </div>
                        <div class="desc-product-detail">
                            {!! $productDetail->description !!}
                        </div>
                        <div class="d-flex flex-wrap align-items-center mt-3 mb-3">
                            <label class="attr-label-pro-detail d-block me-2 mb-0">Số lượng:</label>
                            <div class="attr-content-pro-detail d-flex flex-wrap align-items-center justify-content-between">
                                <div class="quantity-pro-detail">
                                    <span class="quantity-minus-pro-detail">-</span>
                                    <input type="number" id="qty_product" class="qty-pro" min="1" value="1" data-max-quantity="{{ $qty }}" />
                                    <span class="quantity-plus-pro-detail">+</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="cart-pro-detail d-flex flex-wrap align-items-center justify-content-between">
                                <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center add-to-cart" href="{{route('add_index.cart', ['id' => $productDetail->id])}}" data-route="{{ route('add_index.cart', ['id' => $productDetail->id]) }}"><i class="bi bi-basket2"></i><span>Thêm vào giỏ hàng</span></a>
                                <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center add-to-cart" data-route="{{ route('add_index.cart', ['id' => $productDetail->id]) }}" data-act="buynow" data-direct="{{route('user.cart')}}" ><i class="bi bi-cart2"></i><span>Mua ngay</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="group-criteria-prouduct">
                            <div class="criteria-prouduct-item">
                                <div class="criteria-box d-flex align-items-center mb-3">
                                    <div class="criteria-img">
                                        <img src="{{ asset('index/imgs/tuvan.png') }}" alt="">
                                    </div>
                                    <div class="criteria-info">
                                        <div class="criteria-name text-split1">
                                            Tư vấn nhiệt tình
                                        </div>
                                    </div>
                                </div>
                                <div class="criteria-box d-flex align-items-center mb-3">
                                    <div class="criteria-img">
                                        <img src="{{ asset('index/imgs/chatluong.png') }}" alt="">
                                    </div>
                                    <div class="criteria-info">
                                        <div class="criteria-name text-split1">
                                            Sản phẩm chất lượng
                                        </div>
                                    </div>
                                </div>
                                <div class="criteria-box d-flex align-items-center mb-3">
                                    <div class="criteria-img">
                                        <img src="{{ asset('index/imgs/giaca.png') }}" alt="">
                                    </div>
                                    <div class="criteria-info">
                                        <div class="criteria-name text-split1">
                                            Giá cả cạnh tranh
                                        </div>
                                    </div>
                                </div>
                                <div class="criteria-box d-flex align-items-center mb-3">
                                    <div class="criteria-img">
                                        <img src="{{ asset('index/imgs/khuyenmai.png') }}" alt="">
                                    </div>
                                    <div class="criteria-info">
                                        <div class="criteria-name text-split1">
                                            Khuyến mãi ngập tràn
                                        </div>
                                    </div>
                                </div>
                                <div class="criteria-box d-flex align-items-center mb-3">
                                    <div class="criteria-img">
                                        <img src="{{ asset('index/imgs/giaohang.png') }}" alt="">
                                    </div>
                                    <div class="criteria-info">
                                        <div class="criteria-name text-split1">
                                            Giao hàng tận nơi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-product-detail">
            <div class="tab-product-title">
                Nội dung
            </div>
            {!! $productDetail->content !!}

        </div>
    </div>
@endsection
@section('js')
@endsection
