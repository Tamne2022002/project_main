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
                                <a href="#" class="btn btn-danger mt-2" onclick="history.back()">Thoát</a>
                                <div>  </div>
                                <span  class="btn btn-danger mt-2" id="cancelButton">Hủy đơn hàng</a>
                            </div> 
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    // Mở form hủy đơn hàng
    document.getElementById('cancelButton').addEventListener('click', function() {
      document.getElementById('cancelForm').classList.add('active');
    });

    // Đóng form hủy đơn hàng
    document.getElementById('cancelFormClose').addEventListener('click', function() {
      document.getElementById('cancelForm').classList.remove('active');
    });

    // Xử lý gửi form
    document.getElementById('cancelOrderForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Ngăn chặn việc reload trang
      const reason = document.getElementById('reason').value;
      const comments = document.getElementById('comments').value;

      // Gửi dữ liệu hủy đơn hàng đến server
      fetch('/api/cancel-order', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          orderId: '12345', // Thay bằng mã đơn hàng thực tế
          reason,
          comments,
        }),
      })
      .then(response => {
        if (response.ok) {
          // Cập nhật trạng thái đơn hàng trên giao diện
          document.getElementById('orderStatus').innerText = 'Đang hủy hàng';

          // Chuyển hướng về trang danh sách đơn hàng
          setTimeout(() => {
            window.location.href = '/orders'; // Đường dẫn trang danh sách đơn hàng
          }, 2000); // Chờ 2 giây trước khi chuyển trang
        } else {
          alert('Có lỗi xảy ra khi hủy đơn hàng. Vui lòng thử lại.');
        }
      })
      .catch(error => console.error('Lỗi:', error));
    });
  </script>
