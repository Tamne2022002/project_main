@extends('client.layouts.index')

@section('title')
    <title>Thông tin người dùng</title>
@endsection
@section('content')
    <!-- Thông tin user -->
    <div class="wrap-content">
 
        <div class="content-main">
            <div class="form-add-top row">
                <div class="return">
                    @if ($message = Session::get('success'))
                        <div>
                            <div style="color: #12c300;
                    font-size: 1.2em;font-weight: bold;">
                                {{ $message }}</div>
                        </div>
                    @endif
                    @if ($message = Session::get('fail'))
                        <div>
                            <div style="color: #dd0505;
                    font-size: 1.2em;font-weight: bold;">
                                {{ $message }}</div>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">
                    <h4 class=""><a href="{{ route('user.info') }}">Thông tin tài khoản</a></h4>
                    <h4 class=""><a href="{{ route('user.order') }}">Lịch sử mua hàng</a></h4>
                    @if ($user->password != null)
                        <h4 class=""><a href="{{ route('user.changepassword') }}">Đổi mật khẩu</a></h4>
                    @else
                        
                    @endif
                </div>
                <div class="col-md-9">
                    <form class="flex-user-infor" action="{{ route('user.info.update') }}" method="POST">
                        @csrf
                        <div class="user-infor-detail">
                            <div class="form-group mb-2">
                                <!-- Set khi đăng nhập r thì hiện thông tin vào form sửa thì click vào r đổi thôi -->
                                <label class="fw-bold mb-2" for>Họ: </label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $user->last_name }}" placeholder="Nhập họ và tên">
                            </div>
                            @error('last_name')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <!-- Set khi đăng nhập r thì hiện thông tin vào form sửa thì click vào r đổi thôi -->
                                <label class="fw-bold mb-2" for>Tên: </label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $user->first_name }}" placeholder="Nhập họ và tên">
                            </div>
                            @error('first_name')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <label class="fw-bold mb-2" for>Email: </label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" placeholder="Nhập email">
                            </div>
                            @error('email')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <label class="fw-bold mb-2" for>Số điện thoại: </label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" placeholder="Nhập số điện thoại">
                            </div>
                            @error('phone')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-2">
                                <label class="fw-bold mb-2" for>Địa chỉ: </label>
                                <input type="text" class="form-control"
                                    id="address" name="address"
                                    value="{{$user->address}}"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            @error('address')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="d-flex gap-2 mt-2">
                                <div class="flex-btn">
                                    <button type="submit" class="btn btn-primary" id="submitAddress">Cập nhật</button>
                                </div>
                                <div class="flex-btn">
                                    <a href="{{ route('user.logout') }}" class="btn btn-danger" title="Đăng xuất">
                                        Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
