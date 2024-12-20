@extends('client.layouts.index')
@section('title')
    <title> {{ $pageName }}</title>
@endsection
@section('content')
    <div class="wrap-content">
        <div class="product-content">
            <div class="title-main">
                <span>
                    <?= $pageName ?> 
                </span>
            </div>
            <div class="content-main d-flex"> 
                <div class="grid-profuct">
                    @isset($productInternal)
                        @if (!$productInternal->isEmpty())
                            <div class="grid-product-internal">
                                @foreach ($productInternal as $v)
                                    <div class="product-item" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="product" data-aos="zoom-in-up">
                                            <div class="box-product text-decoration-none">
                                                <div class="position-relative overflow-hidden  ">
                                                    <a class="pic-product " href="{{ route('product.detail', ['id' => $v->id]) }}"
                                                        title="Sản phẩm">
                                                        <div class="pic-product-img scale-img hover_light">
                                                            <img class="w-100"
                                                                src="{{ $v->photo_path ? $v->photo_path : asset('assets/noimage.jpg') }}"
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                {{ $productInternal->links('pagination::bootstrap-5') }}
                            </div>
                        @else
                            <div class="alert alert-warning w-100">
                                <strong>Thông tin đang được cập nhật. Vui lòng kiểm tra lại sau để không bỏ lỡ bất kỳ nội dung mới
                                    nào!</strong>
                            </div>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
