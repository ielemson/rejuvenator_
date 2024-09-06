@extends("layouts.app")

@section("content")
@section("title","About Us")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"About","header_2"=>"About Us"])

       <!--About Four Start-->
       <section class="about-four mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-four__left">
                        <div class="about-four__img-box">
                            <div class="about-four__img">
                                <img src="{{ asset("images/settings/$setting->about_img")}}" alt="">
                            </div>
                            {{-- <div class="about-four__img-two">
                                <img src="{{ asset("assets/images/resources/about-two-img-1.jpg") }}" alt="">
                            </div> --}}
                            <div class="about-four__border"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-four__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">About Us</span>
                            <h2 class="section-title__title">Get to know us</h2>
                        </div>
                       {!! $setting->about !!}
                      
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!--Vision And Mission One Start-->
    @include('partials.vision-and-mission')
<!--Vision And Mission One End-->
    <!--About Four End-->
    @if (count($profiles)>0)
           <!--Team One Start-->
      <section class="team-one">
        <div class="container">
            <div class="row">
              @foreach ($profiles as $profile)
                    <!--Team One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{ Storage::url($profile->image) }}" alt="">
                            <div class="team-one__social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-one__content">
                            <h3 class="team-one__name"><a href="#">{{ $profile->name }}</a></h3>
                            <p class="team-one__sub-title">{{ $profile->position }}</p>
                        </div>
                    </div>
                </div>
                <!--Team One Single End-->
              @endforeach
           
            </div>
        </div>
    </section>
    <!--Team One End-->
    @endif
   
     
@endsection