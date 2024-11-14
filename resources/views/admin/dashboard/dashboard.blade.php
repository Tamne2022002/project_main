@php
    $year_now = (int) date('Y', time());
@endphp
@extends('admin.layout.head') @section('title')
    <title>Thống kê</title>
    @endsection @section('content')@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/simplenotify/simple-notify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('vendors/simplenotify/simple-notify.js') }}"></script>
    <script src="{{ asset('/adminlte/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('/adminlte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('/adminlte/dist/js/pages/dashboard2.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
    <script type="text/javascript">
        const profitBaseOnDate = @php echo json_encode($profitBaseOnDate) @endphp;
    </script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng danh mục</span>
                            <span class="info-box-number">
                                {{ $category->count() }}
                            </span>
                        </div>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng sản phẩm</span>
                            <span class="info-box-number">{{ $product->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tổng số đơn hàng</span>
                            <span class="info-box-number">{{ $hdball->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-wallet"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" id="statistic-title">Doanh thu tháng {{ date('m/Y') }}</span>
                            <span class="info-box-number" id="statistic-number">@formatmoney($total_sale)</span>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thống kê</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3" id="filter">
                                <div class="col-3">
                                    <select name="month" id="month" class="form-control">
                                        <option value="">Chọn tháng</option>
                                        @for ($month = 1; $month <= 12; $month++)
                                            <option value="{{ $month }}"
                                                {{ $month == date('m') ? 'selected' : '' }}>
                                                Tháng {{ $month }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select name="year" id="year" class="form-control">
                                        <option value="">Chọn năm</option>
                                        @for ($year = 2000; $year <= $year_now; $year++)
                                            <option value="{{ $year }}"
                                                {{ $year == $year_now ? 'selected' : '' }}>Năm {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="button" id="btn-filter" class="btn btn-success">Thống kê</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="chart-js" height="180" style="height:320px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main row -->
                <div class="col-md-12">
                    <!--/.direct-chat -->
                    <!-- /.row -->

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Đơn hàng mới nhất</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sold_pro as $item)
                                            @php
                                                $order_status = $item->status - 1;
                                                $color = [
                                                    0 => 'badge-primary',
                                                    1 => 'badge-info',
                                                    2 => 'badge-success',
                                                    3 => 'badge-warning',
                                                    4 => 'badge-success',
                                                    5 => 'badge-danger',
                                                ];
                                            @endphp
                                            <tr>
                                                <td><a
                                                        href="{{ route('order.view', ['id' => $item->id]) }}">{{ $item->order_code }}</a>
                                                </td>
                                                <td>@formatmoney($item->total_price)</td>
                                                <td class="w-50 badge {{ $color[$order_status] }}">
                                                    {{ $status[$order_status]['name'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
