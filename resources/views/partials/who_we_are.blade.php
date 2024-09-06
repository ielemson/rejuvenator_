<section class="feature-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__left">
                    <div class="about-two__img-box  wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-two__img">
                            <img src="{{ asset("images/settings/$setting->who_we_are_img")}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">The Rejuvenator Initiatives Int'l</span>
                        <h2 class="section-title__title">Our Objective Point</h2>
                    </div>
                    {!! $setting->who_we_are !!}
                    <a href="{{ route('about') }}" class="thm-btn about-two__btn mt-5">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>