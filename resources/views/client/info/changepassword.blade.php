@extends('client.layouts.index')

@section('title')
    <title>Đổi mật khẩu</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                Đổi mật khẩu
            </span>
        </div>
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
                    <h4 class=""><a href="{{ route('user.changepassword') }}">Đổi mật khẩu</a></h4>
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
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
