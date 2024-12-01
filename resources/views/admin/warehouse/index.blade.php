<?php 
$func = new App\Helpers\Func();  
?>
@extends('admin.layout.head')
@section('title')
    <title>Kho</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/sumoselect.min.css') }}">
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script type="text/javascript">
        var PERMISSION =  @php echo $func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_warehouse')?'"true"':'"false"' @endphp;
    </script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('/admins/js/jquery.sumoselect.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper bg-white">
        <div class="content">
            <div class="container-fluid pt-3">
                <div class="w-100 card card-primary card-outline text-sm px-3 py-3">
                    <div class="row">
                        {{-- <div class="col-md-4 filter-product-warehouse-admin">
                            <label for="">Lọc theo danh mục</label>
                            <select multiple="multiple" name="product[]" data-url="{{ route('get-category-id-warehouse') }}"
                                class="sumoselectfilterproductwarehouse">
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-4">
                            <label for="">Tìm sản phẩm</label>
                            <form action="" class="form-inline" method="GET">
                                @csrf
                                <input class="search-keyword form-control border-end-0 border"
                                    value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                                    placeholder="Nhập từ khóa để tìm kiếm">
                                <input type="hidden" id="search_route" value="{{ route('warehouse.index') }}">
                                <div class="input-group-append bg-primary rounded-right">
                                    <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-md-5" scope="col">Tên Sản Phẩm</th>
                                <th class="col-md-2" scope="col">Hình Ảnh</th>
                                <th class="col-md-4" scope="col">Danh mục</th>
                                <th class="col-md-1" scope="col">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody class="filter-product-warehouse-call-by-ajax">
                            @if (!$warehouse->isEmpty()) 
                                @foreach ($warehouse as $warehouseItem)
                                    <tr class="row">
                                        <td class="text-capitalize col-md-5">
                                            {{ $warehouseItem->product_name }}
                                        </td>
                                        <td class="col-md-2">
                                            <img class="adm-product-img" src="{{ !empty($warehouseItem->photo_name) ? $warehouseItem->photo_path : asset('assets/noimage.jpg') }}"
                                                alt="">
                                        </td>
                                        <td class="text-capitalize col-md-4">{{ $warehouseItem->category_name }}</td>
                                        <td class="text-capitalize col-md-1">{{ $warehouseItem->quantity }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="2">Không tìm thấy kết quả nào cho từ khóa của bạn.</td>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $warehouse->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
