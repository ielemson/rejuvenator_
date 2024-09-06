<section class="main-slider-two clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 15000
        }}'>
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <div class="image-layer-two"
                    style="background-image: url({{ asset('storage/images/' . $slider->image_path) }})"></div>
                <!-- /.image-layer -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-two__content">
                                <p class="main-slider-two__sub-title">{{ $slider->title_1 }}</p>
                                <h2 class="main-slider-two__title">{{ $slider->title_2 }}</h2>
                                <div class="main-slider-two__btn-box">
                                    <a href="{{ url('aboutus') }}" class="thm-btn main-slider-two__btn"> Discover more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider-two__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-left-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section>