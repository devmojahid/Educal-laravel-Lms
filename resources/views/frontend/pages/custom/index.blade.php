@extends("frontend.layouts.master")
@section("title",$page->title)
@section("meta_title",$page->meta_title)
@section("meta_description",$page->meta_description)
@section("meta_keywords",$page->meta_keywords)
@section("content")
    @include("frontend.layouts.breadcrumb",["title"=>$page->title])
    <section class="contact__area pt-115 pb-120">
        <div class="container">
            <h2 class="mb-25">{{ $page->title }}</h2>
            {{ sanitizeInput($page->content) }}
        </div>
    </section>
@endsection