<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', '') :: {{$setting->website_title}} </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$setting->meta_description}}">
    <meta name="keywords" content="{{$setting->meta_tag}}">
    <link rel="canonical" href="{{url('/')}}">
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("images/settings/$setting->website_favicon") }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("images/settings/$setting->website_favicon") }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/settings/$setting->website_favicon") }}" />
    {{-- <link rel="manifest" href="assets/images/favicons/site.webmanifest" /> --}}

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/vendors/bootstrap/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/animate/animate.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/animate/custom-animate.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/fontawesome/css/all.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/jarallax/jarallax.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/nouislider/nouislider.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/nouislider/nouislider.pips.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/odometer/odometer.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/swiper/swiper.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/oxpins-icons/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/tiny-slider/tiny-slider.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/reey-font/stylesheet.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl-carousel/owl.carousel.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/owl-carousel/owl.theme.default.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/bxslider/jquery.bxslider.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/bootstrap-select/css/bootstrap-select.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/vegas/vegas.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/jquery-ui/jquery-ui.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/vendors/timepicker/timePicker.css") }}" />
    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset("assets/css/oxpins.css") }}" />
    @stack("customStyles")
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
      @yield("content")
      @include("partials.footer")
        <!--Site Footer End-->
    </div><!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{asset("images/settings/$setting->website_logo_dark")}}" width="143"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#">{{ $setting->email }}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="#">{{ $setting->phone }}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="{{ $setting->twitter }}" class="fab fa-twitter"></a>
                    <a href="{{ $setting->facebook }}" class="fab fa-facebook-square"></a>
                    {{-- <a href="#" class="fab fa-pinterest-p"></a> --}}
                    <a href="{{ $setting->instagram }}" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>
    <script src="{{ asset("assets/vendors/jquery/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jarallax/jarallax.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-appear/jquery.appear.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-validate/jquery.validate.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/nouislider/nouislider.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/odometer/odometer.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/swiper/swiper.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/tiny-slider/tiny-slider.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/wnumb/wNumb.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/wow/wow.js") }}"></script>
    <script src="{{ asset("assets/vendors/isotope/isotope.js") }}"></script>
    <script src="{{ asset("assets/vendors/countdown/countdown.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/owl-carousel/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/bxslider/jquery.bxslider.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/vegas/vegas.min.js") }}"></script>
    <script src="{{ asset("assets/vendors/jquery-ui/jquery-ui.js") }}"></script>
    <script src="{{ asset("assets/vendors/timepicker/timePicker.js") }}"></script>
    <script src="{{ asset("assets/vendors/circleType/jquery.circleType.js") }}"></script>
    <script src="{{ asset("assets/vendors/circleType/jquery.lettering.min.js") }}"></script>
    <!-- template js -->
    <script src="{{ asset("assets/js/oxpins.js") }}"></script>
    @stack("customScripts")
</body>

</html>