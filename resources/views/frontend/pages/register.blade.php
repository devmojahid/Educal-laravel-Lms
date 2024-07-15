@extends('frontend.layouts.guast')
@section('title', 'Register Now')
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
                        <div class="tp-eduacal__sign-box-2">
                            <div class="section__title-wrapper text-center mb-20">
                                <h2 class="section__title">Create a free Account</h2>
                            </div>
                            <div class="sign__wrapper white-bg">
                                <div class="sign__form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="sign__input-wrapper mb-25">
                                                    <h5>First Name</h5>
                                                    <div class="sign__input">
                                                        <input type="text" name="first_name"
                                                            class="@error('first_name') is-invalid @enderror"
                                                            placeholder="Mojahid" value="{{ old('first_name') }}" required
                                                            autofocus autocomplete="name">
                                                        <i class="fal fa-user"></i>
                                                    </div>
                                                    @error('first_name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="sign__input-wrapper mb-25">
                                                    <h5>Last Name</h5>
                                                    <div class="sign__input">
                                                        <input type="text" name="last_name"
                                                            class="@error('last_name') is-invalid @enderror"
                                                            placeholder="Islam" value="{{ old('last_name') }}" required
                                                            autofocus autocomplete="name">
                                                        <i class="fal fa-user"></i>
                                                    </div>
                                                    @error('last_name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="sign__input-wrapper mb-25">
                                                    <h5>Work email</h5>
                                                    <div class="sign__input">
                                                        <input type="email" name="email"
                                                            class="@error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" required autocomplete="username"
                                                            placeholder="e-mail address">
                                                        <i class="fal fa-envelope"></i>
                                                    </div>
                                                    @error('email')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
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
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="sign__input-wrapper mb-10">
                                                    <h5>Re-Password</h5>
                                                    <div class="sign__input">
                                                        <input type="password"
                                                            class="@error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password" placeholder="Re-Password">
                                                        <i class="fal fa-lock"></i>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="e-btn w-100"> <span></span> Sign Up</button>
                                            </div>
                                        </div>
                                        <div class="sign__new text-center mt-20">
                                            <p>Already in Educal ? <a href="{{ route('login') }}"> Sign In</a></p>
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
