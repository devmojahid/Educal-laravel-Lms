@php
    $bannersEncoded = App\Models\SystemSetting::where('key', 'about_banner')->get();
    if (isset($bannersEncoded[0])) {
        $banners = json_decode($bannersEncoded[0]->value, true);
    }
@endphp
@if (isset($banners) && count($banners) > 0)
    <section class="banner__area pb-110">
        <div class="container">
            <div class="row">
                @foreach ($banners as $banner)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative mb-40" data-background="{{ asset($banner['bg_image']) }}">
                            <div class="banner__content">
                                <span>{{ $banner['sub_title'] }}</span>
                                <h3 class="banner__title">
                                    <a href="{{ $banner['button_url'] }}">{{ sanitizeInput($banner['title']) }}</a>
                                </h3>
                                <a href="{{ $banner['button_url'] }}"
                                    class="e-btn e-btn-2">{{ $banner['button_title'] }}</a>
                            </div>
                            <div class="banner__thumb d-none d-sm-block d-md-none d-lg-block">
                                <img src="{{ asset($banner['side_image']) }}" alt="{{ $banner['title'] }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
