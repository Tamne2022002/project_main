<?php
use App\Http\Controllers\Client\CHomeController;
?>
@if (isset($sliders))
   <div class="slideshow-has-category">
    <div class="wrap-content d-flex">
        @include('client.partials.categorymenu')
            <div class="slideshow">
                <div class="wrap-content">
                    <div class="slick-slideshow">
                        @foreach ($sliders as $v)
                            <div class="slideshow-item" owl-item-animation>
                                <a href="{{ $v->description }}" class="slideshow-image" target="_blank" title="{{ $v->name }}">
                                    <img class="w-100 slider-style" src= "{{$v->photo_path}}"
                                        alt="{{ $v->desc }}">
                                </a> 
                            </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
   </div>
@endif
