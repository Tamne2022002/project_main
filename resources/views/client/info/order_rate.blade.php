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
                    <div class="form-group">
                        <!--sao-->
                        <div class="stars">
                            @switch($rate[0]->star_num)
                                @case(1)
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                @break
                                @case(2)
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                @break
                                @case(3)
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                @break
                                @case(4)
                                    <i class="fa-regular fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                @break
                                @case(5)
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                    <i class="fas fa-star stars_static"></i>
                                @break
                                @default
                                    
                            @endswitch
                        </div>
                        <!--end sao-->
                        <!--danh gia kh-->                        
                        <div class="stars">
                            {{$rate[0]->content}}
                        </div>
                        <!--end danh gia kh--> 
                        <!--thoi gian tao-->                         
                        <div class="stars">
                            {{$rate[0]->created_at}}
                        </div>
                        <!--end thoi gian tao-->
                        <!--phan hoi admin-->                         
                        @if ($rate[0]->reply != null)
                        <div class="stars">
                            {{$rate[0]->reply}}
                        </div>
                        @endif
                        <!--end phan hoi admin-->
                        <!--san pham trong hoa don-->                         
                        @foreach ($cthdb as $item)
                            <a href="{{ route('product.detail', ['id' => $item->product_id]) }}">
                                <div class="horizontal-bar">
                                    <div class="image-container">
                                        <img src="{{$item->product_photo_path}}" alt="Image description">
                                    </div>
                                    <div class="image-name">
                                        {{$item->name}}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <!--end san pham trong hoa don-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    document.getElementById('reviewForm').addEventListener('submit', function(event) {
        // Kiểm tra nếu không có sao nào được chọn
        const stars = document.querySelectorAll('input[name="star"]');
        let starChecked = false;
        for (const star of stars) {
            if (star.checked) {
                starChecked = true;
                break;
            }
        }

        // Kiểm tra nếu textarea trống
        const review = document.getElementById('review').value.trim();

        // Hiển thị lỗi nếu không có sao nào được chọn
        if (!starChecked) {
            document.getElementById('starError').textContent = 'Vui lòng chọn ít nhất một ngôi sao.';
            event.preventDefault(); // Ngăn chặn gửi biểu mẫu
        } else {
            document.getElementById('starError').textContent = '';
        }

        // Hiển thị lỗi nếu textarea trống
        if (!review) {
            document.getElementById('reviewError').textContent = 'Vui lòng nhập nội dung đánh giá.';
            event.preventDefault(); // Ngăn chặn gửi biểu mẫu
        } else {
            document.getElementById('reviewError').textContent = '';
        }
    });
</script>
@endsection

