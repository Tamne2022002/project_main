@extends('admin.layout.head') @section('title')
    <title>Thêm Hóa Đon Nhập</title>
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
            <form action="{{ route('import_order.store') }}" method="POST">
                @csrf
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        <a href="{{ route('import_order.index') }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="card card-primary card-outline text-sm col-8">
                        <div class="card-header">
                            <h3 class="card-title">
                                Thông tin hóa đơn
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mã hóa đơn</label>
                                    <input type="text" class="form-control" name="order_code"
                                        value="{{ $ImportOrderCode }}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Thời gian</label>
                                    <input type="datetime-local" class="form-control" name="import_date"
                                        value="{{ $TimeCreateImportOrder->format('Y-m-d\TH:i') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        /*
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input type="number" class="form-control format-price total_price" name="total_price" value="" readonly>
                        </div>
                    </div>
                     */
                    @endphp
                    <div class="col-4"> 
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title"> 
                                        Chọn Sản Phẩm 
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group ">
                                    <select multiple="multiple" name="product[]" data-url="get-product-id"
                                        class="sumoselectimportinvoice">
                                        @foreach ($products as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 list-product-call-by-ajax">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
