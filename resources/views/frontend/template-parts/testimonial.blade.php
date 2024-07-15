@php
    $testimonials = App\Models\Testimonial::orderBy('id', 'desc')->get();
    $testimonialSection = App\Models\SystemSetting::where('key', 'testimonial')->get();
    if (isset($testimonialSection[0])) {
        $testimonialSection = json_decode($testimonialSection[0]->value, true);
    }
@endphp
@isset($testimonialSection)
    <section class="testimonial__area pt-145 pb-150"
        data-background="{{ asset('frontend') }}/assets/img/testimonial/home-3/testimonial-bg-3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10">
                    <div class="testimonial__slider-3">
                        @isset($testimonialSection['title'])
                            <h3 class="testimonial__title">{{ sanitizeInput($testimonialSection['title']) }}</h3>
                        @endisset
                        <div class="testimonial__slider-wrapper swiper-container testimonial-text mb-35">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial__item-3">
                                            <p>{{ sanitizeInput($testimonial->description) }}</p>

                                            <div class="testimonial__info-2">
                                                <h4>{{ $testimonial->name }}</h4>
                                                <span>{{ $testimonial->designation }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-container testimonial-nav">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial__nav-thumb">
                                            <img src="{{ asset($testimonial->image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-10">
                    <div class="testimonial__video ml-70 fix">
                        <div class="testimonial__thumb-3">
                            @if (isset($testimonialSection['videoUrl']))
                                <iframe src="{{ getYoutubeVideoEmbedUrl($testimonialSection['videoUrl']) }}"
                                    title="YouTube video player"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            @endif
                        </div>
                        <div class="testimonial__video-content d-sm-flex">
                            <div class="testimonial__video-icon mr-20 mb-20">
                                <span>
                                    <svg version="1.1" id="educal-youtube" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24"
                                        style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                        <path class="st0"
                                            d="M22,11.1V12c0,5.5-4.5,10-10,10C6.5,22,2,17.5,2,12C2,6.5,6.5,2,12,2c1.4,0,2.8,0.3,4.1,0.9" />
                                        <polyline class="st0" points="22,4 12,14 9,11 " />
                                    </svg>
                                </span>
                            </div>
                            <div class="testimonial__video-text">
                                @isset($testimonialSection['videoTitle'])
                                    <h4>{{ $testimonialSection['videoTitle'] }}</h4>
                                @endisset
                                @isset($testimonialSection['videoDesc'])
                                    <p>{{ $testimonialSection['videoDesc'] }}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
