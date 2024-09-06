@extends('layouts.app')

@section('content')
@section('title', 'Home')
@include('partials.header')

<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<!--Main Slider Start-->
@include('partials.slider')
<!--Main Slider End-->

<!--Who We are Two Start-->
@include("partials.who_we_are")
<!--Who We are Two Star Two End-->

<!--Project One Start-->
{{-- @include("partials.projects") --}}
<!--Project One End-->
<!--Feature Two Start-->
@include('partials.partners')
<!--Brand One End-->

@endsection
