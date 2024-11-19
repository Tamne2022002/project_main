@extends('admin.layout.head') @section('title')
    <title>Thêm Bài viết</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
     <div class="content">
        <div class="container-fluid pt-3">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card card-primary card-outline text-sm sticky-top">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                @csrf
                <div class="row">
                    <div class="form-news-left col-xl-8">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Nội dung bài viết
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Bài viết</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Nhập tên bài viết" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả Bài viết</label>
                                    <textarea name="desc" class="form-control summernote" rows="4">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung Bài viết</label>
                                    <textarea name="content" class="form-control summernote" rows="4">{{ old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-news-left col-xl-4">
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Hình ảnh bài viết
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="photoUpload-zone">
                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                            <img class="rounded" src="{{ asset('admins/imgs/noimage.png') }}"
                                                alt="Alt Photo">
                                        </div>
                                        <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                            <input type="file" class=" form-control-file" name="photo_path"
                                                id="file-zone">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                            <p class="photoUpload-or">hoặc</p>
                                            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                                hình
                                            </p>
                                        </label>
                                        <div class="photoUpload-dimension">Width: 220 px - Height: 325 px
                                            (.jpg|.png|.jpeg)</div>
                                    </div>
                                </div>
                                <div class="row">
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
                                            <input type="checkbox" class="form-check-input" id="featured"
                                                name="featured" value="1"
                                                @if (old('featured') == 1) checked @endif>
                                            <label class="form-check-label" for="featured">Nổi bật</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
