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
                                <input class="input100" type="text" name="firstname" placeholder="Họ">
                                
                            </div>

                            <div class="wrap-input100 validate-input" >
                                <input class="input100" type="text" name="lastname" placeholder="Tên">
                                
                            </div>
                        </div>

                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="address" placeholder="Địa chỉ">
                           
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="number" name="phone" placeholder="Số điện thoại">
                           
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                            <input class="input100" type="email" name="email" placeholder="Email">
                           
                        </div>
                        @error('email')
                            <div style="color: #dd0505;
                            font-size: 1em;font-weight: bold;">{{ $message }}</div>
                        @enderror
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password" placeholder="Password">
                            
                        </div>
                        @error('password')
                            <div style="color: #dd0505;
                            font-size: 1em;font-weight: bold;">{{ $message }}</div>
                        @enderror
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">
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