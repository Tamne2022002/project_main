<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php
    $cssFiles = glob(public_path('adminlte/dist/css/*.css'));
    foreach ($cssFiles as $file) {
        $file = str_replace(public_path(), '', $file);
        echo '<link rel="stylesheet"  href="' . $file . '"></link>';
    }
    ?> 
    <link rel="stylesheet" href="{{ asset('/admins/css/style.css') }}"> 
    <script src="{{ asset('/admins/js/app.js') }}"></script> 
</head>

<body class="sidebar-mini text-sm login-page">
    <div class="login-view-website text-sm"><a href="http://127.0.0.1:8000/" target="_blank" title="Xem website"><i
                class="fas fa-reply mr-2"></i>Xem website</a></div>
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập hệ thống</p>
                <form id="login-form" class="form" action="{{ route('admin.login.submit') }}" method="post">
                    {{ csrf_field() }}
                    <div>
                        <div class="input-group">
                            <div class="input-group-append login-input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <input type="email" pattern="[^ @]*@[^ @]*" name="email" id="username"
                                value="{{ old('email') }}" class="form-control text-sm text-lowercase"
                                placeholder="Nhập email" required autocomplete="off" />

                        </div>
                        <label class="emailMember-error error" for="emailMember" style=""></label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="password" id="password" class="form-control text-sm"
                            placeholder="Nhập mật khẩu" required />
                        <div class="input-group-append">
                            <div class="input-group-text show-password">
                                <span class="fas fa-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-lg-start mt-3">
                        <input type="submit" id="remember-me" name="remember_me"
                            class="btn-lg btn btn-sm bg-gradient-danger btn-block btn-login" value="Đăng Nhập">
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }} </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="login-copyright text-sm">Powered by TL Bookstore</div>

</body>
<script></script>

</html>
