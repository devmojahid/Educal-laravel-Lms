<section class="hero__area hero__height d-flex align-items-center grey-bg-2 p-relative">
   @if (getSystemSetting("hero_sliders",'hero_shapes') == "on")
    <div class="hero__shape">
       <img class="hero-1-circle" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-circle.png" alt="">
       <img class="hero-1-circle-2" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-circle-2.png" alt="">
       <img class="hero-1-dot-2" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-dot-2.png" alt="">
    </div>
    @endif
    <div class="container">
       <div class="hero__content-wrapper mt-90">
          <div class="row align-items-center">
             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                <div class="hero__content p-relative z-index-1">
                  <h3 class="hero__title">
                     
                     <span>{{ sanitizeJsonInput(getSystemSetting("hero_sliders",'hero_subtitle'))}}</span>
                     <span class="yellow-shape">{{ sanitizeJsonInput(getSystemSetting("hero_sliders",'hero_title'))}} </span>
                  </h3>
                      <p>{{ sanitizeJsonInput(getSystemSetting("hero_sliders",'hero_discription')) }}</p>
                      <a href="{{  getSystemSetting("hero_sliders",'hero_button_link')  }}" class="e-btn">{{ getSystemSetting("hero_sliders",'hero_button_text') }}</a>
                </div>
             </div>
             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                <div class="hero__thumb d-flex p-relative">
                  @if (getSystemSetting("hero_sliders",'hero_shapes') == "on")
                   <div class="hero__thumb-shape">
                      <img class="hero-1-dot" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-dot.png" alt="">
                      <img class="hero-1-circle-3" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-circle-3.png" alt="">
                      <img class="hero-1-circle-4" src="{{asset("frontend")}}/assets/img/shape/hero/hero-1-circle-4.png" alt="">
                   </div>
                   @endif
                   <div class="hero__thumb-big mr-30">
                      <img src="{{asset(getSystemSetting("hero_sliders",'image1'))}}" alt="">
                      <div class="hero__quote hero__quote-animation">
                         <span>{{ getSystemSetting("hero_sliders",'hero_info_title') }}</span>
                         <h4>{{ getSystemSetting("hero_sliders",'hero_info_discription') }}</h4>
                      </div>
                   </div>
                   <div class="hero__thumb-sm mt-50 d-none d-lg-block">
                      <img src="{{asset(getSystemSetting("hero_sliders",'image2'))}}" alt="">
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>