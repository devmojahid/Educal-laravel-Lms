@extends('frontend.layouts.master')
@section('title', 'Dashboard Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Dashboard'])
    <section class="error__area pt-200 pb-200">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    @include('frontend.student.dashboard-menu')
                </div>
                <div class="col-xl-8">
                    <div class="tp-dashboard-body My Profile ">
                        <h3 class="dashboard-title mb-20">{{ __('frontend.enrolled_course') }}</h3>
                        <div class="tp-dashboard-nav mb-30">
                            <ul>
                                <li><a class="@if (url()->current() == route('dashboard.enrolled.course')) is-active @endif"
                                        href="{{ route('dashboard.enrolled.course') }}">{{ __('frontend.enrolled_course') }}</a>
                                </li>
                                <li><a class="@if (url()->current() == route('dashboard.active.course')) is-active @endif"
                                        href="{{ route('dashboard.active.course') }}">{{ __('frontend.active_course') }}</a>
                                </li>
                                <li><a class="@if (url()->current() == route('dashboard.complete.course')) is-active @endif"
                                        href="{{ route('dashboard.complete.course') }}">{{ __('frontend.completed_course') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            @forelse ($enroledsCoursesItems as $item)
                                <div class="col-lg-6">
                                    <div class="course__item course__item-3 white-bg mb-30 fix">
                                        <div class="course__thumb w-img p-relative fix">
                                            <a href="{{ route('dashboard.learning', $item->item->slug) }}">
                                                <img src="{{ asset($item->item->image) }}" alt="{{ $item->item->title }}">
                                            </a>
                                        </div>
                                        <div class="course__content">
                                            <h3 class="course__title"><a
                                                    href="{{ route('dashboard.learning', $item->item->slug) }}">{{ $item->item->title }}</a>
                                            </h3>
                                            <div class="tp-enrool-course">
                                                <div class="tp-complete-lession">
                                                    <span>{{ sanitizeInput(Str::words(strip_tags($item->item->description ?? ''), 20)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course__more d-flex justify-content-between align-items-center">
                                            <div class="course__btn">
                                                <a href="{{ route('dashboard.learning', $item->item->slug) }}"
                                                    class="link-btn">
                                                    Start Learning
                                                    <i class="far fa-arrow-right"></i>
                                                    <i class="far fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-danger">
                                        {{ __('frontend.no_course_found') }}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
