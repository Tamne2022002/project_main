@extends('admin.layout.head') @section('title')
    <title>Thêm Vai Trò</title>
    @endsection @section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white"> 
    <div class="content role-style">
        <div class="container-fluid pt-3">
            <div class="row">
                <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="col-12">
                        <div class="card card-primary card-outline text-sm">
                            <div class="d-flex px-3 py-1 my-2 ">
                                <button type="submit" class="btn btn-primary check-roles submit-check mr-2">Lưu</button>
                                <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-danger">Thoát</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-role-left ">
                            <div class="card card-primary card-outline text-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Nội dung vai trò
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên vai trò</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Nhập tên vai trò" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả vai trò</label>
                                        <textarea name="display_name" class="form-control @error('display_name') is-invalid @enderror" rows="4">{{ old('display_name') }}</textarea>
                                        @error('display_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label for="">
                                    <input type="checkbox" value="" name=" " id=""
                                        class="checkbox_all">
                                    Chọn tất cả
                                </label>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($permissionsParent as $permissionsParentItem)
                                        <div class="col-4">
                                            <div class="checkbox-role card border-primary mb-3">
                                                <div class="card-header card-header-role">
                                                    <label for="">
                                                        <input type="checkbox" value="{{ $permissionsParentItem->id }}"
                                                            name=" " id="" class="checkbox_parent">
                                                    </label>
                                                    <b class="text-uppercase text-light">
                                                        Role {{ $permissionsParentItem->name }}
                                                    </b>
                                                </div>
                                                <div class="row">
                                                    @foreach ($permissionsParentItem->PermissionChildren as $permissionsChildrenItem)
                                                        <div class="card-body col-6">
                                                            <div class="text-primary">
                                                                <h5 class="card-title">
                                                                    <label for="">
                                                                        <input type="checkbox"
                                                                            value="{{ $permissionsChildrenItem->id }}"
                                                                            name="permission_id[]" id=""
                                                                             class="checkbox_children">
                                                                    </label>
                                                                    {{ $permissionsChildrenItem->name }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const checkboxes = document.querySelectorAll('input[type="checkbox"].checkbox_children');
    const submitButton = document.querySelector('.submit-check');

    form.addEventListener('submit', function (e) {
        let isChecked = false;
 
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                isChecked = true;
            }
        });

        if (!isChecked) {
            e.preventDefault();
            Swal.fire('Thông báo', 'Vui lòng chọn ít nhất một quyền trước khi lưu!',
            'warning');
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
 
    
