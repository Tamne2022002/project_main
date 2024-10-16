@extends('admin.layouts.admin')
@section('title')
    <title>Thêm Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/simplenotify/simple-notify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/simplenotify/simple-notify.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper ">


        <form action="{{ route('product.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-footer text-sm sticky-top">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row col-12">

                            <div class="form-prod-left col-xl-8">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Nội dung Sản Phẩm
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group col-md-12">
                                            <label>Tên sách</label>
                                            <input type="text"
                                                class="text-capitalize form-control @error('name') is-invalid @enderror "
                                                name="name" placeholder="Nhập tên sách" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea class="height-summernote form-control summernote @error('description') is-invalid @enderror"
                                                    name="description" rows="3">
                                                {{ old('description') }}
                                            </textarea>
                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea class="height-summernote form-control summernote @error('content') is-invalid @enderror" name="content"
                                                    rows="3">
                                                {{ old('content') }}
                                            </textarea>
                                                @error('content')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-prod-right col-xl-4">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Thông tin sản phẩm
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group ">
                                            <label>Chọn Danh Mục</label>
                                            <select
                                                class="form-control select2_init @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                                <option value="">Chọn danh mục</option>
                                                {!! $htmlOption !!}
                                            </select>
                                            @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label>Nhà xuất bản:</label>
                                            <select class="form-control @error('publisher_id') is-invalid @enderror"
                                                name="publisher_id">
                                                <option value="">Chọn nhà xuất bản</option>
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('publisher_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Mã sách</label>
                                                <input type="text"
                                                    class="form-control @error('code') is-invalid @enderror" name="code"
                                                    placeholder="Nhập mã sách" value="{{ old('code') }}">
                                                @error('code')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá bán</label>
                                                <input type="number"
                                                    class="form-control format-price regular_price @error('regular_price') is-invalid @enderror"
                                                    name="regular_price" placeholder="Nhập giá bán"
                                                    value="{{ old('regular_price') }}">
                                                @error('regular_price')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tác giả:</label>
                                                <input type="text"
                                                    class="text-capitalize form-control  @error('author') is-invalid @enderror"
                                                    name="author" placeholder="Nhập tác giả:" value="{{ old('author') }}">
                                                @error('author')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá mới</label>
                                                <input type="number"
                                                    class="form-control format-price sale_price @error('sale_price') is-invalid @enderror"
                                                    name="sale_price" placeholder="Nhập giá mới"
                                                    value="{{ old('sale_price') }}">
                                                @error('sale_price')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Năm xuất bản:</label>
                                                <input type="text"
                                                    class="form-control @error('publishing_year') is-invalid @enderror"
                                                    name="publishing_year" placeholder="Nhập năm xuất bản"
                                                    value="{{ old('publishing_year') }}">
                                                @error('publishing_year')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Chiết khấu(%):</label>
                                                <input type="number"
                                                    class="form-control discount @error('discount') is-invalid @enderror"
                                                    name="discount" placeholder="" value="{{ old('discount') }}"
                                                    readonly>
                                                @error('discount')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Hiển thị:</label>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="status"
                                                        name="status" value="1"
                                                        @if (old('status') == 1) checked @endif>
                                                    <label class="form-check-label" for="status">Hiển thị</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nổi bật:</label>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="outstanding"
                                                        name="outstanding" value="1"
                                                        @if (old('outstanding') == 1) checked @endif>
                                                    <label class="form-check-label" for="outstanding">Nổi bật</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Hình ảnh sản phẩm
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="photoUpload-zone">
                                                <div class="photoUpload-detail" id="photoUpload-preview">
                                                    <img class="rounded" src="{{ asset('admins/imgs/noimage.png') }}"
                                                        alt="Alt Photo">
                                                </div>
                                                <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                                    <input type="file" class=" form-control-file"
                                                        name="product_photo_path" id="file-zone">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                                    <p class="photoUpload-or">hoặc</p>
                                                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình
                                                    </p>
                                                </label>
                                                <div class="photoUpload-dimension">Width: 220 px - Height: 325 px
                                                    (.jpg|.png|.jpeg)</div>
                                            </div>
                                            @error('product_photo_path')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Hình Ảnh Chi Tiết</label>
                                            <input type="file" multiple class="form-control-file" name="photo_path[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
