@extends('frontend.layouts.master')
@section('title', 'Event Details')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Event Details'])
    <!-- page title area start -->
    <section class="page__title-area pt-120">
        <div class="page__title-shape">
            <img class="page-title-shape-5 d-none d-sm-block"
                src="{{ asset('frontend/assets/img/page-title/page-title-shape-1.png') }}" alt="">
            <img class="page-title-shape-6" src="{{ asset('frontend/assets/img/page-title/page-title-shape-2.png') }}"
                alt="">
            <img class="page-title-shape-7" src="{{ asset('frontend/assets/img/page-title/page-title-shape-4.png') }}"
                alt="">
            <img class="page-title-shape-8" src="{{ asset('frontend/assets/img/page-title/page-title-shape-5.png') }}"
                alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8">
                    <div class="page__title-content mb-25 pr-40">
                        @isset($event->title)
                            <h5 class="page__title-3">{{ $event->title }}</h5>
                        @endisset
                    </div>
                    <div class="course__meta-2 d-sm-flex mb-30">
                        <div class="course__teacher-3 d-flex align-items-center mr-70 mb-30">
                            @isset($event->speaker_image)
                                <div class="course__teacher-thumb-3 mr-15">
                                    <img src="{{ asset($event->speaker_image) }}" alt="speaker Image">
                                </div>
                            @endisset
                            <div class="course__teacher-info-3">
                                <h5>{{ __('frontend.speaker') }}</h5>
                                @isset($event->speaker_name)
                                    <p>{{ $event->speaker_name }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="course__update mr-80 mb-30">
                            <h5>{{ __('frontend.start_date') }}</h5>
                            @isset($event->start_date)
                                <p>{{ monthDayYear($event->start_date) }}</p>
                            @endisset
                        </div>
                        <div class="course__update mb-30">
                            <h5>{{ __('frontend.location') }}</h5>
                            @isset($event->location)
                                <p>{{ $event->location }}</p>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- event details area start -->
    <section class="event__area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="events__wrapper">
                        <div class="events__thumb mb-35 w-img">
                            @isset($event->image)
                                <img src="{{ asset($event->image) }}" alt="Event Image">
                            @endisset
                        </div>
                        <div class="events__details mb-35">
                            <h3>Description</h3>
                            @isset($event->description)
                                {{ sanitizeInput($event->description) }}
                            @endisset
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="events__sidebar pl-70">
                        <div class="events__sidebar-widget white-bg mb-20">
                            <div class="events__sidebar-shape">
                                <img class="events-sidebar-img-2"
                                    src="{{ asset('frontend') }}/assets/img/events/event-shape-2.png" alt="">
                                <img class="events-sidebar-img-3"
                                    src="{{ asset('frontend') }}/assets/img/events/event-shape-3.png" alt="">
                            </div>
                            <div class="events__info">
                                <div class="events__info-meta mb-25 d-flex align-items-center justify-content-between">
                                    @isset($event->ticket_price)
                                        @if ($event->ticket_discount_price)
                                            <div class="events__info-price">
                                                @isset($event->ticket_discount_price)
                                                    <h5>{{ currency_symbol($event->ticket_discount_price) }}</h5>
                                                @endisset
                                                @isset($event->ticket_price)
                                                    <h5 class="old-price">{{ currency_symbol($event->ticket_price) }}</h5>
                                                @endisset
                                            </div>
                                            <div class="events__info-discount">
                                                <span>
                                                    {{ floor((($event->ticket_price - $event->ticket_discount_price) / $event->ticket_price) * 100) }}{{ __('frontend.%_off') }}
                                                </span>
                                            </div>
                                        @else
                                            <div class="events__info-price">
                                                @isset($event->ticket_price)
                                                    <h5>{{ numberFormat($event->ticket_price) }}</h5>
                                                @endisset
                                            </div>
                                        @endif
                                    @endisset
                                </div>
                                <div class="events__info-content mb-35">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="events__info-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;"
                                                    xml:space="preserve">
                                                    <path class="st0"
                                                        d="M2,6l6-4.7L14,6v7.3c0,0.7-0.6,1.3-1.3,1.3H3.3c-0.7,0-1.3-0.6-1.3-1.3V6z" />
                                                    <polyline class="st0" points="6,14.7 6,8 10,8 10,14.7 " />
                                                </svg>
                                            </div>
                                            <div class="events__info-item">
                                                <h5><span>{{ __('frontend.end_date') }}</span>
                                                    @isset($event->start_date)
                                                        {{ monthDayYear($event->start_date) }}
                                                    @endisset
                                                    @isset($event->end_date)
                                                        {{ timeFormat($event->end_time) }}
                                                    @endisset

                                                </h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="events__info-icon">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="events__info-item">
                                                <h5><span>{{ __('frontend.time') }}</span>
                                                    @isset($event->start_time)
                                                        {{ timeFormat($event->start_time) }}
                                                    @endisset
                                                    {{ __('frontend.-') }}
                                                    @isset($event->end_time)
                                                        {{ timeFormat($event->end_time) }}
                                                    @endisset
                                                </h5>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="events__info-icon">
                                                <i class="far fa-map-marker-alt"></i>
                                            </div>
                                            <div class="events__info-item">
                                                <h5><span>{{ __('frontend.vanue') }} </span>
                                                    @isset($event->location)
                                                        {{ $event->location }}
                                                    @endisset
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="events__join-btn">
                                    <form action="{{ route('event.ticket') }}" method="POST">
                                        @csrf
                                        @isset($event->id)
                                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        @endisset
                                        <button class="e-btn e-btn-7 w-100">{{ __('frontend.enroll') }} <i
                                                class="far fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="events__sidebar-widget white-bg">
                            <div class="events__sponsor">
                                <h3 class="events__sponsor-title">{{ __('frontend.sponsor') }}</h3>
                                <div class="events__sponsor-thumb mb-35">
                                    @isset($event->sponsor_logo)
                                        <img src="{{ asset($event->sponsor_logo) }}" alt="">
                                    @endisset
                                </div>
                                <div class="events__sponsor-info">
                                    @isset($event->sponsor_name)
                                        <h3>{{ $event->sponsor_name }}</h3>
                                    @endisset
                                    @isset($event->sponsor_email)
                                        <h4>{{ __('frontend.email') }} <span>{{ $event->sponsor_email }}</span></h4>
                                    @endisset

                                    <div class="events__social d-xl-flex align-items-center">
                                        <h4>{{ __('frontend.sponsor_social') }}</h4>
                                        <ul>
                                            @isset($event->sponsor_facebook)
                                                <li><a href="{{ $event->sponsor_facebook }}" class="fb"><i
                                                            class="social_facebook"></i></a></li>
                                            @endisset
                                            @isset($event->sponsor_twitter)
                                                <li><a href="{{ $event->sponsor_twitter }}" class="tw"><i
                                                            class="social_twitter"></i></a></li>
                                            @endisset
                                            @isset($event->sponsor_pinterest)
                                                <li><a href="{{ $event->sponsor_pinterest }}" class="pin"><i
                                                            class="social_pinterest"></i></a>
                                                </li>
                                            @endisset
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event details area end -->
@endsection
