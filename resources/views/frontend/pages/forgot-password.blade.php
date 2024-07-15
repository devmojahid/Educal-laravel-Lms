@extends('frontend.layouts.guast')
@section('title', 'Forgot Password')
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
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
                            </div>
                            <div class="sign__wrapper white-bg">
                                <div class="sign__form">
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="sign__input-wrapper mb-25">
                                            <h5>Your email</h5>
                                            <div class="sign__input">
                                                <input type="email" name="email"
                                                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                    required autocomplete="username" placeholder="e-mail address">
                                                <i class="fal fa-envelope"></i>
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="e-btn  w-100"> {{ __('Email Password Reset Link') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
