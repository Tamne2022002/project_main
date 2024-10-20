<?php
use App\Http\Controllers\Clients\IndexController;
?>
@if (isset($sliders))
    <div class="slideshow">
        <div class="slick-slideshow">
            @foreach ($sliders as $v)
                <div class="slideshow-item" owl-item-animation>
                    <a href="{{ $v->description }}" class="slideshow-image" target="_blank" title="{{ $v->name }}">
                        <img class="w-100 slider-style" width="1366" height="550" src="{{ $v->photo_path }}"
                            alt="{{ $v->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
