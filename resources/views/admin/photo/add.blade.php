@extends('admin.layout.head') @section('title')
    <title>Thêm Slider</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">

            <form action="{{ route('photo.store', ['type' => $type]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                        <a href="{{ route('photo.index', ['type' => $type]) }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                <div class="row">
                    <div class="row col-12">
                        <div class="form-slider-left col-xl-8">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Nội dung
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Nhập tên" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-slider-right col-xl-4">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Hình ảnh slider
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
                                                <img class="rounded" src="{{ asset('assets/noimage.jpg') }}"
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
                                            <div class="photoUpload-dimension">Width: 1366 px - Height: 775 px
                                                (.jpg|.png|.jpeg)</div>
                                        </div>
                                        @error('photo_path')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
