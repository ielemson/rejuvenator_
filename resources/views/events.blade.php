@extends("layouts.app")

@section("content")
@section("title","Our Events")
@include("partials.page-nav")
@include("partials.page-header",["header_1"=>"Events","header_2"=>"Our Events"])


  @if (count($events) > 0)
   <!--Events Page Start-->
   <section class="events-page">
    <div class="container">
        <div class="row">
          
            @foreach ($events  as $event)
                 <div class="col-xl-6 col-lg-6 col-md-6">
                <!--Events One Single Start-->
                <div class="events-one__single">
                    <div class="events-one__img">
                        <img src="{{ asset($event->image) }}" alt="">
                        <div class="events-one__date">
                            <p>{{ \Carbon\Carbon::parse($event->created_at)->format('F j, Y') }}</p>
                        </div>
                        <div class="events-one__content">
                            <ul class="list-unstyled events-one__meta">
                                <li><i class="fas fa-clock"></i>{{ \Carbon\Carbon::parse($event->time)->format('F j, Y') }} - {{ \Carbon\Carbon::parse($event->time)->format('h:s') }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $event->location }}</li>
                            </ul>
                            <h3 class="events-one__title"><a href="{{ route("oureventsdetails",$event->slug) }}">{{ $event->title }}</a></h3>
                        </div>
                    </div>
                </div>
                <!--Events One Single End-->
            </div>
            @endforeach
            {{ $events->links() }}
        </div>
    </div>
</section>
<!--Events Page End-->
  @else
 @include("partials.notdound",["header"=>"No Event Found."])
 @endif
          
@endsection