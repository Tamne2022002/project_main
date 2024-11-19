@extends('client.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/rate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style_custom.css') }}">
@endsection

@section('title')
    <title>Thanh toán</title>
@endsection

@section('content')
<div class="wrap-content">
    <div class="container">
        <div class="row cart_form">
            <!-- Giỏ hàng -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <p>Thông tin giỏ hàng</p>
                    </div>
                    <div class="card-body">
                        @php
                            $shipping = 30000;
                            $total = 0;
                        @endphp
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        @php 
                                            $productPrice = ($product['sale_price'] ?? $product['regular_price']) * $product['quantity'];
                                            $total += $productPrice;
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{ asset($product['photo_path']) }}" class="img-fluid rounded" width="80" alt="Ảnh sản phẩm">
                                            </td>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['quantity'] }}</td>
                                            <td>@formatmoney($productPrice)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>Tạm tính:</strong> @formatmoney($total)</span>
                            <span><strong>Phí vận chuyển:</strong> @formatmoney($shipping)</span>
                            <span><strong>Tổng tiền:</strong> <span id="total-price">@formatmoney($total + $shipping)</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thanh toán -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <p>Thông tin giao hàng</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/payment_return') }}" method="POST" id="paymentForm">
                            @csrf
                            <!-- Họ tên -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fullname_vnpay" name="fullname_vnpay" placeholder="Họ tên" value="{{ $user->name }}" required>
                                <label for="fullname_vnpay">Họ tên</label>
                            </div>
                            <!-- Điện thoại -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="phone_vnpay" name="phone_vnpay" placeholder="Điện thoại" value="{{ $user->phone }}" required>
                                <label for="phone_vnpay">Điện thoại</label>
                            </div>
                            <!-- Địa chỉ -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="address_vnpay" name="address_vnpay" placeholder="Địa chỉ" value="{{ $user->address }}" required>
                                <label for="address_vnpay">Địa chỉ</label>
                            </div>
                            <!-- Ghi chú -->    
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="note" name="note" placeholder="Ghi chú"></textarea>
                                <label for="note">Yêu cầu khác</label>
                            </div>

                            <!-- Phương thức thanh toán -->
                            <div class="mb-3">
                                <h6>Hình thức thanh toán:</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                    <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="vnpay">
                                    <label class="form-check-label" for="vnpay">Thanh toán qua VNPAY</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="vietqr" value="vietqr">
                                    <label class="form-check-label" for="vietqr">Thanh toán bằng QR</label>
                                </div>
                            </div> 
                            <div id="qr-container" class="text-center mt-3" style="display: none;">
                                <p>Quét mã QR để thanh toán:</p>
                                <img id="qr-code-image" src="https://img.vietqr.io/image/MB-4660590747532-compact2.png?amount=500000&addInfo=TLBOOKSTORE" 
                                     class="img-fluid" alt="Mã QR thanh toán" style="max-width: 200px;">
                            </div>
                            

                            <button type="submit" class="btn btn-success w-100">Xác nhận thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const qrContainer = document.getElementById('qr-container');
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');

        // Xử lý khi thay đổi phương thức thanh toán
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.id === 'vietqr') {
                    qrContainer.style.display = 'block'; // Hiện mã QR
                } else {
                    qrContainer.style.display = 'none'; // Ẩn mã QR
                }
            });
        });
    });

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
                    if (!fullname || !phone || !address) {
                        event.preventDefault();
                        Swal.fire('Lỗi', 'Vui lòng nhập đầy đủ thông tin giao hàng!', 'error');
                        return;
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
