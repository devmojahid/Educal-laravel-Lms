@extends("backend.layouts.master")
@section("title","Error")
@section("content")
@include("frontend.layouts.breadcrumb",["title"=>"403 Error Page"])
    <section class="error__area pt-5 mt-5 pb-200">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                 <div class="error__item text-center">
                    <div class="error__thumb mb-45">
                       <img src="{{ asset("frontend") }}/assets/img/error/error.png" alt="">
                    </div>
                    <div class="error__content">
                       <h3 class="error__title">
                           403 Forbidden
                       </h3>
                       <p>
                           Sorry, you are not allowed to access this page.
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection