@extends('client.layouts.index')
@section('title')
    <title>Đăng nhập</title>
@endsection
@section('content')
    <div class="wrap-content">
        <div class="title-main">
            <span>
                ĐĂNG NHẬP
            </span>
        </div>
        <div class="content-main account-user">
            <form id="login-form-member" class="form w-25 m-auto" action="{{ route('user.postlogin') }}" method="POST">
                @csrf
                <div>
                    <div class="input-group mb-2">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control text-sm "
                            placeholder="Nhập email" autocomplete="off" />
                    </div>
                    <label class="emailMember-error error" for="emailMember" style=""></label>
                </div>
                @error('email')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
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
                @error('password')
                    <div style="color: #dd0505;
                    font-size: 1em;font-weight: bold;">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-between align-items-center">
                    <!--<div class="form-check form-check-login mb-0">
                        <label for="remember-me" class="text-info"><span>Ghi nhớ đăng nhập</span>
                            <span class="align-middle">
                                <input id="remember-me" name="remember_me" type="checkbox"></span></label>
                    </div>-->
                    <div class="form-check form-check-login mb-0">
                        <!--<a href="">Quên mật khẩu?</a>-->
                    </div>
                </div>

                <div class="text-center text-lg-start mt-3 btn-login-member">
                    <input type="submit" id="remember-me" name="remember_me"
                        class="btn-lg btn btn-sm bg-danger btn-block w-100" value="Đăng Nhập">
                </div>
                <div class="text-center mt-3 btn-login-member btn btn-primary w-100 text-center">
                    <a href="{{ route('redirect') }}" class="d-block"><svg style=" width:20px;height:20px;" role="img"
                            viewBox="10 10 28 28" xmlns="http://www.w3.org/2000/svg" aria-label="google"
                            class="sc-hLseeU idnFbI sc-iAEyYk bWqgHG">
                            <title id="social">google</title>
                            <path
                                d="M35.9999 24.2741C35.9999 23.4584 35.9324 22.6384 35.7884 21.8359H24.2417V26.4565H30.854C30.5796 27.9467 29.6979 29.2649 28.407 30.1026V33.1007H32.3519C34.6684 31.0108 35.9999 27.9246 35.9999 24.2741Z"
                                fill="#4285F4"></path>
                            <path
                                d="M24.2417 35.9984C27.5434 35.9984 30.3277 34.9359 32.3564 33.1018L28.4115 30.1037C27.314 30.8356 25.8971 31.25 24.2462 31.25C21.0526 31.25 18.3447 29.1382 17.3731 26.2988H13.3022V29.3895C15.3804 33.4412 19.6131 35.9984 24.2417 35.9984Z"
                                fill="#34A853"></path>
                            <path
                                d="M17.3685 26.298C16.8557 24.8078 16.8557 23.1941 17.3685 21.7039V18.6133H13.3022C11.5659 22.0037 11.5659 25.9982 13.3022 29.3886L17.3685 26.298Z"
                                fill="#FBBC04"></path>
                            <path
                                d="M24.2417 16.7492C25.987 16.7227 27.6738 17.3664 28.9378 18.548L32.4329 15.1223C30.2198 13.0854 27.2825 11.9655 24.2417 12.0008C19.6131 12.0008 15.3804 14.558 13.3022 18.6142L17.3686 21.7048C18.3357 18.8611 21.0481 16.7492 24.2417 16.7492Z"
                                fill="#EA4335"></path>
                        </svg></a>
                </div>
                <div class="no-account-text text-center">
                    <div>
                        Chưa có tài khoản? <a href="{{ route('user.register') }}">Đăng ký</a>
                    </div>

                </div>
            </form>
        </div>
        <div class="return">
            @if ($message = Session::get('success'))
                <div>
                    <div style="color: #12c300;
                font-size: 1.2em;font-weight: bold;">{{ $message }}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('fail'))
                <div>
                    <div style="color: #dd0505;
                font-size: 1.2em;font-weight: bold;">{{ $message }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
