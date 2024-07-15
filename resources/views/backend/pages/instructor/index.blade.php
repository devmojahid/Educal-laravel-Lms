@extends("backend.layouts.master")
@section("title","Instructor Page Section")
@section("content")
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.instructor_page") }}</h3>
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
                        @yield("instructor-content")
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-block">{{ __("dashboard.instructor_page_settings") }}</h5>
                        <div class="section-list">
                            <ol class="stepper">
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.instructor") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.instructor") }}" class="stepper-link">
                                        <span>{{ __("dashboard.become_instructor") }}</span>
                                    </a>
                                    <span class="stepper-line"></span>
                                </li>
                            
                                <li class="stepper-item complete @if(Route::currentRouteName() == "admin.pages.instructor.service") active @endif">
                                    <span class="mr-4"><i class="fas fa-forward"></i></span>
                                    <a href="{{ route("admin.pages.instructor.service") }}" class="stepper-link">
                                        <span>{{ __("dashboard.instractor_service_section") }}</span>
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