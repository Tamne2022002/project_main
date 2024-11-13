<?php
$func = new App\Helpers\Func();
?>
@extends('admin.layout.head') @section('title')
    <title>Danh Sách Người Dùng</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script type="text/javascript">
        var PERMISSION = @php echo $func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_member')?'"true"':'"false"' @endphp;
    </script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetarlert2/sweetarlert2.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">
            @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'add_member'))
                <div class="w-100 card card-primary card-outline text-sm">
                    <div class="col-md-6">
                        <a href="{{ route('member.create') }}" class="btn btn-success m-2">Thêm</a>
                    </div>
                </div>
            @endif
            <div class="w-100 card card-primary card-outline text-sm px-3 py-3">

                <form action="" class="form-inline" method="GET">
                    @csrf
                    <input class="search-keyword form-control border-end-0 border"
                        value="{{ request()->get('search_keyword') }}" type="search" name="search_keyword"
                        placeholder="Nhập từ khóa để tìm kiếm">
                    <input type="hidden" id="search_route" value="{{ route('member.index') }}">
                    <div class="input-group-append bg-primary rounded-right">
                        <button class="btn btn-navbar text-white" onclick="onSearch()" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Người Dùng</th>
                                <th scope="col">Email</th>

                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$members->isEmpty())
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>
                                            @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'edit_member'))
                                                <a href="{{ route('member.edit', ['id' => $member->id]) }} "
                                                    class="btn btn-default">Sửa</a>
                                            @endif
                                            @if ($func->CheckPermissionAdmin(session()->get('user')['id'], 'delete_member'))
                                                <a href=""
                                                    data-url="{{ route('member.delete', ['id' => $member->id]) }}"
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
                    {{ $members->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection