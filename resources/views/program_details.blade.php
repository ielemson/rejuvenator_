@extends("layouts.app")

@section("content")
@section("title","Our Programs")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"Programs","header_2"=>"Our Programs"])

 
        <!--News details Start-->
        <section class="news-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 mx-auto">
                        <div class="news-details__center">
                            <div class="news-details__img">
                                <img src="{{ asset('storage/'.$program->image) }}" alt="">
                                <div class="news-details__date">
                                    <p>{{ \Carbon\Carbon::parse($program->created_at)->format('F j, Y') }}</p>
                                </div>
                            </div>
                            <div class="news-details__content">
                                <ul class="list-unstyled news-details__meta">
                                    <li><a href="#"><i class="far fa-user-circle"></i> Admin</a>
                                    </li>
                                    <li><a href="#"><i class="fas fa-comments"></i> 0
                                            Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-details__title">{{ $program->title }}?</h3>
                                <p class="news-details__text-1" style="text-align: justify">
                                {!! $program->description !!}
                                </p>
                            </div>
                           
                            <div class="row mt-5">
                                <div class="col-xl-12">
                                    
                                    <div class="comment-form__btn-box">
                                        <a href="{{ route("our.programs") }}" class="thm-btn comment-form__btn">Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!--News details End-->
@endsection