<section class="cta__area mb--120">
    <div class="container">
       <div class="cta__inner blue-bg fix">
          <div class="cta__shape">
             <img src="{{asset("frontend")}}/assets/img/cta/cta-shape.png" alt="">
          </div>
          <div class="row align-items-center">
             <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-8">
               @if (getOptions('footer','footer_cta_title') != null)
                <div class="cta__content">
                   <h3 class="cta__title">{{ getOptions('footer','footer_cta_title') }}</h3>
                </div>
               @endif
             </div>
             <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-4">
               @if (getOptions('footer','footer_cta_btn_text') != null)
                <div class="cta__more d-md-flex justify-content-end p-relative z-index-1">
                   <a href="{{ getOptions('footer','footer_cta_btn_link') }}" class="e-btn e-btn-white">{{ getOptions('footer','footer_cta_btn_text') }}</a>
                </div>
               @endif
             </div>
          </div>
       </div>
    </div>
 </section>