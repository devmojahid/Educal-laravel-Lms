@extends("frontend.layouts.master")
@section("title","About Page")
@section("content")
    @include("frontend.layouts.breadcrumb",["title"=>"About"])
    {{-- About  --}}
    @include("frontend.template-parts.about")
    {{-- Brand  --}}
    @include("frontend.template-parts.brand")
    {{-- Testimonial  --}}
    @include("frontend.template-parts.testimonial")
    {{-- Why Area  --}}
    @include("frontend.template-parts.why-area")
    {{-- Counter  --}}
    @include("frontend.template-parts.counter")
    {{-- banner  --}}
    @include("frontend.template-parts.banner")
@endsection