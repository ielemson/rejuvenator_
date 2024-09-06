
<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="{{ url("/") }}"><img src="{{asset("assets/images/rejuvenator-logo.png")}}" alt="logo" style="width:45vh"></a>
                    </div>
                    {{-- <div class="main-menu__shape-1 float-bob-x">
                        <img src="assets/images/shapes/main-menu-shape-1.png" alt="">
                    </div> --}}
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__right-top">
                        
                        <div class="main-menu__right-top-right">
                            <div class="main-menu__right-top-address">
                                <ul class="list-unstyled main-menu-two__right-top-address-list">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="content">
                                            <p>Helpline</p>
                                            <h5><a href="tel:{{$setting->phone}}">{{$setting->phone}}, {{$setting->hotline}}</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-message"></span>
                                        </div>
                                        <div class="content">
                                            <p>Send email</p>
                                            <h5><a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                                            </h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-location"></span>
                                        </div>
                                        <div class="content">
                                            <p>{{$setting->address}}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-menu__right-top-social">
                                <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a>
                                {{-- <a href=""><i class="fab fa-pinterest-p"></i></a> --}}
                                <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu__right-bottom">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="active">
                                    <a href="{{ url("/") }}">Home</a>
                                   
                                </li>
                                <li class="">
                                    <a href="{{ route("about") }}">About</a>
                                   
                                </li>
                                <li class="">
                                    <a href="{{ route("our.programs") }}">Programs</a>
                                   
                                </li>
                              
                                <li class="">
                                    <a href="{{ route("ourevents") }}">Events</a>
                                    
                                </li>
                               
                                <li>
                                    <a href="{{ route("contact") }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__main-menu-content-box">
                            <div class="main-menu__search-cat-btn-box">
                                {{-- <div class="main-menu__search-box">
                                    <a href="#"
                                        class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                </div>
                                <div class="main-menu__cat-box">
                                    <a href="cart.html" class="main-menu__cart icon-shopping-cart"></a>
                                </div> --}}
                                <div class="main-menu__btn-box">
                                    <a href="{{route("donate")}}" class="main-menu__btn"> <span
                                            class="fa fa-heart"></span> Donate
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>