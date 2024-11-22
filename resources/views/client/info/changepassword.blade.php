@extends('client.layouts.index')

@section('title')
    <title>Đổi mật khẩu</title>
@endsection

@section('content')
    <div class="wrap-content"> 
        <div class="content-main" style="margin-top: 8em">
            <div class="form-add-top row">
               
                <div class="user-list-inf col-md-3">
                    <div class="user-box-left">
                        <h6 class="user-inf-title">Đổi mật khẩu</h6>
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
                <div class="col-md-6">
                    <form action="{{ route('user.changepassword.update') }}" class="form " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="" class="mb-2"><b>Mật khẩu hiện tại: </b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" name="current_password" id="current_password" class="form-control text-sm"
                                    placeholder="Nhập mật khẩu hiện tại" />
                                <div class="input-group-append">
                                    <div class="input-group-text show-password">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('current_password')
                            <div style="color: #dd0505;
                            font-size: 1em;font-weight: bold;">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="" class="mb-2"><b>Mật khẩu mới: </b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" name="new_password" id="new_password" class="form-control text-sm"
                                    placeholder="Nhập mật khẩu mới" />
                                <div class="input-group-append">
                                    <div class="input-group-text show-password">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('new_password')
                        <div style="color: #dd0505;
                            font-size: 1em;font-weight: bold;">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="" class="mb-2"><b>Xác nhận mật khẩu mới: </b></label>
                            <div class="input-group mb-3">
                                <div class="input-group-append login-input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" name="new_password_confirm" id="new_password_confirm"
                                    class="form-control text-sm" placeholder="Xác nhận mật khẩu mới" />
                                <div class="input-group-append">
                                    <div class="input-group-text show-password">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('new_password_confirm')
                        <div style="color: #dd0505;
                            font-size: 1em;font-weight: bold;">{{ $message }}</div>
                        @enderror
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
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
