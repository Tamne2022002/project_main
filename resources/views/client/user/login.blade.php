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
                    <form class="login100-form validate-form" action="{{ route('user.postlogin') }}" method="POST">
                        @csrf
                        <span class="login100-form-title p-b-26">
                            Đăng nhập
                        </span>
                        <span class="login100-form-title p-b-48">
                            <i class="zmdi zmdi-font"></i>
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                            <input class="input100" type="email" name="email" value="{{ old('email') }}"  autocomplete="off" placeholder="Email">

                        </div>
                        @error('email')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                        </div>
                        @error('password')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror
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
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">Đăng nhập</button>
                            </div>
                        </div>

                        <div class="no-account-text text-center">
                            <span>
                                Chưa có tài khoản?
                                <a class="txt2" href="{{ route('user.signup') }}"> Đăng kí ngay</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>

</html>
