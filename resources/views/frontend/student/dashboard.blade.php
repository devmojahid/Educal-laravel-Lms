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
                    <div class="tp-dashboard-body Dashboard">
                        <h3 class="dashboard-title mb-20">{{ __('dashboard.dashboard') }}</h3>
                        <div class="row row-cols-3">
                            <div class="col">
                                <div class="tp-dashboard-card mb-30 text-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div class="tp-card-number mt-15 mb-15">
                                        {{ $courseCounts['pending'] ?? 0 }}
                                    </div>
                                    <span class="tp-card-title">{{ __('frontend.pending_course') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-dashboard-card mb-30 text-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div class="tp-card-number mt-15 mb-15">
                                        {{ $courseCounts['enrolled'] ?? 0 }}
                                    </div>
                                    <span class="tp-card-title">{{ __('frontend.enrolled_course') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-dashboard-card mb-30 text-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div class="tp-card-number mt-15 mb-15">
                                        {{ $courseCounts['active'] ?? 0 }}
                                    </div>
                                    <span class="tp-card-title">{{ __('frontend.active_course') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-dashboard-card mb-30 text-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div class="tp-card-number mt-15 mb-15">
                                        {{ $courseCounts['complete'] ?? 0 }}
                                    </div>
                                    <span class="tp-card-title">{{ __('frontend.completed_course') }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="tp-dashboard-card mb-30 text-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <div class="tp-card-number mt-15 mb-15">
                                        {{ $courseCounts['canceled'] ?? 0 }}
                                    </div>
                                    <span class="tp-card-title">{{ __('frontend.cenceled_course') }}</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
