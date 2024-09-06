<section class="error-page">
    <div class="error-page-shape" style="background-image: url({{ asset("assets/images/shapes/error-page-shape.png") }});">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mt-5">
                <div class="error-page__inner">
                   
                    <h3 class="error-page__tagline">
                    {{ $header ?? "" }}
                    </h3>
                   
                    <a href="{{ route("welcome") }}" class="thm-btn error-page__btn mt-5">back to home</a>
                </div>
            </div>
        </div>
    </div>
</section>
          