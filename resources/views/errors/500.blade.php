@extends("frontend.layouts.master")
@section("title","Error")
@section("content")
@include("frontend.layouts.breadcrumb",["title"=>"500 Server Error"])
    <section class="error__area pt-200 pb-200">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                 <div class="error__item text-center">
                    <div class="error__thumb mb-45">
                       <img src="{{ asset("frontend") }}/assets/img/error/error.png" alt="">
                    </div>
                    <div class="error__content">
                       <h3 class="error__title">Server Error</h3>
                       <p>Please try searching for some other page.</p>
                       <a href="{{ url("/") }}" class="e-btn e-btn-3 e-btn-4">Back To Home</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection