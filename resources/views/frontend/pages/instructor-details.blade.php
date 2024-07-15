@extends('frontend.layouts.master')
@section('title', 'Instructor Details Page')
@section('content')
    {{-- Breadcrumb  --}}
    @include('frontend.layouts.breadcrumb', [
        'title' => 'Instructor Details',
        'subtitle' => 'Instructor Details',
    ])
    <section class="teacher__area pt-100 pb-110">
        <div class="page__title-shape">
            <img class="page-title-shape-5 d-none d-sm-block"
                src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-1.png" alt="">
            <img class="page-title-shape-6" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-6.png"
                alt="">
            <img class="page-title-shape-3" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-3.png"
                alt="">
            <img class="page-title-shape-7" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-4.png"
                alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="teacher__details-thumb p-relative w-img pr-30">
                        <img src="{{ asset($instructor->image) }}" alt="">
                        <div class="teacher__details-shape">
                            <img class="teacher-details-shape-1"
                                src="{{ asset('frontend') }}/assets/img/teacher/details/shape/shape-1.png" alt="">
                            <img class="teacher-details-shape-2"
                                src="{{ asset('frontend') }}/assets/img/teacher/details/shape/shape-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="teacher__wrapper">
                        <div class="teacher__top d-md-flex align-items-end justify-content-between">
                            <div class="teacher__info">
                                <h4>{{ $instructor->fullname }}</h4>
                                <span>{{ $instructor->designation }}</span>
                            </div>
                            <div class="teacher__rating">
                               
                            </div>
                            <div class="teacher__social-2">
                                <h4>Follow Us:</h4>
                                <ul>
                                    <li>
                                        <a href="{{ $instructor->facebook }}">
                                            <i class="social_facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $instructor->twitter }}">
                                            <i class="social_twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $instructor->vimeo }}">
                                            <i class="social_vimeo"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $instructor->linkedin }}">
                                            <i class="social_linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="teacher__follow mb-5">
                                <a href="{{ $instructor->facebook }}" class="teacher__follow-btn">follow <i
                                        class="icon_plus"></i> </a>
                            </div>
                        </div>
                        <div class="teacher__bio">
                            <h3>{{ __('frontend.short_bio') }}</h3>
                            <p>{{ sanitizeInput($instructor->bio) }}</p>
                        </div>
                        <div class="teacher__courses pt-55">
                            <div class="section__title-wrapper mb-30">
                                <h2 class="section__title">{{ __('frontend.teacher') }} <span
                                        class="yellow-bg yellow-bg-big"> {{ __('frontend.courses') }}<img
                                            src="{{ asset('frontend') }}/assets/img/shape/yellow-bg.png"
                                            alt="shape"></span></h2>
                            </div>
                            <div class="teacher__course-wrapper">
                                <div class="row">
                                    @forelse ($instructor->courses->where('status', 'approved') as $key=>$course)
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                            <div class="course__item white-bg mb-30 fix">
                                                <div class="course__thumb w-img p-relative fix">
                                                    <a href="{{ route('course.details', $course->slug) }}">
                                                        <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                                                    </a>
                                                    @isset($course->category)
                                                        <div class="course__tag">
                                                            <a href="javascript:void(0)">{{ $course->category->title }}</a>
                                                        </div>
                                                    @endisset

                                                </div>
                                                <div class="course__content">
                                                    <div
                                                        class="course__meta d-flex align-items-center justify-content-between">
                                                        <div class="course__lesson">
                                                            <span><i
                                                                    class="far fa-book-alt"></i>{{ $course->lessonsCount() }}
                                                                Lesson</span>
                                                        </div>
                                                        <div class="course__rating">
                                                            <span><i class="icon_star"></i>{{ $course->reviewsAvg() }}
                                                                ({{ $course->reviewsCount() }})
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <h3 class="course__title"><a
                                                            href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                                    </h3>
                                                    <div class="course__teacher d-flex align-items-center">
                                                        <div class="course__teacher-thumb mr-15">
                                                            @isset($course->user->image)
                                                                <img src="{{ asset($course->user->image) }}"
                                                                    alt="{{ $course->user->full_name }}">
                                                            @endisset
                                                        </div>
                                                        @isset($course->user->id)
                                                        <h6>
                                                            <a
                                                                href="{{ route('instructor.details', $course->user->id) }}">{{ $course->user->full_name }}</a>
                                                        </h6>
                                                        @endisset
                                                    </div>
                                                </div>
                                                <div class="course__more d-flex justify-content-between align-items-center">
                                                    <div class="course__status">
                                                        <span>{{ getCoursePrice($course) }}</span>
                                                    </div>
                                                    <div class="course__btn">
                                                        <a href="{{ route('course.details', $course->slug) }}"
                                                            class="link-btn">
                                                            {{ __('frontend.know_details') }}
                                                            <i class="far fa-arrow-right"></i>
                                                            <i class="far fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
