<?php 
$func = new App\Helpers\Func();  
?>
@extends('admin.layout.head') @section('title')
    <title>Nhà Xuất Bản</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script type="text/javascript">
        var PERMISSION =  @php echo $func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_publisher')?'"true"':'"false"' @endphp;
    </script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">
            @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'add_publisher'))  
            <div class="w-100 card card-primary card-outline text-sm">
                <div class="col-md-6">
                    <a href="{{ route('publisher.create') }}" class="btn btn-success m-2">Thêm</a>
                </div>
            </div>
            @endif 
            <div class="w-100 card card-primary card-outline text-sm px-3 py-3">
                <div class="card-title mb-2">Tìm kiếm Nhà xuất bản:</div>
                <form action="" class="form-inline" method="GET">
                    @csrf
                    <input class="search-keyword form-control border-end-0 border"
                        value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                        placeholder="Nhập từ khóa để tìm kiếm">
                    <input type="hidden" id="search_route" value="{{ route('publisher.index') }}">
                    <div class="input-group-append bg-primary rounded-right">
                        <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên Nhà Xuất Bản</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$publishers->isEmpty())
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->name }}</td>
                                    <td>
                                        <img class="publisher-image-thumb" src="{{ !empty($publisher->photo_path) ? $publisher->photo_path : asset('assets/noimage.jpg') }}"
                                            alt="">
                                    </td>
                                    <td>
                                        @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'edit_publisher'))  
                                        <a href="{{ route('publisher.edit', ['id' => $publisher->id]) }}"
                                            class="btn btn-default">Sửa</a>                                            
                                        @endif
                                        @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_publisher'))                                              
                                            <a href=" "data-url="{{ route('publisher.delete', ['id' => $publisher->id]) }}"
                                            class="btn btn-danger action_delete">Xóa</a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="2">Không tìm thấy kết quả!</td>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $publishers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
