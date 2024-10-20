@extends('client.layouts.index')

@section('title')
    <title>Lịch sử đơn hàng</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>Lịch sử đơn hàng</span>
        </div>
        @if (count($hdb) < 1)   
            <div class="form-add-top row">
                <div class="col-md-6">
                    <h4 class=""><a href="{{ route('user.info') }}">Thông tin tài khoản</a></h4>
                    <h4 class=""><a href="{{ route('user.order') }}">Lịch sử mua hàng</a></h4>
                    @if ($user->password != null)
                        <h4 class=""><a href="{{ route('user.changepassword') }}">Đổi mật khẩu</a></h4>
                    @else
                        
                    @endif
                </div>
                <div class="col-md-6">
                    <div>Bạn chưa mua sản phẩm nào !</div>
                </div>
            </div>
        @else
        <div class="content-main">
            <div class="form-add-top row">
                <div class="col-md-3">
                    <h4 class=""><a href="{{ route('user.info') }}">Thông tin tài khoản</a></h4>
                    <h4 class=""><a href="{{ route('user.order') }}">Lịch sử mua hàng</a></h4>
                    <h4 class=""><a href="{{ route('user.changepassword') }}">Đổi mật khẩu</a></h4>
                </div>
                <div class="col-md-9">
                    <table class="w-125 ">
                        <tr class="row">
                            <th class="col-md-3">Mã đơn hàng:</th>
                            <th class="col-md-3">Ngày đặt</th>
                            <th class="col-md-3">Trạng thái</th>
                            <th class="col-md-3">Tổng tiền</th>
                            <!--<th class="col-md-3">Đánh giá</th>-->
                        </tr>
                        @foreach ($hdb as $hdb)
                            <tr class="row">
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
        @endif
    </div>
@endsection
