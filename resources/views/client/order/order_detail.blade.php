@extends('client.layouts.index')

@section('title')
    <title>Chi tiết đơn hàng</title>
@endsection

@section('content')
    <!-- Thông tin đơn hàng -->
    <div class="wrap-content" style="margin-top: 8em">
        <div class="title-main">
            <span>
                <title>Chi tiết lịch sử đơn hàng</title>
            </span>
        </div>
        <div class="content-main">
            <div class="form-add-top">
                <div class="form-add-top row">
                    <div class="user-list-inf col-md-3">
                        <div class="user-box-left">
                            <h6 class="user-inf-title">Chi tiết đơn hàng</h6>
                            <div class="box">
                                <h3 class="user-list-inf-item">
                                    <a href="{{ route('user.info') }}"><span class="user-list-item-name">Thông tin tài
                                            khoản</span></a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{ route('user.order') }}">
                                        <span class="user-list-item-name"  style="font-size: 16px;color:#5070C0;font-weight: 700">
                                            Lịch sử mua hàng
                                        </span>
                                    </a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{ route('user.changepassword') }}"><span class="user-list-item-name">Đổi mật
                                            khẩu</a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{ route('user.signout') }}"><span class="user-list-item-name">Đăng xuất</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @php 
                        $province = DB::table('table_provinces')->where('id',$hdb[0]->province)->get();
                        $districts = DB::table('table_districts')->where('id',$hdb[0]->distrist)->get();
                        $ward = DB::table('table_wards')->where('id',$hdb[0]->ward)->get(); 

                    @endphp
                    <div class="col-md-9">
                        <div class="box-form">
                            <div class="title__form">Thông tin</div>
                            <div class="content__form"> 
                                <div class="flex-infor-bill mb-4">
                                    <div class="infor-bill">
                                        <div class="infor-bill-item"></div>
                                        <div class="title-name2">Địa chỉ nhận hàng: {{ $user->address }}, {{ $ward[0]->Name ?? '' }} {{ $districts[0]->Name ?? '' }}  {{ $province[0]->Name ?? ''}}</div>
                                        <div class="infor-bill-item">Tên: {{ $user->name }} </div> 
                                        <div class="infor-bill-item">Số điện thoại: {{ $user->phone }}</div>
                                    </div> 
                                </div>
                                <table class="table table-bordered table-striped">  
                                    <tbody>
                                        <tr>
                                            <th>Mã Sản Phẩm</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Đơn giá</th>
                                        </tr> 
                                        @foreach ($cthdb as $item)
                                            <tr>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                @if ($item->sale_price > 0)
                                                    <td>@formatmoney($item->sale_price)</td>
                                                @else
                                                    <td>@formatmoney($item->regular_price)</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between py-3">
                                    
                                <div class="title-name2"><strong>Tạm tính:</strong> @formatmoney($hdb[0]->total_price - 30000)</div>
                                <div class="title-name2"><strong>Phí ship:</strong> @formatmoney(30000)</div>
                                <div class="title-name2"><strong>Tổng tiền:</strong> @formatmoney($hdb[0]->total_price)</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if($hdb[0]->status == 1 || $hdb[0]->status == 2 || $hdb[0]->status == 3)
                                    {{-- <button class="btn btn-danger mt-2 cancel-order-button"
                                        data-url = "{{route('user.order.cancel',['id'=> $hdb[0]->id])}}">Hủy đơn hàng</button> --}}
                                        <button class="btn btn-danger mt-2" id="cancelOrderButton">Hủy đơn hàng</button> 
                                @endif
                                <div class="back-buton" style="padding: 0 5px">
                                    <a href="#" class="btn btn-secondary mt-2" onclick="history.back()">Thoát</a>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelOrderButton = document.getElementById('cancelOrderButton');

            if (cancelOrderButton) {
                cancelOrderButton.addEventListener('click', function() { 
                    Swal.fire({
                        title: 'Bạn có chắc chắn?',
                        text: "Đơn hàng sẽ bị hủy và không thể khôi phục!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Vâng, hủy đơn hàng!',
                        cancelButtonText: 'Không, quay lại'
                    }).then((result) => {
                        if (result.isConfirmed) { 
                            fetch('/api/cancel-order', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: JSON.stringify({
                                        orderId: '{{ $hdb[0]->order_code }}',
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Đã hủy!',
                                            'Đơn hàng đã được hủy thành công.',
                                            'success'
                                        ).then(() => {
                                            window.location.href = data.redirect_url; 
                                        });
                                    } else {
                                        Swal.fire(
                                            'Lỗi!',
                                            'Có lỗi xảy ra khi hủy đơn hàng. Vui lòng thử lại.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    console.error('Lỗi:', error);
                                    Swal.fire(
                                        'Lỗi!',
                                        'Không thể kết nối đến server. Vui lòng thử lại sau.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

