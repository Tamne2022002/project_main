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
                @csrf
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 "> 
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
                                        value="{{ $ImportOrder->order_code }}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Thời gian</label>
                                    <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" class="form-control"
                                        name="import_date"
                                        value="{{ \Carbon\Carbon::parse($ImportOrder->import_date)->format('Y-m-d\TH:i') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row col-12 list-import-invoice-detail">

                    @foreach ($ImportOrder->importinvoicedetail as $v)
                        <div class="col-3 import-invoice-detail">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <strong>{!! $v->product->name !!}
                                        </strong>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Số lượng nhập</label>
                                        <input type="number" value="{!! $v->quantity !!}" class="form-control"
                                            readonly>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
             </form> 
        </div> 
    </div> 
</div>


@endsection
