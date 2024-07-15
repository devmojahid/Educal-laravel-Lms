@extends('frontend.layouts.guast')
@section('title', 'Login Now')
@section('content')
    <section class="signup__area sign__bg-wrapper">
        <div class="sign__bg blue-bg-3"
            data-background="@if (getOptions('others', 'others_auth_template_image') != null) {{ getOptions('others', 'others_auth_template_image') }} @endif">
        </div>
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
                                <h2 class="section__title">Sign in</h2>
                            </div>
                            <div class="sign__wrapper white-bg">
                                <div class="sign__form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="sign__input-wrapper mb-25">
                                            <h5>Work email</h5>
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
                                        <div class="sign__input-wrapper mb-25">
                                            <h5>Password</h5>
                                            <div class="sign__input">
                                                <input type="password" name="password"
                                                    class="@error('password') is-invalid @enderror" required
                                                    autocomplete="current-password" placeholder="Password">
                                                <i class="fal fa-lock"></i>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="sign__action d-sm-flex justify-content-between mb-30">
                                            <div class="sign__agree d-flex align-items-center">
                                                <input class="m-check-input" name="remember" type="checkbox" id="m-agree">
                                                <label class="m-check-label" for="m-agree">Keep me signed in
                                                </label>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="sign__forgot">
                                                    <a
                                                        href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        @if (config('app.env') === 'demo')
                                            <div class="row mt-5 mb-25">
                                                <div class="col-12">
                                                    <div class="tp-educal__login-info">
                                                        <label class="fw-bold">Admin Access</label>
                                                        <div
                                                            class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                                                            <small class="auth_email">admin@gmail.com</small>
                                                            <small class="auth_password">12345678</small>
                                                            <button class="btn btn-sm btn-secondary py-0 px-2 copy"
                                                                type="button">Copy</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 mt-3">
                                                    <div class="tp-educal__login-info">
                                                        <label class="fw-bold">Teacher Access</label>
                                                        <div
                                                            class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                                                            <small class="auth_email">teacher@gmail.com</small><br>
                                                            <small class="auth_password">12345678</small>
                                                            <button class="btn btn-sm btn-secondary py-0 px-2 copy"
                                                                type="button">Copy</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <div class="tp-educal__login-info">
                                                        <label class="fw-bold">Student Access</label>
                                                        <div
                                                            class="d-flex flex-wrap align-items-center justify-content-between">
                                                            <small class="auth_email">student@gmail.com</small><br>
                                                            <small class="auth_password">12345678</small>
                                                            <button class="btn btn-sm btn-secondary py-0 px-2 copy"
                                                                type="button">Copy</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif

                                        <button class="e-btn  w-100"> <span></span> Sign In</button>
                                        <div class="sign__new text-center mt-20">
                                            <p>New to
                                                @if (env('APP_NAME') == 'Educal')
                                                    Educal
                                                @else
                                                    {{ env('APP_NAME') }}
                                                @endif <a href="{{ route('register') }}">Sign Up</a>
                                            </p>
                                        </div>
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


@push('scripts')
    <script>
        "use strict";
        $(document).ready(function() {
            $(".copy").on('click', function(e) {
                e.preventDefault();
                var email = $(this).parent().find('.auth_email').text();
                var password = $(this).parent().find('.auth_password').text();
                $("input[name='email']").val(email);
                $("input[name='password']").val(password);
            });

        });
    </script>
@endpush
