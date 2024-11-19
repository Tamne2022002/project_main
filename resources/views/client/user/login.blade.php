<!DOCTYPE html>
 <html lang="en">
    <head>
        @include('client.partials.head')
        @include('client.partials.css')

    @section('title')
        <title>Đăng nhập</title>
    @endsection
    </head>
    <body>
        <div class="content-main account-user">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" action="{{route('user.postlogin')}}" method="POST">
                            @csrf
                            <span class="login100-form-title p-b-26">
                                Đăng nhập
                            </span>
                            <span class="login100-form-title p-b-48">
                                <i class="zmdi zmdi-font"></i>
                            </span>

                            <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                                <input class="input100" type="text" name="email">
                                <span class="focus-input100" data-placeholder="Email"></span>
                            </div>
                            @error('email')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <span class="btn-show-pass">
                                    <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="pass">
                                <span class="focus-input100" data-placeholder="Password"></span>
                            </div>
                            @error('password')
                                <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">{{ $message }}</div>
                            @enderror
                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" type="submit">
                                        Đăng nhập
                                    </button>
                                </div>
                            </div>
                <div class="text-center text-lg-start mt-3 btn-login-member">
                    <input type="submit" id="remember-me" name="remember_me"
                        class="btn-lg btn btn-sm bg-danger btn-block w-100" value="Đăng Nhập">
                </div>
                <div class="text-center mt-3 btn-login-member btn btn-primary w-100 text-center">
                    {{-- <a href="{{ route('redirect') }}" class="d-block"><svg style=" width:20px;height:20px;" role="img"
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
                        </svg></a> --}}
                </div>
                <div class="no-account-text text-center">
                    <div>
                        Chưa có tài khoản? <a href="{{ route('user.signup') }}">Đăng ký</a>
                    </div>

                                <a class="txt2" href="{{route('user.signup')}}">
                                    Đăng kí ngay
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    </body>
</html>