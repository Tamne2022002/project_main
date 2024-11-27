@extends('admin.layout.head')
@section('title')
    <title>Sửa Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/simplenotify/simple-notify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/simplenotify/simple-notify.js') }}"></script>
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper bg-white">
        <div class="content">
            <div class="container-fluid pt-3">
                <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary card-outline text-sm sticky-top">
                        <div class="d-flex px-3 py-1 my-2 ">
                            <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                            <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                            <a href="{{ route('product.index') }}" class="btn btn-danger">Thoát</a>
                        </div>
                    </div>
                    <div class="content">
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
                                                    class="text-capitalize form-control  @error('name') is-invalid @enderror "
                                                    name="name" value="{{ $product->name }}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea class="form-control summernote" name="desc" rows="3">
                                                    {!! $product->desc !!}
                                        </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <textarea class="form-control summernote" name="content" rows="3">
                                                    {!! $product->content !!}
                                        </textarea>
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
                                                    class="form-control select2_init @error('id_list') is-invalid @enderror"
                                                    name="id_list">
                                                    <option value="">Chọn danh mục</option>
                                                    {!! $htmlOption !!}
                                                </select>
                                                @error('id_list')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label>Nhà xuất bản:</label>
                                                <select class="form-control @error('id_publisher') is-invalid @enderror"
                                                    name="id_publisher">
                                                    <option value="">Chọn Nhà xuất bản</option>
                                                    @foreach ($publishers as $publisher)
                                                        <option value="{{ $publisher->id }}"
                                                            @if ($product->id_publisher == $publisher->id) selected @endif>
                                                            {{ $publisher->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_publisher')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Mã sách</label>
                                                    <input type="text" class="form-control" name="code"
                                                        value="{{ $product->code }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Giá bán</label>
                                                    <input type="number" class="form-control format-price regular_price"
                                                        name="regular_price" value="{{ $product->regular_price }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tác giả:</label>
                                                    <input type="text" class="text-capitalize form-control"
                                                        name="author" value="{{ $product->author }}">
                                                </div>
                                                <div class="form-group col-md-6 d-none">
                                                    <label>Giá mới</label>
                                                    <input type="number" class="form-control format-price sale_price "
                                                        name="sale_price" value="{{ $product->sale_price }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Năm xuất bản:</label>
                                                    <input type="text" class="form-control" name="publishing_year"
                                                        value="{{ $product->publishing_year }}">
                                                </div>
                                                <div class="form-group col-md-6 d-none">
                                                    <label>Chiết khấu(%):</label>
                                                    <input type="number" class="form-control discount" name="discount"
                                                        value="{{ $product->discount }}" readonly>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Hiển thị:</label>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="status"
                                                            name="status" value="1"
                                                            @if (old('status', $product->status) == 1) checked @endif>
                                                        <label class="form-check-label" for="status">Hiển thị</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nổi bật:</label>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="featured"
                                                            name="featured" value="1"
                                                            @if (old('featured', $product->featured) == 1) checked @endif>
                                                        <label class="form-check-label" for="featured">Nổi bật</label>
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
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="photoUpload-zone">
                                                    @if (!empty($product->photo_name))
                                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                                            <img class="rounded image-core adm-product-img"
                                                                src="{{ $product->photo_path }}" alt="">
                                                        </div>
                                                    @else
                                                        <div class="photoUpload-detail" id="photoUpload-preview">
                                                            <img class="rounded" src="{{ asset('assets/noimage.jpg') }}"
                                                                alt="Alt Photo">
                                                        </div>
                                                    @endif
                                                    <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                                        <input type="file" class=" form-control-file"
                                                            name="photo_path" id="file-zone">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                                        <p class="photoUpload-or">hoặc</p>
                                                        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn
                                                            hình
                                                        </p>
                                                    </label>
                                                    <div class="photoUpload-dimension">Width: 220 px - Height: 325 px
                                                        (.jpg|.png|.jpeg|.webp)</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Hình Ảnh Chi Tiết</label>
                                                <input type="file" multiple class="form-control-file"
                                                    name="photo_path[]">
                                                <div class="col-md-12 box-gallery"> 
                                                    @foreach ($product->productGallery as $productGalleryItem)
                                                        <div class="box-gallery-item">
                                                            <img class="image-gallery w-100"
                                                                src="{{ $productGalleryItem->photo_path }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                {{-- <button type="submit" class="btn btn-primary">Lưu</button> --}}
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
