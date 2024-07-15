@extends("backend.layouts.master")
@section("title","About Page Settings")
@section("content")
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.about_page") }}</h3>
            </div>
        </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @yield("home-content")
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-block">About Page Settings</h5>
                        <div class="section-list">
                            <ol class="stepper">
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.about") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.about") }}" class="stepper-link">
                                        <span>About Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.brand") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.brand") }}" class="stepper-link">
                                        <span>Brand Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.about.banner" || request()->is('admin/pages/about/banner/*')) active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.about.banner") }}" class="stepper-link">
                                        <span>Banner Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.about.testimonial") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.about.testimonial") }}" class="stepper-link">
                                        <span>Testimonial</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>

                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.about.counter" || request()->is('admin/about/counter')) active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.about.counter") }}" class="stepper-link">
                                        <span>Counter</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>

                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.why" || request()->is('admin/about/why')) active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.why") }}" class="stepper-link">
                                        <span>Why Area</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                               
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection