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
        <div class="container" style="margin-top: 11em">
            <div class="row cart_form">
                <!-- Giỏ hàng -->
                <div class="col-lg-7">
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
                                                $productPrice =
                                                    ($product['sale_price'] ?? $product['regular_price']) *
                                                    $product['quantity'];
                                                $total += $productPrice;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($product['photo_path']) }}" class="img-fluid rounded"
                                                        width="80" alt="Ảnh sản phẩm">
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
                <div class="col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <p>Thông tin giao hàng</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/payment_return') }}" method="POST" id="paymentForm">
                                @csrf
                                <!-- Họ tên -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="fullname_vnpay"
                                                name="fullname_vnpay" placeholder="Họ tên" value="{{ $user->name }}"
                                                required>
                                            <label for="fullname_vnpay">Họ tên</label>
                                        </div>
                                    </div>
                                    <!-- Điện thoại -->
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="phone_vnpay" name="phone_vnpay"
                                                placeholder="Điện thoại" value="{{ $user->phone }}" required>
                                            <label for="phone_vnpay">Điện thoại</label>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $province = DB::table('table_provinces')->get();
                                @endphp
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="cart-select form-control" id="cart-province" name="province">
                                                <option value="0">Tỉnh:</option>
                                                @foreach ($province as $v)
                                                    <option value="{{ $v->id }}">{{ $v->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="cart-select form-control" id="cart-distrist" name="distrist">
                                                <option value="0">Huyện / Quận:</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="cart-select form-control" id="cart-ward" name="ward">
                                                <option value="0">Xã / Phường:</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Địa chỉ -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address_vnpay" name="address_vnpay"
                                        placeholder="Địa chỉ" value="{{ $user->address }}" required>
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
                                        <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                            value="cod" checked>
                                        <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="vnpay"
                                            value="vnpay">
                                        <label class="form-check-label" for="vnpay">Thanh toán qua VNPAY</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="vietqr" value="vietqr">
                                        <label class="form-check-label" for="vietqr">Thanh toán bằng QR</label>
                                    </div>
                                </div>
                                <div id="qr-container" class="text-center mt-3" style="display: none;">
                                    <p>Quét mã QR để thanh toán:</p>
                                    <img id="qr-code-image"
                                        src="https://img.vietqr.io/image/MB-4660590747532-compact2.png?amount=500000&addInfo=TLBOOKSTORE"
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
        document.addEventListener('DOMContentLoaded', function() {
            const qrContainer = document.getElementById('qr-container');
            const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
            const totalPriceElement = document.getElementById('total-price');
            const qrCodeImage = document.getElementById('qr-code-image');
            const paymentForm = document.getElementById('paymentForm');
            const checkAPIUrl =
                "https://script.google.com/macros/s/AKfycbxcrTkN4n8y84VESNeNE9mqeqdvPUKnnVuiFq4M3_YYMul-5EYRyJ-MeQuvwOofOeOv/exec";
            const code = generateRandomNumbers();
            // Xử lý hiển thị QR Code khi chọn phương thức thanh toán
            paymentForm.addEventListener('submit', async function(event) {
                event.preventDefault();
                const selectedPaymentMethod = document.querySelector(
                    'input[name="payment_method"]:checked').id;
                const fullname = document.getElementById('fullname_vnpay').value;
                const phone = document.getElementById('phone_vnpay').value;
                const address = document.getElementById('address_vnpay').value;
                const total = parseInt(totalPriceElement.textContent.replace(/[^\d]/g, ''), 10);

                if (!fullname || !phone || !address) {
                    Swal.fire('Lỗi', 'Vui lòng nhập đầy đủ thông tin giao hàng!', 'error');
                    return;
                }
                const phoneRegex = /^[0-9]{10}$/;

                // Kiểm tra thông tin
                if (!fullname || !phone || !address) {
                    Swal.fire('Lỗi', 'Vui lòng nhập đầy đủ thông tin giao hàng!', 'error');
                    return;
                }

                if (!phoneRegex.test(phone)) {
                    Swal.fire('Lỗi', 'Vui lòng nhập số điện thoại hợp lệ 10 số !', 'error');
                    return;
                }


                if (selectedPaymentMethod === 'cod' || selectedPaymentMethod === 'vnpay') {
                    paymentForm.submit();
                } else if (selectedPaymentMethod === 'vietqr') {
                    try {
                        const response = await fetch(checkAPIUrl);
                        const data = await response.json();

                        if (data && data.data && data.data.length > 0) {
                            const lastPaid = data.data[data.data.length - 1];
                            const lastPrice = lastPaid["Giá trị"];
                            const lastContent = lastPaid["Mô tả"];
                            console.log(lastPrice);
                            console.log(total);

                            if (lastPrice === total && lastContent.includes(code)) {
                                const confirmInput = document.createElement('input');
                                confirmInput.type = 'hidden';
                                confirmInput.name = 'xacnhanthanhtoan';
                                confirmInput.value = 'true';
                                paymentForm.appendChild(confirmInput);
                                paymentForm.submit();
                            } else {
                                Swal.fire('Chưa thanh toán', 'Hóa đơn chưa được thanh toán!',
                                    'warning');
                            }
                        } else {
                            Swal.fire('Lỗi', 'Không tìm thấy dữ liệu thanh toán!', 'error');
                        }
                    } catch (error) {
                        Swal.fire('Lỗi', 'Không thể kiểm tra thanh toán, vui lòng thử lại!', 'error');
                    }
                }
            });

            function generateRandomNumbers() {
                const numbers = [];
                for (let i = 0; i < 10; i++) {
                    const randomNumber = Math.floor(Math.random() * 100) + 1;
                    numbers.push(randomNumber);
                }
                return numbers.join('');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
