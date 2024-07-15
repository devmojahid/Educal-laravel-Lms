@extends('frontend.layouts.guast')
@section('title', 'Reset Password')
@section('content')
    <section class="signup__area sign__bg-wrapper">
        <div class="sign__bg blue-bg-3" data-background="@if (getOptions('others', 'others_auth_template_image') != null) {{ getOptions('others', 'others_auth_template_image') }} @endif"></div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-5">
                    <div class="sign__bg-content mt-80">
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
                </div>

                <div class="col-md-7">
                    <div class="tp-eduacal__sign-wrapper">
                        <div class="tp-eduacal__sign-box">
                            <div class="sign__form">
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="sign__input-wrapper mb-25">
                                        <h5>Your email</h5>
                                        <div class="sign__input">
                                            <input type="email" name="email"
                                                class="@error('email') is-invalid @enderror"
                                                value="{{ old('email', $request->email) }}" required autocomplete="username"
                                                placeholder="e-mail address">
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
                                                autocomplete="new-password" placeholder="Password">
                                            <i class="fal fa-lock"></i>
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="sign__input-wrapper mb-10">
                                        <h5>Confirm Password</h5>
                                        <div class="sign__input">
                                            <input type="password"
                                                class="@error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password">
                                            <i class="fal fa-lock"></i>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="e-btn  w-100"> {{ __('Reset Password') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
