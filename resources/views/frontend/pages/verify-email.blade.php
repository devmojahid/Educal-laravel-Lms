@extends('frontend.layouts.guast')
@section('title', 'Verify Email')
@section('content')
    <section class="signup__area sign__bg-wrapper">
        <div class="sign__bg blue-bg-3" data-background="@if (getOptions('others', 'others_auth_template_image') != null) {{ getOptions('others', 'others_auth_template_image') }} @endif"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="sign__bg-content">
                        @if (getOptions('header', 'header_logo_2') != null)
                            @php
                                $logo = getOptions('header', 'header_logo_2');
                            @endphp
                            <div class="sign__bg-logo">
                                <a href="{{ url('/') }}">
                                    @if ($logo != null)
                                        <img src="{{ asset($logo) }}" alt="logo">
                                    @endif
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="tp-eduacal__sign-wrapper">
                        <div class="tp-eduacal__sign-box">
                            <div class="section__title-wrapper text-center mb-20">
                                <div class="mb-4 text-sm">
                                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </div>
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <div class="sign__form">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button class="e-btn  w-100"> <span></span>
                                        {{ __('Resend Verification Email') }}</button>
                                    <div class="sign__new text-center mt-20">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
