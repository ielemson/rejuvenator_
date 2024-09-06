@extends("layouts.app")

@section("content")
@section("title","Our Programs")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"Programs","header_2"=>"Our Programs"])

    @if (count($programs) > 0) <!--Events Page Start-->
   <section class="news-page">
    <div class="container">
        <div class="row">
          
                @foreach ($programs as $program)
                   <!--News One Single Start-->
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ asset('storage/'.$program->image) }}" alt="">
                    </div>
                    <div class="news-one__content-box">
                        <div class="news-one__content-inner">
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="{{route("program.detail",$program->id)}}"><i class="far fa-user-circle"></i> Admin</a>
                                    </li>
                                    <li><a href="{{route("program.detail",$program->id)}}"><i class="fas fa-comments"></i> 0
                                            Comments</a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title"><a href="{{route("program.detail",$program->id)}}">{{ $program->title }}</a></h3>
                            </div>
                            <div class="news-one__bottom">
                                <div class="news-one__read-more">
                                    <a href="{{route("program.detail",$program->id)}}"> <span class="icon-right-arrow"></span> Read
                                        More</a>
                                </div>
                                <div class="news-one__share">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="news-one__social-box">
                                <ul class="list-unstyled news-one__social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    {{-- <li><a href="#"><i class="fab fa-dribbble"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="news-one__date">
                            <p>{{ \Carbon\Carbon::parse($program->created_at)->format('F j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->  
                @endforeach
                {{ $programs->links() }}
        </div>
    </div>
</section>

<!--Events Page End-->
@else
@include("partials.notdound",["header"=>"No Program Found."])                
@endif
<!--Gallery Two Start-->
@include('partials.gallery')
<!--Gallery Two End-->
@endsection

@push("customStyles")
    <style>
  
.card {
  overflow: hidden;
  background: rgb(238, 174, 202);
  background: radial-gradient(
    circle,
    rgba(238, 174, 202, 1) 0%,
    rgba(148, 187, 233, 1) 100%
  );
  .card-img {
    height: 20rem;
  }
  .card-img-container img {
    object-fit: cover;
    object-position: center;
    max-height: 100%;
    height: 20rem;
  }
  .card-img-overlay {
    color: #fff;
    font-weight: bold;
    text-shadow: 0 0 3px #ff0000, 0 0 5px #0000ff;
  }
}

/* small and extra-small screens */
@media (max-width: 767px) {
  .carousel-inner .carousel-item > div {
    display: none;
    &:first-child {
      display: block;
    }
    .card-img-container img {
      max-width: 100%;
    }
  }
}

/* medium and up screens */
@media (min-width: 768px) {
  .carousel-inner {
    .carousel-item-end.active,
    .carousel-item-next {
      transform: translateX(25%);
    }
    .carousel-item-start.active,
    .carousel-item-prev {
      transform: translateX(-25%);
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
      display: flex;
    }
    .carousel-item-end,
    .carousel-item-start {
      transform: translateX(0);
    }
  }
  .card-img-container {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    img {
      display: inline-block;
      max-height: 100%;
      margin: 0 -50%;
    }
  }
}
</style>
@endpush


@push("customScripts")
  <script>
        $(document).ready(function () {
  function initCarousel() {
    if ($("#visible").css("display") == "block") {
      $(".carousel .carousel-item").each(function () {
        var i = $(this).next();
        i.length || (i = $(this).siblings(":first")),
          i.children(":first-child").clone().appendTo($(this));

        for (var n = 0; n < 4; n++)
          (i = i.next()).length || (i = $(this).siblings(":first")),
            i.children(":first-child").clone().appendTo($(this));
      });
    }
  }
  $(window).on({
    resize: initCarousel(),
    load: initCarousel()
  });
});
</script>
@endpush