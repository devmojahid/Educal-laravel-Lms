@extends("frontend.layouts.master")
@section("title","Error")
@section("content")
@include("frontend.layouts.breadcrumb",["title"=>"503 Error Page"])
    <section class="error__area pt-200 pb-200">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                 <div class="error__item text-center">
                    <div class="error__thumb mb-45">
                        <img src="{{ asset("frontend") }}/assets/img/error/error.png" alt=""> 
                    </div>
                    <div class="error__content">
                        <article>
                           <h1 class="error__title">We&rsquo;ll be back soon!</h1>
                           <div>
                              <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
                              <p>&mdash; The Team</p>
                              <a href="{{ url("/") }}" class="e-btn e-btn-3 e-btn-4">Back To Home</a> 
                           </div>
                        </article>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection