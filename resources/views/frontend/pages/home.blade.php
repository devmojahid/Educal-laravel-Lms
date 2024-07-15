@extends("frontend.layouts.master")
@section("title","Home Page")
@section("content")

    <!-- hero area start -->
    @include("frontend.home.hero")
    <!-- hero area end -->

    <!-- category area start -->
    @include("frontend.home.category")
    <!-- category area end -->

    <!-- banner area start -->
    @include("frontend.home.banner")
    <!-- banner area end -->

    <!-- course area start -->
    @include("frontend.home.course")
    <!-- course area end -->

    <!-- events area start -->
    @include("frontend.home.event")
    <!-- events area end -->    
    {{-- Counter  --}}
    @include("frontend.home.counter")

@endsection