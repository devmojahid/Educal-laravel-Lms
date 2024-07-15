@extends('frontend.layouts.master')
@section('title', 'Instructor Page')
@section('content')
    {{-- Breadcrumb  --}}
    @include('frontend.layouts.breadcrumb', ['title' => 'Instructor', 'subtitle' => 'Instructor'])
    {{-- Breadcrumb End --}}
    <section class="teacher__area pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3">
                    <div class="section__title-wrapper text-center mb-60">
                        <h2 class="section__title">{{ __('frontend.our_most') }} <br> {{ __('frontend.popular') }}
                            <span class="yellow-bg"> {{ __('frontend.teachers') }}</span>
                            <br>
                        </h2>
                        <p>{{ __('frontend.you_dont_have_to_struggle_alone') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($instructors as $instructor)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="teacher__item text-center grey-bg-5 transition-3 mb-30">
                            <div class="teacher__thumb w-img fix">
                                <a href="{{ route('instructor.details', $instructor->id) }}">
                                    <img src="{{ asset($instructor->image) }}" alt="">
                                </a>
                            </div>
                            <div class="teacher__content">
                                <h3 class="teacher__title">{{ $instructor->fullname }}</h3>
                                <span>{{ $instructor->designation }}</span>

                                <div class="teacher__social">
                                    <ul>
                                        <li><a href="{{ $instructor->facebook }}"><i class="social_facebook"></i></a></li>
                                        <li><a href="{{ $instructor->twitter }}"><i class="social_twitter"></i></a></li>
                                        <li><a href="{{ $instructor->vimeo }}"><i class="social_vimeo"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>{{ __('frontend.no_instructor_found') }}</h2>
                @endforelse


            </div>
        </div>
    </section>
@endsection
