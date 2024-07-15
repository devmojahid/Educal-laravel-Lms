@extends('frontend.layouts.master')
@section('title', 'Blog Page')
@section('content')
    {{-- Breadcrumb  --}}
    @include('frontend.layouts.breadcrumb', ['title' => 'Blog'])
    {{-- Start Blog Area --}}
    <section class="blog__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @if (isset($search))
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="search__title text-center mb-55">
                                        <h3>{{ __('frontend.search_result_for') }} {{ $search }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($blogs->count() >= 0)
                        <div class="row">
                            @forelse ($blogs as $blog)
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="blog__wrapper">
                                        <div class="blog__item white-bg mb-30 transition-3 fix">
                                            <div class="blog__thumb w-img fix">
                                                <a href="{{ route('blog.details', $blog->slug) }}">
                                                    <img src="{{ asset($blog->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="blog__content">
                                                @isset($blog->category)
                                                    <div class="blog__tag">
                                                        <a
                                                            href=" {{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->title }}</a>
                                                    </div>
                                                @endisset
                                                <h3 class="blog__title">
                                                    <a
                                                        href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                                </h3>

                                                <div class="blog__meta d-flex align-items-center justify-content-between">
                                                    <div class="blog__author d-flex align-items-center">
                                                        <div class="blog__author-thumb mr-10">
                                                            <img src="{{ asset($blog->user->image) }}" alt="">
                                                        </div>
                                                        <div class="blog__author-info">
                                                            <h5>{{ $blog->user->first_name . ' ' . $blog->user->last_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="blog__date d-flex align-items-center">
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
                            @empty
                                <div class="alert alert-warning" role="alert">
                                    <strong>{{ __('frontend.sorry') }}</strong> {{ __('frontend.no_blog_found') }}
                                </div>
                            @endforelse
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ __('frontend.sorry') }}</strong> {{ __('frontend.no_blog_found') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="basic-pagination wow fadeInUp mt-30" data-wow-delay=".2s">
                                {{ $blogs->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.template-parts.sidebar', ['sidebar' => $sidebar])
            </div>
        </div>
    </section>
@endsection
