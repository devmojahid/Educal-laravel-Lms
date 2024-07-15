@extends('frontend.layouts.master')
@section('title', 'Make Instructor Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Make Instructor'])
    @include('frontend.layouts.message')
    @include('frontend.template-parts.apply-instractor')

    @php
        $becomeInstractor = App\Models\InsructorBanner::orderBy('id', 'desc')->get();
        $becomeInstractorSection = App\Models\SystemSetting::where('key', 'instructor_service')->get();
        if (isset($becomeInstractorSection[0])) {
            $becomeInstractorSection = json_decode($becomeInstractorSection[0]->value, true);
        }
    @endphp
    <section class="services__area pt-115 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                    <div class="section__title-wrapper section-padding mb-60 text-center">
                        @isset($becomeInstractorSection['title'])
                            <h2 class="section__title">{{ sanitizeInput($becomeInstractorSection['title']) }}</h2>
                        @endisset
                        @isset($becomeInstractorSection['description'])
                            <p>{{ sanitizeInput($becomeInstractorSection['description']) }}</p>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($becomeInstractor as $instractor)
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="services__item mb-30" style="background-color:{{ $instractor->bg_color }}">
                            <div class="services__icon">
                                @isset($instractor->icon)
                                    <img src="{{ asset($instractor->icon) }}" alt="">
                                @endisset 
                            </div>
                            <div class="services__content">
                                @isset($instractor->title)
                                    <h3 class="services__title"><a href="{{ $instractor->button_link }}">{{ $instractor->title }}</a></h3>
                                @endisset
                                <p>{{ $instractor->description }}</p>
                                @isset($instractor->button_link)
                                    <a href="{{ $instractor->button_link }}" class="link-btn-2">
                                        <i class="far fa-arrow-right"></i>
                                        <i class="far fa-arrow-right"></i>
                                    </a>
                                @endisset
                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
