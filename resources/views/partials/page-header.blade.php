<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset("assets/images/backgrounds/page-header-bg.jpg") }})">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route("welcome") }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">{{ $header_1 ?? "" }}</li>
            </ul>
            <h2>{{ $header_2 ??"" }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->