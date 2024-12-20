@extends('admin.layout.head') @section('title')
    <title>Chi Tiết Hóa Đon Nhập</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admins/css/sumoselect.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/jquery.sumoselect.min.js') }}"></script>
    <script script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">
            <form action="" method="">
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        {{-- <button type="reset" class="btn btn-secondary mr-2">Làm lại</button> --}}
                        <a href="{{ route('order.index') }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                @csrf  
                <div class="row col-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Mã hóa đơn</label>
                            <input type="text" class="form-control" name="orders_code"
                                value="{{$Order->order_code}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" class="form-control"
                                name="import_date"
                                value="{{ \Carbon\Carbon::parse($Order->created_at)->format('Y-m-d\TH:i') }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Trạng thái</label> 
                        @if ($Order->status == 7)
                        @php
                            $order_status = $Order->status-1;
                        @endphp
                        <input type="text" class="form-control" value="{{$status[$order_status]['name']}}" readonly>
                        @else
                            <select name="status" class="form-control " id="status">
                                @foreach ($status as $item)
                                    <option value="{!! $item->id !!}" {{$Order->status == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        @endif
                        
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="text" class="form-control" name="total_price"
                                value="@formatmoney($Order->total_price)" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã Sản Phẩm</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá Sản Phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$OrderDetail->isEmpty())
                                @foreach ($OrderDetail as $v)
                                    <tr>
                                        <td class="">{{ $v->code }}</td>
                                        <td class="">{{ $v->name }}</td>
                                        @if ($v->sale_price > 0)
                                            <td class="">@formatmoney($v->sale_price)</td>
                                        @else
                                            <td class="">@formatmoney($v->regular_price)</td>
                                        @endif
                                        <td class="">{{ $v->quantity }}</td>
                                        @if ($v->sale_price > 0)
                                        <td class="">@formatmoney($v->sale_price * $v->quantity)</td>
                                    @else
                                        <td class="">@formatmoney($v->regular_price * $v->quantity)</td>
                                    @endif
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="2">Không tìm thấy kết quả!</td>
                            @endif
                        </tbody>
                    </table>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Thông tin người đặt:</label>
                    </div>
                    @php 
                        $nameMb = DB::table('table_member')->where('id', $Order->id_member)->first(); 
                        $city = DB::table('table_provinces')->where('id', $Order->province)->first(); 
                        $district = DB::table('table_districts')->where('id', $Order->distrist)->first(); 
                        $ward = DB::table('table_wards')->where('id', $Order->ward)->first(); 
                    @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Xã/Phường</th>
                                <th scope="col">Quận/Huyện</th>
                                <th scope="col">Tỉnh</th>
                                <th scope="col">Yêu cầu</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td class="">{{ $nameMb->name }}</td>
                                <td class="">{{ $Order->phone }}</td> 
                                <td class="">{{ $Order->address }}</td> 
                                <td class="">{{ $ward->Name }}</td> 
                                <td class="">{{ $district->Name }}</td> 
                                <td class="">{{ $city->Name }}</td> 
                                <td class="">{{ $Order->note }}</td> 
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        
    </div>

</div>


@endsection
