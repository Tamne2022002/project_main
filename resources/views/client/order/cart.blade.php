@extends('client.layouts.index')

<?php
use App\Models\WarehouseModel;
?>
@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="return">
            @if ($message = Session::get('success'))
                <div>
                    <div style="color: #12c300;
                font-size: 1.2em;font-weight: bold;">{{ $message }}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div>
                    <div style="color: #dd0505;
                font-size: 1.2em;font-weight: bold;">{{ $message }}
                    </div>
                </div>
            @endif
        </div>
        <div class="wrap-cart">
            @php
                $total = 0;
            @endphp

            @if (session('cart') != null)
                <div class="row">
                    <div class="top-cart col-md-12">
                        <p class="title-cart">Giỏ hàng của bạn:</p>
                        <form action="{{ route('user.payment') }}" method="POST" id="cart-form">
                            @csrf
                            <div class="list-procart">
                                <div class="procart procart-label">
                                    <div class="row row-10">
                                        <div class="pic-procart col-2 col-md-2 mg-col-2">Hình ảnh</div>
                                        <div class=" col-2 col-md-2 mg-col-2">Tên sản phẩm</div>
                                        <div class="quantity-procart col-2 col-md-2 mg-col-2">Số lượng</div>
                                        <div class="price-procart col-2 col-md-2 mg-col-2">Đơn giá</div>
                                        <div class="price-procart col-2 col-md-2 mg-col-2">Thành tiền</div>
                                        <div class="col-1 col-md-1 mg-col-2"> </div>
                                    </div>
                                </div>
                                <!--thẻ sản phẩm giỏ hàng-->
                                @foreach (session('cart') as $k => $v)
                                    @php
                                        $slt = WarehouseModel::where('id_parent', $v['id_product'])->value('quantity');
                                        $total +=
                                            ($v['sale_price'] ? $v['sale_price'] : $v['regular_price']) *
                                            $v['quantity'];
                                    @endphp
                                    <div class="procart" data-route="{{ route('delete.cart', $k) }}"
                                        data-id="{{ $k }}">
                                        <div class="row row-10">

                                            <!--Hình ảnh-->
                                            <div class="pic-procart col-3 col-md-2 mg-col-10">
                                                <a class="text-decoration-none" target="_blank" title=""> <img
                                                        width="85px" height="85px"
                                                        src="{{ $v['photo_path'] ? $v['photo_path'] : asset('assets/noimage.jpg') }}"
                                                        alt="">
                                                </a>
                                                <a class="del-procart text-decoration-none delete-product"><i
                                                        class="fa fa-times-circle"></i>
                                                    Xóa </a>
                                            </div>
                                            <!--Tên-->
                                            <div class="info-procart col-2 col-md-2 mg-col-10">
                                                <h3 class="name-procart">
                                                    <a class="text-decoration-none"
                                                        href="{{ route('product.detail', ['id' => $v['id_product']]) }}">
                                                         {{ $v['name'] }} 
                                                    </a>
                                                </h3>
                                            </div>

                                            <!--Số lượng-->
                                            <div class="quantity-procart col-2 col-md-2 mg-col-10">
                                                <div class="quantity-counter-procart quantity-counter-procart-"
                                                    data-route="{{ route('update_quantity.cart', ['id' => $k]) }}">
                                                    <span class="counter-procart-minus counter-procart">-</span>
                                                    <input type="number" class="quantity-procart" min="1"
                                                        value="{{ $v['quantity'] }}" data-pid=" " data-code=""
                                                        data-max-quantity="{{ $v['product_qty'] }}" />
                                                    <span class="counter-procart-plus counter-procart">+</span>
                                                </div>
                                            </div>
                                            <!--end số lượng-->
                                            <!--Thành tiền-->
                                            @if ($v['sale_price'])
                                                <div class="price-procart col-2 col-md-2 mg-col-10">
                                                    <p class="price-new-cart load-price-new"> @formatmoney($v['sale_price']) </p>
                                                </div>
                                                <div class="price-procart col-2 col-md-3 mg-col-10">
                                                    <p class="price-new-cart load-price"> @formatmoney($v['sale_price'] * $v['quantity']) </p>
                                                </div>
                                            @else
                                                <div class="price-procart col-2 col-md-3 mg-col-10">
                                                    <p class="price-new-cart load-price-new"> @formatmoney($v['regular_price']) </p>
                                                </div>
                                                <div class="price-procart col-2 col-md-3 mg-col-10">
                                                    <p class="price-new-cart load-price-new load-price-total">
                                                        @formatmoney($v['regular_price'] * $v['quantity'])
                                                    </p>
                                                </div>
                                            @endif
                                            @if ($slt > $v['quantity']) 
                                                <div
                                                    class="col-1 col-md-1 mg-col-2 d-flex align-items-center justify-content-center">
                                                    <input type="checkbox" name="selected_products[]"
                                                        value="{{ $k }}" class="select-product">
                                                </div>
                                            @else 
                                                <div class="hethang col-1 col-md-1 mg-col-2 d-flex align-items-center justify-content-center">Hiện tại đang hết hàng</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <!-- end -->
                                <div class="money-procart">
                                    <div class="total-procart">
                                        <p>Tổng tiền:</p>
                                        <p class="total-price load-price-total" id="load-total"> @formatmoney($total) </p>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrap-cart d-flex justify-content-end align-items-center mt-4">
                                <div class="btn btn-success btn-cart-back-to-home me-2">
                                    <a class="text-light" href="{{ route('index') }}">Về trang chủ</a>
                                </div>
                                <button type="submit" class="btn btn-success btn-cart-next-to-payment">Thanh toán</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('index') }}" class="empty-cart text-decoration-none d-block">
                    <i class="fa-duotone fa-cart-xmark"></i>
                    <p>Không tồn tại sản phẩm nào trong giỏ hàng</p>
                    <span class="btn btn-back-to-home">
                        Về trang chủ
                    </span>
                </a>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.querySelector('#cart-form').addEventListener('submit', function(e) {
            const checkedProducts = Array.from(document.querySelectorAll(
                    'input[name="selected_products[]"]:checked'))
                .map(cb => cb.value);

            if (checkedProducts.length === 0) {
                e.preventDefault();
                showErrorNotify("Vui lòng chọn ít nhất một sản phẩm để thanh toán.", "Thông báo", "error");

            }
        });
    </script>

    <script>
        function showErrorNotify(text = "Notify text", title = "Thông báo", status = "error") {
            new Notify({
                status: status, // success, warning, error
                title: title,
                text: text,
                effect: "fade",
                speed: 400,
                customClass: null,
                customIcon: null,
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                gap: 10,
                distance: 10,
                type: 3,
                position: "right top",
            });
        }

        @if (session('notify'))
            showErrorNotify("{{ session('notify.message') }}", "Thông báo", "{{ session('notify.status') }}");
        @endif
    </script>
@endsection
