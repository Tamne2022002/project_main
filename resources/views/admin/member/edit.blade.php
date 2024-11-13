@extends('admin.layout.head') @section('title')
    <title>Sửa Người Dùng</title>
    @endsection @section('content')
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/admins/js/app.js') }}"></script>
@endsection
<div class="content-wrapper bg-white">
    <div class="content">
        <div class="container-fluid pt-3">
            <form action="{{ route('member.update', ['id' => $member->id]) }}  " method="POST"
                enctype="multipart/form-data">
                <div class="card card-primary card-outline text-sm">
                    <div class="d-flex px-3 py-1 my-2 ">
                        <button type="submit" class="btn btn-primary submit-check mr-2">Lưu</button>
                        <button type="reset" class="btn btn-secondary mr-2">Làm lại</button>
                        <a href="{{ route('member.index') }}" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
                @csrf
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Tên Nhân Viên</label>
                        <input type="text" class="text-capitalize form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="" value="{{ $member->name }}" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="tel" pattern="^0(3[0-9]|5[6789]|7[0-89]|8[1-9]|9[1-46-9])[0-9]{7}$"
                            title="Vui lòng điền đúng các đầu số di động hiện có ở VN (03, 05, 07, 08, 09)"
                            minlength="10" maxlength="11" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" placeholder="Nhập số điện thoại" value="{{ $member->phone }}" required>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            placeholder="Nhập địa chỉ" value="{{ $member->address }}" required>

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="text-lowercase form-control " name="email"
                            placeholder="Nhập email" value="{{ $member->email }}" readonly required>

                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu</label>
                        <input type="password" class="form-control " name="password" placeholder="Nhập mật khẩu">
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection