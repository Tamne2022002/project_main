@extends('client.layouts.index')

@section('title')
    <title>Đăng ký</title>
@endsection

@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                ĐĂNG KÝ
            </span>
        </div>
        <div class="content-main account-user">
            <form class="form w-50 m-auto" action="{{route('user.postregister')}}" method="POST">
                @csrf
                <div>
                    <label class="mb-1">Họ:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" name="lastname" id="lastname" class="form-control text-sm"
                        value="{{ old('lastname') }}" placeholder="Nhập họ" autocomplete="off" />
                    </div>
                </div>
                @error('lastname')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Tên:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" name="firstname" id="firstname" class="form-control text-sm "
                        value="{{ old('firstname') }}"  placeholder="Nhập tên" autocomplete="off" />
                    </div>
                </div>
                @error('firstname')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Số điện thoại:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas  fa-phone"></span>
                            </div>
                        </div>
                        <input type="text" name="phone" class="form-control text-sm "
                        value="{{ old('phone') }}"  placeholder="Nhập số điện thoại" autocomplete="off" />
                    </div>
                </div>
                @error('phone')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Địa chỉ:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map"></span>
                            </div>
                        </div>
                        <input type="text" name="address" class="form-control text-sm "
                        value="{{ old('address') }}"  placeholder="Nhập địa chỉ" autocomplete="off" />
                    </div>
                </div>
                @error('address')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Email:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}"
                         class="form-control text-sm " placeholder="Nhập email" autocomplete="off" />
                    </div>
                    <label class="emailMember-error error"   for="emailMember"
                        style=""></label>
                </div>
                @error('email')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Mật khẩu:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="password" id="password" class="form-control text-sm"
                            placeholder="Nhập mật khẩu" />
                        <div class="input-group-append">
                            <div class="input-group-text show-password">
                                <span class="fas fa-eye"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @error('password')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div>
                    <label class="mb-1">Nhập lại mật khẩu:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="confirm-password" id="confirm-password"
                            class="form-control text-sm" placeholder="Nhập lại mật khẩu" />
                        <div class="input-group-append">
                            <div class="input-group-text show-password">
                                <span class="fas fa-eye"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @error('confirm-password')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div class="text-center text-lg-start mt-3 btn-login-member">
                    <input type="submit" class="btn-lg btn btn-sm bg-danger btn-block w-100 "
                        value="Đăng ký">
                </div> 
            </form>
            @if ($message = Session::get('fail'))
            <div>
                <div style="color: #dd0505;
            font-size: 1.2em;font-weight: bold;">{{ $message }}</div>
            </div>
             @endif
        </div>
    </div>
@endsection