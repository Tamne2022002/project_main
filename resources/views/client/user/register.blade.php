<!DOCTYPE html>
<html lang="en">
    <head>
        @include('client.partials.head')
        @include('client.partials.css')
        @section('title')
            <title>Đăng ký</title>
        @endsection
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" action="{{route('user.postregister')}}" method="POST">
                        @csrf
                        <span class="login100-form-title p-b-26">
                            Đăng kí tài khoản
                        </span>
                        <span class="login100-form-title p-b-48">
                            <i class="zmdi zmdi-font"></i>
                        </span>
                        <div class="signup-user-name d-flex">
                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" name="firstname">
                                <span class="focus-input100" data-placeholder="Họ"></span>
                            </div>

                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" name="lastname">
                                <span class="focus-input100" data-placeholder="Tên"></span>
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="address">
                            <span class="focus-input100" data-placeholder="Địa chỉ"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "">
                            <input class="input100" type="number" name="phone">
                            <span class="focus-input100" data-placeholder="Số điện thoại"></span>
                        </div>
                        
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
                                <button class="login100-form-btn">
                                    Đăng kí
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="return">
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