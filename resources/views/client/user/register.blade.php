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
                <div class="title-main">
                    <span>
                        ĐĂNG KÝ
                    </span>
                </div>
                <div class="content-main account-user">
                    <form class="login100-form validate-form" action="{{ route('user.postregister') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="text" name="name" id="name"
                                    class="form-control text-sm input100" value="{{ old('name') }}"
                                    placeholder="Nhập tên" autocomplete="off" />
                            </div>
                        </div>
                        @error('name')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="text" name="phone" id="phone"
                                    class="form-control text-sm input100" value="{{ old('phone') }}"
                                    placeholder="Nhập SĐT" autocomplete="off" />
                            </div>
                        </div>
                        @error('phone')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="text" name="address" class="form-control text-sm input100"
                                    value="{{ old('address') }}" placeholder="Nhập địa chỉ" autocomplete="off" />
                            </div>
                        </div>
                        @error('address')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="email" name="email" class="form-control text-sm input100"
                                    value="{{ old('email') }}" placeholder="Nhập email" autocomplete="off" />
                            </div>
                            <label class="emailMember-error error" for="emailMember" style=""></label>
                        </div>

                        @error('email')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="password" name="password" id="password"
                                    class="form-control text-sm input100" value="{{ old('password') }}"
                                    placeholder="Nhập mật khẩu" autocomplete="off" />
                            </div>
                        </div>
                        @error('password')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}</div>
                        @enderror

                        <div class="d-flex">
                            <div class="wrap-input100">
                                <input type="password" name="confirm-password" id="confirm-password"
                                    class="form-control text-sm input100" value="{{ old('confirm-password') }}"
                                    placeholder="Xác nhận mật khẩu" autocomplete="off" />
                            </div>
                        </div>
                        @error('confirm-password')
                            <div style="color: #dd0505;
                                font-size: 1em;font-weight: bold;">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="text-center text-lg-start mt-3 btn-login-member">
                                <input type="submit" class="btn-lg btn btn-sm bg-danger btn-block w-100 " value="Đăng ký">
                            </div> --}}
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">Đăng ký</button>
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
                            font-size: 1.2em;font-weight: bold;">
                        {{ $message }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
</body>

</html>
