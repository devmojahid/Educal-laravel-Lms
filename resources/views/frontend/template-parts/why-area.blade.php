@php
    $whyEncoded = App\Models\SystemSetting::where('key', 'about_why')->get();
    if (isset($whyEncoded[0])) {
        $why = json_decode($whyEncoded[0]->value, true);
    }
@endphp
@isset($why)
    <section class="why__area pt-125">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6 col-md-8">
                    <div class="why__content pr-50 mt-40">
                        <div class="section__title-wrapper mb-30">
                            <span class="section__sub-title">{{ $why['sub_title'] }}</span>
                            @isset($why['title'])
                                <h2 class="section__title">{{ sanitizeJsonInput($why['title']) }}</h2>
                            @endisset
                            @isset($why['description'])
                                <p>{{ sanitizeJsonInput($why['description']) }}</p>
                            @endisset
                        </div>
                        <div class="why__btn">
                            @isset($why['why_button_1'])
                            <a href="{{ $why['why_button_url_1'] }}"
                                class="e-btn e-btn-3 mr-30">{{ $why['why_button_1'] }}</a>
                            @endisset
                            @isset($why['why_button_2'])
                            <a href="{{ $why['why_button_url_2'] }}" class="link-btn">{{ $why['why_button_2'] }}
                                <i class="far fa-arrow-right"></i>
                                <i class="far fa-arrow-right"></i>
                            </a>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8">
                    <div class="why__thumb">
                        @isset($why['image1'])
                            <img src="{{ asset($why['image1']) }}" alt="">
                        @endisset
                        <img class="why-green" src="{{ asset('frontend') }}/assets/img/why/why-shape-green.png"
                            alt="">
                        <img class="why-pink" src="{{ asset('frontend') }}/assets/img/why/why-shape-pink.png"
                            alt="">
                        <img class="why-dot" src="{{ asset('frontend') }}/assets/img/why/why-shape-dot.png" alt="">
                        <img class="why-line" src="{{ asset('frontend') }}/assets/img/why/why-shape-line.png"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
