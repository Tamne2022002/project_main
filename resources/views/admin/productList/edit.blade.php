@extends('admin.layout.head') @section('title')
    <title>Sửa Danh Mục Sản Phẩm</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <form action="{{ route('productList.update', ['id' => $category->id]) }}" method="POST">
            <div class="container-fluid pt-3">
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                        <a href="{{ route('productList.index') }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                @csrf
                <div class="card card-primary card-outline text-sm mr-0">
                    <div class="card-header">
                        <h3 class="card-title">Tên Danh Mục</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $category->name }}" name="name" placeholder="Nhập tên danh mục">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Danh Mục Chính</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select class="form-control select-category-parent" name="id_parent">
                                <option value="0">Chọn Danh Mục Chính</option>
                                {!! $categoryoption !!}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 row">
                    <div class="form-group col-md-6">
                        <label>Hiển thị:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                @if (old('status', $category->status) == 1) checked @endif>
                            <label class="form-check-label" for="status">Hiển thị</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nổi bật:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                value="1" @if (old('featured', $category->featured) == 1) checked @endif>
                            <label class="form-check-label" for="featured">Nổi bật</label>
                        </div>
                    </div>
                </div>
                {{-- <button type="submit" class="btn btn-primary">Lưu</button> --}}
            </div>
        </form>
    </div>
</div>


@endsection
