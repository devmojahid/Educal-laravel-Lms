@extends('frontend.layouts.master')
@section('title', 'Course Details Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Course Details'])
    <section class="page__title-area pt-120 pb-90">
        <div class="page__title-shape">
            <img class="page-title-shape-5 d-none d-sm-block"
                src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-1.png" alt="">
            <img class="page-title-shape-6" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-6.png"
                alt="">
            <img class="page-title-shape-7" src="{{ asset('frontend') }}/assets/img/page-title/page-title-shape-4.png"
                alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="course__wrapper">
                        <div class="page__title-content mb-25">
                            @if ($course->category)
                                <span class="page__title-pre">
                                    {{ $course->category->title }}
                                </span>
                            @endif
                            <h5 class="page__title-3">{{ $course->title }}</h5>
                        </div>
                        <div class="course__meta-2 d-sm-flex mb-30">
                            <div class="course__teacher-3 d-flex align-items-center mr-70 mb-30">
                                <div class="course__teacher-thumb-3 mr-15">
                                    @isset($course->user->image)
                                        <img src="{{ asset($course->user->image) }}" alt="">
                                    @endisset
                                </div>
                                <div class="course__teacher-info-3">
                                    <h5>{{ __('frontend.teacher') }}</h5>
                                    @isset($course->user->id)
                                        <p><a
                                                href="{{ route('instructor.details', $course->user->id) }}">{{ $course->user->full_name }}</a>
                                        </p>
                                    @endisset
                                </div>
                            </div>
                            <div class="course__update mr-80 mb-30">
                                <h5>{{ __('frontend.last_updated') }}</h5>
                                <p>
                                    @if ($course->updated_at)
                                        {{ monthDayYear($course->updated_at) }}
                                    @else
                                        {{ monthDayYear($course->created_at) }}
                                    @endif
                                </p>
                            </div>
                            <div class="course__rating-2 mb-30">
                                <h5>{{ __('frontend.reviews') }}</h5>
                                <div class="course__rating-inner d-flex align-items-center">
                                    <ul>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($course->reviewsAvg() >= $i)
                                                <li><a href="javascript:void(0)"> <i class="icon_star"></i> </a></li>
                                            @else
                                                <li><a href="javascript:void(0)"><i class="fal fa-star"></i></a></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <p> {{ $course->reviewsAvg() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="course__img w-img mb-30">
                            <img src="{{ $course->image }}" alt="">
                        </div>
                        <div class="course__tab-2 mb-45">
                            <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true"> <i class="icon_ribbon_alt"></i>
                                        <span> {{ __('frontend.description') }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="curriculum-tab" data-bs-toggle="tab"
                                        data-bs-target="#curriculum" type="button" role="tab"
                                        aria-controls="curriculum" aria-selected="false"> <i class="icon_book_alt"></i>
                                        <span>{{ __('frontend.curriculum') }}</span> </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                        type="button" role="tab" aria-controls="review" aria-selected="false"> <i
                                            class="icon_star_alt"></i> <span>{{ __('frontend.reviews') }}</span> </button>
                                </li>

                            </ul>
                        </div>
                        <div class="course__tab-content mb-95">
                            <div class="tab-content" id="courseTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="course__description">
                                        {{ sanitizeInput($course->description) }}
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                    <div class="course__curriculum">
                                        @foreach ($course->topics as $key => $topic)
                                            <div class="accordion" id="course__accordion-{{ $key }}">
                                                <div class="accordion-item mb-20">
                                                    <h2 class="accordion-header" id="id-{{ $key }}">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#id-{{ $key }}-content"
                                                            aria-expanded="true"
                                                            aria-controls="id-{{ $key }}-content">
                                                            {{ $topic->title }}
                                                        </button>
                                                    </h2>
                                                    <div id="id-{{ $key }}-content"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="id-{{ $key }}"
                                                        data-bs-parent="#course__accordion-{{ $key }}">
                                                        <div class="accordion-body">
                                                            @forelse ($topic->lessons as $lesson)
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between course__curriculum-content">
                                                                    <div
                                                                        class="d-sm-flex justify-content-between align-items-center">
                                                                        <div class="course__curriculum-info">
                                                                            <svg class="document" viewBox="0 0 24 24">
                                                                                <path class="st0"
                                                                                    d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z" />
                                                                                <polyline class="st0"
                                                                                    points="14,2 14,8 20,8 " />
                                                                                <line class="st0" x1="16"
                                                                                    y1="13" x2="8"
                                                                                    y2="13" />
                                                                                <line class="st0" x1="16"
                                                                                    y1="17" x2="8"
                                                                                    y2="17" />
                                                                                <polyline class="st0"
                                                                                    points="10,9 9,9 8,9 " />
                                                                            </svg>
                                                                            <h3> <span>Reading:</span> {{ $lesson->title }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="course__curriculum-btn mr-20">
                                                                        @if ($lesson->visibility == 'lock')
                                                                            <span><i class="far fa-lock"></i></span>
                                                                        @else
                                                                            <span><i class="far fa-unlock"></i></span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div
                                                                    class="course__curriculum-content d-sm-flex justify-content-between align-items-center">
                                                                    <div class="course__curriculum-info">

                                                                        <h3>{{ __('frontend.no_lession_found') }}</h3>
                                                                    </div>
                                                                </div>
                                                            @endforelse


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    @include('frontend.template-parts.review', [
                                        'from_page' => 'course_details',
                                    ])
                                </div>

                                <div class="course__share mt-4">
                                    <h3>{{ __('frontend.shear') }}</h3>
                                    {{ sanitizeInput(social_shear(url()->current(), $course->title)) }}
                                </div>
                            </div>
                        </div>
                        @if (isset($reletedCourses) && $reletedCourses->count() > 0)
                            <div class="course__related">
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="section__title-wrapper mb-40">
                                            <h2 class="section__title">{{ __('frontend.related') }} <span
                                                    class="yellow-bg yellow-bg-big">{{ __('frontend.course') }}<img
                                                        src="{{ asset('frontend') }}/assets/img/shape/yellow-bg.png"
                                                        alt=""></span></h2>
                                            <p>{{ __('frontend.you_do_not_get_strugle_alone') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="course__slider swiper-container pb-60">
                                            <div class="swiper-wrapper">
                                                @foreach ($reletedCourses as $singleCourse)
                                                    <div
                                                        class="course__item course__item-3 swiper-slide white-bg mb-30 fix">
                                                        <div class="course__thumb w-img p-relative fix">
                                                            <a href="{{ route('course.details', $singleCourse->slug) }}">
                                                                <img src="{{ asset($singleCourse->image) }}"
                                                                    alt="{{ $singleCourse->title }}">
                                                            </a>
                                                            @if ($singleCourse->category)
                                                                <div class="course__tag">
                                                                    <a
                                                                        href="{{ route('course.category', $singleCourse->category->slug) }}">{{ $singleCourse->category->title }}</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="course__content">
                                                            <div
                                                                class="course__meta d-flex align-items-center justify-content-between">
                                                                <div class="course__lesson">
                                                                    <span><i
                                                                            class="far fa-book-alt"></i>{{ $singleCourse->lessonsCount() }}
                                                                        Lesson</span>
                                                                </div>
                                                                <div class="course__rating">
                                                                    <span><i
                                                                            class="icon_star"></i>{{ $singleCourse->reviewsAvg() }}
                                                                        ({{ $singleCourse->reviewsCount() }})
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <h3 class="course__title"><a
                                                                    href="{{ route('course.details', $singleCourse->slug) }}">{{ $singleCourse->title }}</a>
                                                            </h3>
                                                            <div class="course__teacher d-flex align-items-center">
                                                                <div class="course__teacher-thumb mr-15">
                                                                    <img src="{{ asset($singleCourse->user->image) }}"
                                                                        alt="{{ $singleCourse->user->full_name }}">
                                                                </div>
                                                                <h6><a
                                                                        href="{{ route('instructor.details', $singleCourse->user->id) }}">{{ $singleCourse->user->full_name }}</a>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="course__more d-flex justify-content-between align-items-center">
                                                            <div class="course__status">
                                                                <span>
                                                                    {{ getCoursePrice($singleCourse) }}
                                                                </span>
                                                            </div>
                                                            <div class="course__btn">
                                                                <a href="{{ route('course.details', $singleCourse->slug) }}"
                                                                    class="link-btn">
                                                                    {{ __('frontend.know_details') }}
                                                                    <i class="far fa-arrow-right"></i>
                                                                    <i class="far fa-arrow-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="course__sidebar pl-70 p-relative">
                        <div class="course__shape">
                            <img class="course-dot" src="{{ asset('frontend') }}/assets/img/course/course-dot.png"
                                alt="course Dot">
                        </div>
                        <div class="course__sidebar-widget-2 white-bg mb-20">
                            <div class="course__video">
                                @if ($course->image != null)
                                    <div class="course__video-thumb w-img mb-25">
                                        <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                                        @if ($course->video != null)
                                            <div class="course__video-play">
                                                <a href="{{ $course->video }}" data-fancybox="" class="play-btn"> <i
                                                        class="fas fa-play"></i> </a>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <div class="course__video-meta mb-25 d-flex align-items-center justify-content-between">
                                    @if (
                                        $course->price == null &&
                                            $course->discount_price == null &&
                                            empty($course->discount_price) &&
                                            empty($course->price))
                                        <h4>{{ __('frontend.free') }}</h4>
                                    @else
                                        <div class="course__video-price">
                                            @if ($course->discount_price != null)
                                                <h5>{{ currency_symbol($course->discount_price) }}</h5>
                                                <h5 class="old-price">{{ currency_symbol($course->price) }}</h5>
                                            @else
                                                <h5>{{ currency_symbol($course->price) }}</h5>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="course__video-content mb-35">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <div class="course__video-icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                xml:space="preserve">
                                                <path class="st0"
                                                    d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z" />
                                                <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 " />
                                            </svg>
                                        </div>
                                        <div class="course__video-info">
                                            <h5><span>{{ __('frontend.instuctor') }}</span>
                                                {{ $course->user->full_name }}</h5>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="course__video-icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"
                                                xml:space="preserve">

                                                <path class="st0" d="M4,19.5C4,18.1,5.1,17,6.5,17H20" />
                                                <path class="st0"
                                                    d="M6.5,2H20v20H6.5C5.1,22,4,20.9,4,19.5v-15C4,3.1,5.1,2,6.5,2z" />
                                            </svg>
                                        </div>
                                        <div class="course__video-info">
                                            <h5><span>{{ __('frontend.lacture') }}</span>{{ $course->lessonsCount() }}
                                            </h5>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="course__video-icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                xml:space="preserve">
                                                <circle class="st0" cx="8" cy="8" r="6.7" />
                                                <polyline class="st0" points="8,4 8,8 10.7,9.3 " />
                                            </svg>
                                        </div>
                                        <div class="course__video-info">
                                            <h5><span>{{ __('frontend.duration') }}</span>{{ floor($course->duration / 86400) }}
                                                days </h5>
                                        </div>
                                    </li>


                                    @if (isset($course->language->title))
                                        <li class="d-flex align-items-center">
                                            <div class="course__video-icon">
                                                <svg>
                                                    <circle class="st0" cx="8" cy="8" r="6.7" />
                                                    <line class="st0" x1="1.3" y1="8" x2="14.7"
                                                        y2="8" />
                                                    <path class="st0"
                                                        d="M8,1.3c1.7,1.8,2.6,4.2,2.7,6.7c-0.1,2.5-1,4.8-2.7,6.7C6.3,12.8,5.4,10.5,5.3,8C5.4,5.5,6.3,3.2,8,1.3z" />
                                                </svg>
                                            </div>
                                            <div class="course__video-info">
                                                <h5><span>Language :</span>{{ $course->language->title }}</h5>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="course__payment mb-35">
                                <h3>Payment:</h3>
                                <a href="#">
                                    <img src="{{ asset('frontend') }}/assets/img/course/payment/payment-1.png"
                                        alt="">
                                </a>
                            </div>
                            <form action="{{ route('add.to.cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_type" value="course">
                                <input type="hidden" name="item_id" value="{{ $course->id }}">
                                <input type="hidden" value="1" min="1" name="quantity">
                                <div class="course__enroll-btn">
                                    <button type="submit" class="e-btn e-btn-7 w-100">Enroll <i
                                            class="far fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="course__sidebar-widget-2 white-bg mb-20">
                            @include('frontend.pages.course.recent-course', [
                                'recentCourses' => $recentCourses,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
