@extends("layouts.app")

@section("content")
@section("title","Our Events")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"Events","header_2"=>"Our Events"])

   <!--Event Details Start-->
   <section class="event-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="event-details__left">
                    <div class="event-details__top">
                        <div class="event-details__date">
                            <p>{{ \Carbon\Carbon::parse($event->created_at)->format('F j, Y') }}</p>
                        </div>
                        <h3 class="event-details__title" style="color: #283734;">
                            {{ $event->title}}
                        </h3>
                       
                    </div>
                    <div class="event-details__img-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="event-details__img-single">
                                    <img src="{{ asset($event->image) }}" alt="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="event-details__bottom">
                        <p class="event-details__text-4" style="text-align:justify">
                         {!! $event->description !!}
                        </p>

                        <div class="event-details__btn-box">
                            <a href="{{ route("ourevents") }}" class="thm-btn event-details__btn">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="event-details__right">
                    <div class="event-details__info">
                        <ul class="list-unstyled event-details__info-list">
                            <li>
                                <span>Time:</span>
                                <p>{{ \Carbon\Carbon::parse($event->time)->format('h:s') }}</p>
                            </li>
                            <li>
                                <span>Date:</span>
                                <p>{{ \Carbon\Carbon::parse($event->time)->format('F j, Y') }}</p>
                            {{-- </li>
                            <li>
                                <span>Category:</span>
                                <p>Health, Medical</p>
                            </li> --}}
                            <li>
                                <span>Location:</span>
                                <p>{{ $event->location }}</p>
                            </li>
                        </ul>
                        <div class="event-details__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!--Event Details End-->

@endsection