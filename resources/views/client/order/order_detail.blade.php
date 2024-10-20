@extends('client.layouts.index')

@section('title')
    <title>Chi tiết lịch sử đơn hàng</title>
@endsection

@section('content')
<!-- Thông tin đơn hàng -->
<div class="wrap-content">
    <div class="title-main">
        <span>
            <title>Chi tiết lịch sử đơn hàng</title>
        </span>
    </div>
    <div class="content-main">
        <div class="form-add-top">
            <div>
                <a href="#" onclick="history.back()">Thoát</a>
            </div>
            <div class="title-name1">Thông tin đơn hàng</div>
            <div class="title-bill">ĐƠN HÀNG: <span class="id-bill">{{$hdb[0]->id}}</span>, ĐẶT
                LÚC: <span class="time-bill">{{$hdb[0]->created_at}}</span></div>
            <div class="flex-infor-bill">
                <div class="infor-bill">
                    <div class="infor-bill-item">
                    </div>
                    <div class="title-name2">Địa chỉ nhận hàng: {{$user->address}}</div>
                    <div class="infor-bill-item">{{$user->last_name . ' ' . $user->first_name}} </div>
                    <div class="infor-bill-item">Vietnam</div>
                    <div class="infor-bill-item">{{$user->sdt}}</div>
                </div>
                <div class="infor-bill">
         
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cthdb as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        @if($item->sale_price > 0) 
                        <td>@formatmoney($item->sale_price)</td>
                        @else
                        <td>@formatmoney($item->regular_price)</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        
            <div class="title-name2">Tạm tính: @formatmoney($hdb[0]->total_price - 30000)</div>
            <div class="title-name2">Phí ship: @formatmoney(30000)</div>
            <div class="title-name2">Tổng tiền: @formatmoney($hdb[0]->total_price)</div>
        
            <!--<div class="grid-product-inbill-list">
                <div class="gridspname">
                    <div class="title-name2">Sản phẩm</div>
                    <div class="grid-product-inbill-list-info">
                        <div>Thương nhớ trà long</div>
                        <div>Tiểu thuyết</div>
                    </div>
                    <div class="grid-product-inbill-list-info">
                        <div>Thương nhớ trà long2</div>
                        <div>Tiểu thuyết2</div>
                    </div>
                </div>
                <div class="gridspid">
                    <div class="title-name2">Mã sản phẩm</div>
                    <div class="grid-product-inbill-list-info">
                        <div>#008000</div>
                        <div>#00800das0</div>
                    </div>
                </div>
                <div class="gridspprice">
                    <div class="title-name2">Giá</div>
                    <div class="grid-product-inbill-list-info">
                        <div>30000đ </div>
                        <div>50000đ </div>
                    </div>
                </div>
                <div class="gridspquanty">
                    <div class="title-name2">Số lượng</div>
                    <div class="grid-product-inbill-list-info">
                        <div>3</div>
                        <div>2</div>
                    </div>
                </div>
                <div class="gridsptotalprice">
                    <div class="title-name2">Tổng cộng</div>
                    <div class="grid-product-inbill-list-info">
                        <div>90000đ</div>
                        <div>60000đ</div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
@endsection