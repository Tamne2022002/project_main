<?php 
$func = new App\Helpers\Func();  
?>
@extends('admin.layout.head') @section('title')
    <title>Photo</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script type="text/javascript">
        var PERMISSION = @php echo $func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_slider')?'"true"':'"false"' @endphp;
    </script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">
            <div class="w-100 card card-primary card-outline text-sm">
                <div class="col-md-6">
                    <a href="{{ route('photo.create', ['type' => $type]) }}" class="btn btn-success m-2">Thêm</a>
                </div>
            </div>
            <div class="w-100 card card-primary card-outline text-sm px-3 py-3">
                <form action="" class="form-inline" method="GET">
                    @csrf
                    <input class="search-keyword form-control border-end-0 border"
                        value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                        placeholder="Nhập từ khóa để tìm kiếm">
                    <input type="hidden" id="search_route" value="{{ route('photo.index', ['type' => $type]) }}">
                    <div class="input-group-append bg-primary rounded-right">
                        <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên Slider</th>

                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$sliders->isEmpty())
                        @foreach ($sliders as $slider)
                            <tr>

                                <td class="text-capitalize">{{ $slider->name }}</td>

                                <td>
                                    <img class="slider-image-thumb" src="{{ $slider->photo_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('photo.edit', ['id' => $slider->id, 'type' => $type]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href=" "
                                        data-url="{{ route('photo.delete', ['id' => $slider->id, 'type' => $type]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="2">Không tìm thấy kết quả!</td>
                    @endif

                </tbody>
            </table>
            <div class="col-md-12">
                {{ $sliders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
