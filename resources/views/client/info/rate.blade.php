@extends('client.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/rate.css')}}">
@endsection

@section('title')
    <title>Thông tin người dùng</title>
@endsection
@section('content')
    <!-- Thông tin user -->
    <div class="wrap-content">
        <div class="title-main">
            <span>
                Đánh giá
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
                <div class="col-md-9">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-2" for="rating"> <b>Bạn có hài lòng về sản phẩm của chúng tôi?</b> </label>
                            <div class="rating">
                                <input class="star star-1 rating" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                                <input class="star star-2 rating" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-3 rating" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-4 rating" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-5 rating" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review"> <b>Hãy đưa nhận xét để chúng tôi cải thiện hệ thống: </b></label>
                            <div class="rating">
                                <textarea id="review" name="review" rows="5" cols="100" placeholder="Nhập nhận xét ở đây"></textarea>
                            </div> 
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
function showErrorNotify(text = "Notify text", title = "Thông báo", status = "error") {
    new Notify({
        status: status, // success, warning, error
        title: title,
        text: text,
        effect: "fade",
        speed: 400,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 10,
        distance: 10,
        type: 3,
        position: "right top",
    });
}

@if(session('notify'))
    showErrorNotify("{{ session('notify.message') }}", "Thông báo", "{{ session('notify.status') }}");
@endif
@endsection
