@extends('client.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/rate.css') }}">
@endsection

@section('title')
    <title>Thanh toán</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="wrap-pay">
            @php
                $shipping = 30000;
                $total = 0;
            @endphp
            <div class="row">
                <div class="top-cart col-12 col-lg-7">
                    <p class="title-cart">Thanh toán</p>
                    <div class="list-procart">
                        <div class="procart procart-label">
                            <div class="row row-10">
                                <!--<div><input type="checkbox"></div>-->
                                <div class="pic-procart col-3 col-md-2 mg-col-10">Hình ảnh</div>
                                <div class="info-procart col-6 col-md-5 mg-col-10">Tên sản phẩm</div>
                                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                                    <p>Số lượng</p>
                                    <p>Thành tiền</p>
                                </div>
                                <div class="price-procart col-3 col-md-3 mg-col-10">Thành tiền</div>
                            </div>
                        </div>
                        <!--thẻ sản phẩm giỏ hàng-->
                        @foreach (session('cart') as $k => $v)
                            @php $total += ($v['sale_price']?$v['sale_price']:$v['regular_price']) * $v['quantity'] @endphp
                            <div class="procart procart">
                                <div class="row row-10">
                                    <!--<div><input type="checkbox"></div>-->
                                    <div class="pic-procart col-3 col-md-2 mg-col-10">
                                        <a class="text-decoration-none" target="_blank" title=""> <img width="85px"
                                                height="85px" src="{{ asset($v['product_photo_path']) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="info-procart col-6 col-md-5 mg-col-10">
                                        <h3 class="name-procart"><a class="text-decoration-none" target="_blank"
                                                title=""> {{ $v['name'] }} </a></h3>
                                    </div>
                                    <div class="quantity-procart col-3 col-md-2 mg-col-10">{{ $v['quantity'] }}</div>
                                    <div class="price-procart col-3 col-md-3 mg-col-10">
                                        @if ($v['sale_price'])
                                            <p class="price-new-cart load-price-new"> @formatmoney($v['sale_price'] * $v['quantity']) </p>
                                            <p class="price-old-cart load-price"> @formatmoney($v['regular_price'] * $v['quantity'])</p>
                                        @else
                                            <p class="price-new-cart load-price"> @formatmoney($v['regular_price'] * $v['quantity']) </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end -->
                    </div>
                    <div class="money-procart">
                        <div class="total-procart">
                            <p>Tạm tính:</p>
                            <p class="total-price load-price-temp">@formatmoney($total)</p>
                        </div>
                        <div class="total-procart">
                            <p>Phí vận chuyển:</p>
                            <p class="total-price load-price-ship">@formatmoney($shipping)</p>
                        </div>
                        <div class="total-procart">
                            <p>Tổng tiền:</p>
                            <p class="total-price load-price-total" id="sub-total">@formatmoney($total + $shipping)</p>
                        </div>
                    </div>
                </div>
                <div class="bottom-cart col-12 col-lg-5">
                    <div class="section-cart">
                        <p class="title-cart">Hình thức thanh toán:</p>
                        <!--<div class="information-cart">
                                    <div class="payments-cart form-check">
                                        <input type="radio" class="form-check-input" id="payments-cod" name="dataOrder[payments]" value="cod" required checked>
                                        <label class="payments-label form-check-label" for="payments-cod" data-payments="">
                                            Thanh toán khi nhận hàng
                                        </label>
                                    </div>
                                    <div class="payments-cart form-check">
                                        <input type="radio" class="form-check-input" id="payments-vnpay" name="dataOrder[payments]" value="vnpay" required>
                                        <label class="payments-label form-check-label" for="payments-vnpay" data-payments="">
                                            Thanh toán trực tuyến qua VNPAY
                                        </label>
                                        <div class="payments-info payments-info- transition">
                                        </div>
                                    </div>
                                </div>-->
                        <!-- Form COD Payment -->
                        <form action="{{ url('/payment_return') }}" method="POST" id="paymentForm">
                            @csrf
                            <p class="title-cart">Thông tin giao hàng:</p>
                            <div class="information-cart">
                                <div class="row row-10">
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus">
                                            <input type="text" class="form-control text-sm" id="fullname_vnpay"
                                                name="fullname" placeholder="Họ tên"
                                                value="{{ $user->last_name . ' ' . $user->first_name }}" required />
                                            <label for="fullname_vnpay">Họ tên</label>
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                                    </div>
                                    <div class="input-cart col-md-6 mg-col-10">
                                        <div class="form-floating form-floating-cus">
                                            <input type="number" class="form-control text-sm" id="phone_vnpay"
                                                name="phone" placeholder="Điện thoại" value="{{ $user->phone }}"
                                                required />
                                            <label for="phone_vnpay">Điện thoại</label>
                                        </div>
                                        <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus">
                                        <input type="text" class="form-control text-sm" id="address_vnpay" name="address"
                                            placeholder="Địa chỉ" value="{{ $user->address }}" required />
                                        <label for="address_vnpay">Địa chỉ</label>
                                    </div>
                                    <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                                </div>
                                <div class="input-cart">
                                    <div class="form-floating form-floating-cus">
                                        <textarea class="form-control text-sm" id="note_vnpay" name="note" placeholder="Yêu cầu khác"></textarea>
                                        <label for="note_vnpay">Yêu cầu khác</label>
                                    </div>
                                </div>
                            </div>
                            <input id="total-total" type="hidden" name="total" value="{{ $total + $shipping }}">
                            <button type="submit" name="type" value="payment" class="btn btn-primary">Thanh toán khi
                                nhận hàng</button>
                            <button type="submit" name="type" value="payment_vnpay" class="btn btn-primary">Thanh
                                toán bằng VNPAY</button>
                            <button type="submit" name="type" value="online" id="vietqr"
                                class="btn btn-primary">
                                Thanh toán bằng QR
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popupContainer" class="popup-container">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <img id="img-pay" alt="Popup Image">
        </div>
    </div>
@endsection
@section('js')
    <script>
        function closePopup() {
            var popup = document.getElementById('popupContainer');
            popup.style.display = 'none'; // Ẩn popup bằng cách thay đổi thuộc tính display của nó
        }

        let str = document.getElementById('total-total').value;
        let num = parseInt(str);
        //var total = num * 1000 - 30000; //đang trừ 30000 tiền ship
        //var total = num * 1000;
        var total = num;

        document.addEventListener('DOMContentLoaded', function() {
            var isProcessing = false;

            document.getElementById('vietqr').addEventListener('click', function(event) {
                var fullname = document.getElementById('fullname_vnpay').value;
                var phone = document.getElementById('phone_vnpay').value;
                var address = document.getElementById('address_vnpay').value;

                if (!fullname || !phone || !address) {
                    event.preventDefault(); // Ngăn không cho form submit
                    if (!fullname) {
                        alert('Vui lòng nhập họ tên');
                    } else if (!phone) {
                        alert('Vui lòng nhập số điện thoại');
                    } else if (!address) {
                        alert('Vui lòng nhập địa chỉ');
                    }
                } else {
                    event.preventDefault();

                    if (isProcessing) {
                        return;
                    }

                    isProcessing = true;

                    var tiendon = total;
                    var code = generateRandomNumbers().join('');
                    var QR = "https://img.vietqr.io/image/MB-4660590747532-compact2.png?amount=" +
                        tiendon + "&addInfo=TLBOOKSTORE_" + code +
                        "&accountName=AU DUONG HOANG LONG";

                    var imgPay = document.getElementById('img-pay');
                    imgPay.setAttribute('src', QR);

                    var intervalId = setInterval(function() {
                        checkpaid(code, tiendon, intervalId);
                    }, 1000);

                    document.getElementById('popupContainer').style.display = 'block';
                }
            });

            async function checkpaid(content, price, intervalId) {
                try {
                    const response = await fetch(
                        "https://script.google.com/macros/s/AKfycbyWztGeW79KZ5itRELpNkiC-pSkBHmfnI3tBP4ig9ToVq7tX2fxmz1Ocl_L726pwDWYZQ/exec"
                    );
                    const data = await response.json();
                    const lastPaid = data.data[data.data.length - 1];
                    const lastPrice = lastPaid["Giá trị"];
                    const lastContent = lastPaid["Mô tả"];
                    if (lastPrice >= price && lastContent.includes(content)) {
                        clearInterval(intervalId);
                        var form = document.getElementById('paymentForm');
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'xacnhanthanhtoan';
                        input.value = 'true';
                        form.appendChild(input);
                        form.submit();
                    } else {
                        console.log('Chưa thanh toán thành công');
                    }
                } catch (error) {
                    console.error('Lỗi khi gọi API kiểm tra thanh toán:', error);
                } finally {
                    isProcessing = false;
                }
            }

            function generateRandomNumbers() {
                const numbers = [];
                for (let i = 1; i < 6; i++) {
                    const randomNumber = Math.floor(Math.random() * 100) + 1;
                    numbers.push(randomNumber);
                }
                return numbers;
            }
        });
    </script>
@endsection
