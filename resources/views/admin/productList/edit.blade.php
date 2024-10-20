@extends('admin.layout.head') @section('title')
    <title>Sửa Danh Mục Sản Phẩm</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper">
 
    <div class="content">
        <div class="container-fluid pt-3">

            <form action="{{ route('productList.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                <div class="row col-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $category->name }}" name="name" placeholder="Nhập tên danh mục">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Chọn Danh Mục Cha</label>
                            <select class="form-control select-category-parent" name="id_parent">
                                <option value="0">Chọn Danh Mục Cha</option>
                                {!! $categoryoption !!}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 row">
                        <div class="form-group col-md-6">
                            <label>Hiển thị:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="status"
                                    name="status" value="1"
                                    @if (old('status', $category->status) == 1) checked @endif>
                                <label class="form-check-label" for="status">Hiển thị</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nổi bật:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="featured"
                                    name="featured" value="1"
                                    @if (old('featured', $category->featured) == 1) checked @endif>
                                <label class="form-check-label" for="featured">Nổi bật</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>

        </div>
    </div>
</div>


@endsection
