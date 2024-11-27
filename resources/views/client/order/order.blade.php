@extends('client.layouts.index')

@section('title')
    <title>Lịch sử đơn hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="order-content" style="margin-top: 8em ">
      
            @if (count($hdb) < 1)   
                <div class="form-add-top row">
                    <div class="user-list-inf col-md-3">
                        <div class="user-box-left">
                            <h6 class="user-inf-title">Thông tin cá nhân</h6>
                            <div class="box">
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.info')}}"><span class="user-list-item-name">Thông tin tài khoản</span></a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.order')}}">
                                        <span class="user-list-item-name" style="font-size: 15px;color:#5070C0;font-weight: 700">
                                            Lịch sử mua hàng
                                        </span>
                                    </a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.changepassword')}}"><span class="user-list-item-name">Đổi mật khẩu</span></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="box-form">
                            <div class="title__form">Thông tin</div>
                            <div class="content__form">
                                <table class="w-100 table table-bordered table-striped">
                                    <tr class="">
                                        <th class="col-md-3">Mã đơn hàng:</th>
                                        <th class="col-md-3">Ngày đặt</th>
                                        <th class="col-md-3">Trạng thái</th>
                                        <th class="col-md-3">Tổng tiền</th>
                                        <!--<th class="col-md-3">Đánh giá</th>-->
                                    </tr>
                                    <div class="text-no-order text-align-center">
                                        Bạn chưa mua sản phẩm nào!
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="content-main">
                <div class="form-add-top row">
                    <div class="user-list-inf col-md-3">
                        <div class="user-box-left">
                            <h6 class="user-inf-title">Thông tin cá nhân</h6>
                            <div class="box">
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.info')}}"><span class="user-list-item-name">Thông tin tài khoản</span></a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.order')}}">
                                        <span class="user-list-item-name" style="font-size: 15px;color:#5070C0;font-weight: 700">
                                         Lịch sử mua hàng
                                        </span>
                                    </a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.changepassword')}}"><span class="user-list-item-name">Đổi mật khẩu</a>
                                </h3>
                                <h3 class="user-list-inf-item">
                                    <a href="{{route('user.signout')}}"><span class="user-list-item-name">Đăng xuất</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="box-form">
                            <div class="title__form">Thông tin</div>
                            <div class="content__form">
                                <table class="w-100 table table-bordered table-striped">
                                    <tr class="">
                                        <th class="col-md-3">Mã đơn hàng:</th>
                                        <th class="col-md-3">Ngày đặt</th>
                                        <th class="col-md-3">Trạng thái</th>
                                        <th class="col-md-3">Tổng tiền</th>
                                        <!--<th class="col-md-3">Đánh giá</th>-->
                                    </tr>
                                    @foreach ($hdb as $hdb)
                                        <tr class="">
                                            <td class="col-md-3">
                                                <a href="{{ route('user.order.detail', ['id' => $hdb->id]) }}">
                                                    {{ $hdb->order_code }}
                                                </a>
                                            </td>
                                            <td class="col-md-3">{{ $hdb->created_at }}</td>
                                            <td class="col-md-3">
                                                @switch($hdb->status)
                                                    @case(1)
                                                        Mới đặt
                                                    @break
                                                    @case(2)
                                                        Đã xác nhận
                                                    @break
                                                    @case(3)
                                                        Đã thanh toán
                                                    @break
                                                    @case(4)
                                                        Đang giao hàng
                                                    @break
                                                    @case(5)
                                                        Đã giao
                                                    @break
                                                    @case(6)
                                                        Đang chờ hủy
                                                    @break
                                                    @case(7)
                                                        Đã huỷ
                                                    @break
                                                @endswitch
                                            </td>
                                            <td class="col-md-3">@formatmoney($hdb->total_price)</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
