@extends('admin.layout.head') @section('title')
    <title>Cấu hình chung</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
     <div class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <div class="card card-primary card-outline text-sm">
                                <div class="d-flex px-3 py-1 my-2 ">
                                    <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button> 
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Favicon</label>
                                <div class="photoUpload-zone col-4">
                                    <div class="photoUpload-detail" id="photoUpload-preview">
                                        <img class="rounded" src="{{ $settings->favicon_path }}" alt="Alt Photo">
                                    </div>
                                    <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                        <input type="file" class=" form-control-file" name="favicon_path"
                                            id="file-zone">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                        <p class="photoUpload-or">hoặc</p>
                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                            hình
                                        </p>
                                    </label>
                                    <div class="photoUpload-dimension">Width: 50 px - Height: 50 px
                                        (.jpg|.png|.jpeg)</div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Logo</label>
                                <div class="photoUpload-zone col-4">
                                    <div class="photoUpload-detail" id="photoUpload-preview2">
                                        <img class="rounded" src="{{ $settings->logo_path }}" alt="Alt Photo">
                                    </div>
                                    <label class="photoUpload-file" id="photo-zone2" for="file-zone2">
                                        <input type="file" class=" form-control-file" name="logo_path"
                                            id="file-zone2">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                        <p class="photoUpload-or">hoặc</p>
                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                            hình
                                        </p>
                                    </label>
                                    <div class="photoUpload-dimension">Width: 50 px - Height: 50 px
                                        (.jpg|.png|.jpeg)</div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Tên doanh nghiệp</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên doanh nghiệp" value="{{ $settings->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Điện thoại</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" placeholder="Nhập điện thoại" value="{{ $settings->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Mô tả</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Nhập mô tả" value="">{{ $settings->description }}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Zalo</label>
                                <input type="number" class="form-control @error('zalo') is-invalid @enderror"
                                    name="zalo" placeholder="Nhập zalo" value="{{ $settings->zalo }}">
                                @error('zalo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Iframe google map</label>
                                <textarea type="text" class="text-lowercase form-control @error('iframe_map') is-invalid @enderror" name="iframe_map"
                                    placeholder="Nhập iframe google map" value="">{{ $settings->iframe_map }}
                                </textarea>
                                @error('iframe_map')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="email"
                                    class="text-lowercase form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Nhập email" value="{{ $settings->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" placeholder="Nhập địa chỉ" value="{{ $settings->address }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Fanpage</label>
                                <input type="text"
                                    class="text-lowercase form-control  @error('fanpage') is-invalid @enderror"
                                    name="fanpage" placeholder="Nhập fanpage" value="{{ $settings->fanpage }}">
                                @error('fanpage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Link google map</label>
                                <input type="text"
                                    class="text-lowercase form-control  @error('link_map') is-invalid @enderror"
                                    name="link_map" placeholder="Nhập link google map"
                                    value="{{ $settings->link_map }}">
                                @error('link_map')
                                    is-invalid
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Website</label>
                                <input type="text"
                                    class="text-lowercase form-control  @error('website') is-invalid @enderror"
                                    name="website" placeholder="Nhập website" value="{{ $settings->website }}">
                                @error('website')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
