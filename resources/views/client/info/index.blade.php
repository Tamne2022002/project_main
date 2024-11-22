@extends('client.layouts.index')

@section('title')
    <title>Thông tin cá nhân</title>
@endsection
@section('content')
    <!-- Thông tin user -->
    <div class="wrap-content">
 
        <div class="content-main" style="margin-top: 8em">
      
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
                <div class="user-list-inf col-md-3">
                    <div class="user-box-left">
                        <h6 class="user-inf-title">Thông tin cá nhân</h6>
                        <div class="box">
                            <h3 class="user-list-inf-item">
                                <a href="{{route('user.info')}}"><span class="user-list-item-name">Thông tin tài khoản</span></a>
                            </h3>
                            <h3 class="user-list-inf-item">
                                <a href="{{route('user.order')}}"><span class="user-list-item-name">Lịch sử mua hàng</a>
                            </h3>
                            <h3 class="user-list-inf-item">
                                <a href="{{route('user.changepassword')}}"><span class="user-list-item-name">Đổi mật khẩu</a>
                            </h3>
                            <h3 class="user-list-inf-item">
                                <a href="{{ route('user.signout') }}"><span class="user-list-item-name">Đăng xuất</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box-form">
                        <div class="title__form">Thông tin</div>
                        <div class="content__form">
                            <form class="flex-user-infor" action="{{ route('user.info.update') }}" method="POST">
                                @csrf
                                <div class="user-infor-detail">
                                    <div class="form-group mb-2"> 
                                        <label class="fw-bold mb-2" for>Tên: </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" placeholder="Nhập họ và tên">
                                    </div>
                                    @error('name')
                                        <div style="color: #dd0505;
                                        font-size: 1em;font-weight: bold;">{{ $message }}</div>
                                    @enderror 
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-2" for>Email: </label>
                                        <input type="text" class="form-control" id="email"
                                            value="{{ $user->email }}" placeholder="Nhập email" readonly>
                                    </div> 
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
