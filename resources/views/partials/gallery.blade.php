
     @if (count($galleries) > 0)
        <!--Gallery One Start-->
     <section class="gallery-one">
        <div class="gallery-one__top">
            <h3 class="gallery-one__top-title">Our photo gallery</h3>
        </div>
        <div class="gallery-one__bottom">
            <div class="gallery-one__container">
                <div class="container-fluid text-center my-3">
                  <div class="row">
                    <div class="row mx-auto my-auto justify-content-center">
                      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                         @foreach ($galleries as $gallery)
                         <div class="carousel-item active">
                          <div class="col-md-3">
                            <div class="card mx-1">
                              <div class="card-img card-img-top">
                                <div class="card-img-container">
                                  <img alt="Slide 1" src="{{ asset('storage/' . $gallery->image) }}">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                         @endforeach
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div id="visible" class="d-none d-md-block"></div>
            </div>
        </div>
    </section>
    <!--Gallery One End-->
     @endif
    