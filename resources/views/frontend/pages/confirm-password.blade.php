@extends('frontend.layouts.guast')
@section('title', 'Confirm Password')
@section('content')
    <section class="signup__area sign__bg-wrapper">
        <div class="sign__bg blue-bg-3" data-background="{{ asset('frontend/assets/img/login/login-bg.jpg') }}"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="sign__bg-content">
                        <div class="sign__bg-logo">
                            <a href="{{ url('/') }}">
                                @if (getOptions('header', 'header_logo_2') != null)
                                    <img src="{{ asset(getOptions('header', 'header_logo_2')) }}" alt="logo">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tp-eduacal__sign-wrapper">
                        <div class="tp-eduacal__sign-box">
                            <div class="section__title-wrapper text-center mb-20">
                                <div class="mb-4 text-sm">
                                 {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                                </div>
                            </div>
                            <div class="sign__wrapper white-bg">
                              <div class="sign__form">
                                 <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                       <div class="sign__input-wrapper mb-25">
                                          <h5>Password</h5>
                                          <div class="sign__input">
                                             <input type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password">
                                             <i class="fal fa-lock"></i>
                                          </div>
                                          @error('password')
                                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                                          @enderror
                                       </div>
                                     <button class="e-btn  w-100">{{ __('Confirm') }}</button>
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
