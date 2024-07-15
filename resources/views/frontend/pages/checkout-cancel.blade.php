@extends("frontend.layouts.master")
@section("title","Your Order Cenceled")
@section("content")
{{-- @include("frontend.layouts.breadcrumb",["title"=>"Your Cenceled Order"])
   <div class="container mt-65 mb-65">
      <div class="card">
          <div class="card-body">
            Your Order Cenceled
          </div>
      </div>
  </div> --}}

  @include("frontend.layouts.breadcrumb",["title"=>"Error Page"])
    <section class="error__area pt-150 pb-200">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                 <div class="error__item text-center">
                    <div class="error__content">
                       <h3 class="error__title pb-40">Order Cenceled</h3>
                       <a href="{{ url("/") }}" class="e-btn e-btn-3 e-btn-4">Back To Home</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection