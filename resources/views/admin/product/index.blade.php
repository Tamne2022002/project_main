@extends('admin.layout.head')
@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/sumoselect.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/jquery.sumoselect.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="row mb-2">
                        <div class="col-md-4 filter-product-admin">
                            <label for="">Lọc theo danh mục</label>
                            <select multiple="multiple" name="product[]" data-url="{{ route('get-category-id') }}"
                                class="sumoselectfilterproduct">
                                @foreach ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tìm sản phẩm</label>
                            <form action="" class="form-inline" method="GET">
                                @csrf
                                <input class="search-keyword form-control border-end-0 border"
                                    value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                                    placeholder="Nhập từ khóa để tìm kiếm">
                                <input type="hidden" id="search_route" value="{{ route('product.index') }}">
                                <div class="input-group-append bg-primary rounded-right">
                                    <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('product.create') }} " class="btn btn-success float-right m-2">Thêm</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="filter-product-call-by-ajax">
                                @if (!$products->isEmpty())
                                    @foreach ($products as $v)
                                        <tr>
                                            <td class="text-capitalize">{{ $v['name'] }}-{{ $v['id'] }}</td>
                                            <td>
                                                <img class="adm-product-img"
                                                    src="{{ $v['product_photo_path'] ? $v['product_photo_path'] : asset('assets/noimage.jpg') }} "
                                                    alt="">
                                            </td>
                                            <td class="text-capitalize">{{ optional($v['id_list'])->name }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', ['id' => $v->id]) }}"
                                                    class="btn btn-default">Sửa</a>
                                                    <a href="{{ route('product.delete', ['id' => $v->id]) }}"
                                                    class="btn btn-danger action_delete">Xóa</a>
                                                </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="2">Không tìm thấy kết quả!</td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 pagination">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
