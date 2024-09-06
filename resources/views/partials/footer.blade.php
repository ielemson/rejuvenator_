
<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url({{ asset("assets/images/backgrounds/site-footer-bg.jpg") }});">
    </div>
    <div class="site-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__about-logo">
                            <a href="index.html"><img src="{{asset("images/settings/$setting->website_favicon")}}" alt=""></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">
                                Our vision is to become a global force in the formation and empowerment of young people, 
                            enabling them to realize their full potential and become excellent citizens and leaders in their 
                            societies.</p>
                        </div>
                        {{-- <div class="footer-widget__btn">
                            <a href="donate-now.html"> <span class="fa fa-heart"></span>Donate now</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__links clearfix">
                        <h3 class="footer-widget__title">Links</h3>
                        <ul class="footer-widget__links-list list-unstyled clearfix">
                            <li><a href="{{ route("about") }}">About us</a></li>
                            <li><a href="{{ route("contact") }}">Contact</a></li>
                            <li><a href="{{ route("welcome") }}">Latest News</a></li>
                            {{-- <li><a href="event-details.html">Recent Events</a></li> --}}
                            {{-- <li><a href="donation.html">Donations</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__non-profit clearfix">
                        <h3 class="footer-widget__title">Non profit</h3>
                        <ul class="footer-widget__non-profit-list list-unstyled clearfix">
                            <li><a href="#">Donate Now</a></li>
                            <li><a href="#">Join Our Team</a></li>
                            <li><a href="#">Our Partners</a></li>
                            {{-- <li><a href="#">Give them Education</a></li> --}}
                            {{-- <li><a href="#">Start a Fundraising</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <h3 class="footer-widget__title">Contact</h3>
                        <p class="footer-widget__contact-text">
                            {{ $setting->address }}
                        </p>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <p><a href="#">{{ $setting->email }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="text">
                                    <p><a href="#">{{ $setting->phone }}</a></p>
                                </div>
                            </li>
                        </ul>
                        <div class="site-footer__social">
                            <a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $setting->facebook }}"><i class="fab fa-facebook"></i></a>
                            {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                            <a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© All Copyright  <script>
                            document.write(new Date().getFullYear())
                        </script> by <a href="#">rejuvenator.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>