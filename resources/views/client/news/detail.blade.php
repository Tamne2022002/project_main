@extends('client.layouts.index')  
@section('title')
    <title> {{$pageName }}</title>
@endsection
@section('content')
    <div class="wrap-content">
        <div class="flex-news-internal row">
            <div class="news-internal-left col-lg-9">
                <div class="title-main">
                    <span>
                        {{ $newsDetail->name }}
                    </span>
                </div>
                <div class="content-main">
                    <div class="time-main">
                        <span class="mr-2"><i class="fa-regular fa-calendar-check"></i> {!! $newsDetail->created_at !!}</span>
                    </div>
                    <div class="content-main-text">
                        {!! $newsDetail->content !!}
                    </div>
                </div>
            </div>
            <div class="news-internal-right col-lg-3">
                <div class="other-news-internal">
                    <div class="other-news-internal-title text-center mb-3 fs-5">
                        <strong>Bài viết khác</strong>
                    </div>
                    <div class="slick-other-news-internal">
                        @foreach ($newsInternal as $v)
                            <div class="other-news-box-in">
                                <a href="{{ route('news.detail', ['id' => $v->id]) }}">
                                    <div class="flex-other-news-box-in">
                                        <div class="other-news-box-in-img scale-img hover_light">
                                            <img src="{{ $v->photo_path }}" alt="{{ $v->name }}" class="w-100">
                                        </div>
                                        <div class="other-news-box-in-info">
                                            <div class="other-news-box-in-name text-split-2"> {{ $v->name }}</div>
                                            <div class="other-news-box-in-desc text-split-2">{!! $v->description !!}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
