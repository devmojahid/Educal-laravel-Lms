@extends('frontend.layouts.master')
@section('title', 'Blog Details Page')
@section('content')
    <section class="page__title-area page__title-height-2 page__title-overlay d-flex align-items-center"
        data-background="{{ asset($blog->image) }}" style="background-repeat: no-repeat;background-size: cover;">
        <div class="page__title-shape">
            <img class="page-title-shape-1" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-1.png"
                alt="">
            <img class="page-title-shape-2" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-2.png"
                alt="">
            <img class="page-title-shape-3" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-3.png"
                alt="">
            <img class="page-title-shape-4" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-4.png"
                alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 col-xl-10 col-lg-10 ">
                    <div class="page__title-wrapper mt-110">
                        @isset($blog->category)
                            <span class="page__title-pre">{{ $blog->category->title }}</span>
                        @endisset
                        <h3 class="page__title-2">{{ $blog->title }}</h3>
                        <div class="blog__meta d-flex align-items-center">
                            <div class="blog__author d-flex align-items-center mr-40">
                                <div class="blog__author-thumb mr-10">
                                    <img src="{{ asset($blog->user->image) }}" alt="">
                                </div>
                                <div class="blog__author-info blog__author-info-2">
                                    <h5>{{ $blog->user->full_name }}</h5>
                                </div>
                            </div>
                            <div class="blog__date blog__date-2 d-flex align-items-center">
                                <i class="fal fa-clock"></i>
                                <span>
                                    {{ monthDayYear($blog->created_at) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog__wrapper">
                        <div class="blog__text mb-40">
                            <p>
                                {{ sanitizeInput($blog->description) }}
                            </p>
                        </div>

                        <div class="blog__line"></div>
                        <div class="blog__meta-3 d-sm-flex justify-content-between align-items-center mb-80">
                            <div class="blog__social d-flex align-items-center">
                                <h4>{{ __('frontend.share') }}</h4>
                                {{ sanitizeInput(social_shear(url()->current(), $blog->title)) }}
                            </div>
                        </div>
                        <div class="blog__author-3 d-sm-flex grey-bg mb-90">
                            <div class="blog__author-thumb-3 mr-20">
                                <img src="{{ asset($blog->user->image) }}" alt="">
                            </div>
                            <div class="blog__author-content">
                                <h4>{{ $blog->user->full_name }}</h4>
                                <span>{{ $blog->user->designation }}</span>
                                <p>{{ $blog->user->bio }}</p>
                            </div>
                        </div>
                        @if (isset($reletedBlogs) && $reletedBlogs->count() > 0)
                            <div class="blog__recent mb-65">
                                <div class="section__title-wrapper mb-40">
                                    <h2 class="section__title">Related <span class="yellow-bg-sm">Post <img
                                                src="{{ asset('frontend') }}/assets/img/shape/yellow-bg-4.png"
                                                alt="">
                                        </span></h2>
                                    <p>You don't have to struggle alone, you've got our assistance and help.</p>
                                </div>
                                <div class="row">
                                    @foreach ($reletedBlogs as $reletedBlog)
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                            <div class="blog__item white-bg mb-30 transition-3 fix">
                                                <div class="blog__thumb w-img fix">
                                                    <a href="{{ route('blog.details', $reletedBlog->slug) }}">
                                                        <img src="{{ asset($reletedBlog->image) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog__content">
                                                    @isset($reletedBlog->category)
                                                        <div class="blog__tag">
                                                            <a
                                                                href="{{ $reletedBlog->category->slug }}">{{ $reletedBlog->category->title }}</a>
                                                        </div>
                                                    @endisset
                                                    <h3 class="blog__title"><a
                                                            href="{{ route('blog.details', $reletedBlog->slug) }}">{{ $reletedBlog->title }}</a>
                                                    </h3>

                                                    <div
                                                        class="blog__meta d-flex align-items-center justify-content-between">
                                                        <div class="blog__author d-flex align-items-center">
                                                            <div class="blog__author-thumb mr-10">
                                                                <img src="{{ asset($reletedBlog->user->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog__author-info">
                                                                <h5>{{ $reletedBlog->user->first_name . ' ' . $reletedBlog->user->last_name }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="blog__date d-flex align-items-center">
                                                            <i class="fal fa-clock"></i>
                                                            <span>
                                                                {{ monthDayYear($reletedBlog->created_at) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @include('frontend.template-parts.comments')
                        @include('frontend.template-parts.comment-form')
                    </div>
                </div>
                @include('frontend.template-parts.sidebar', ['sidebar' => $sidebar])
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $(".comment_form_reply").hide();
                $(".commentParrent").on('click', function(e) {
                    e.preventDefault();
                    $(".comment_form_reply").hide();
                    let id = $(this).data('id');
                    $("#comment_form_reply-" + id).toggle();
                });
                $(".cancel-comment-reply-link-text").on('click', function(e) {
                    e.preventDefault();
                    let id = $(this).data('cencel_id');
                    $("#comment_form_reply-" + id).hide();
                });
            });
        })(jQuery);
    </script>
@endpush
