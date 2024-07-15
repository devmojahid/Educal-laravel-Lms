@extends("backend.layouts.master")
@section("title","Home Page Section")
@section("content")
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.home_page") }}</h3>
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
                        <h5 class="card-title d-block">Home Page Settings</h5>
                        <div class="section-list">
                            <ol class="stepper">
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.hero") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.hero") }}" class="stepper-link">
                                        <span>Hero Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.category") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.category") }}" class="stepper-link">
                                        <span>Categoris Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.banner") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.banner") }}" class="stepper-link">
                                        <span>Banner Section</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.find.course") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.find.course") }}" class="stepper-link">
                                        <span>Find Course</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>

                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.homepage.event") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.homepage.event") }}" class="stepper-link">
                                        <span>Event Aria</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>

                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.counter") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.counter") }}" class="stepper-link">
                                        <span>Counter</span>
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