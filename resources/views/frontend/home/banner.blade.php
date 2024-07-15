@php
    $bannersEncoded = App\Models\SystemSetting::where('key', 'banner')->get();
    $banners = [];
    if (count($bannersEncoded) > 0) {
        $decodedBanners = json_decode($bannersEncoded[0]->value, true);
        if (is_array($decodedBanners)) {
            $banners = $decodedBanners;
        }
    }
@endphp
@if (count($banners) > 0)
    <section class="banner__area pb-110">
        <div class="container">
            <div class="row">
                @foreach ($banners as $banner)
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative mb-40" data-background="{{ asset($banner['bg_image']) }}">
                            <div class="banner__content">
                                <span>{{ $banner['sub_title'] }}</span>
                                <h3 class="banner__title">
                                    @if(isset($banner['button_url']) || isset($banner['button_title']))
                                        <a href="{{ $banner['button_url'] }}">{{ $banner['title'] }}</a>
                                    @else
                                        {{ $banner['title'] }}
                                    @endif
                                </h3>
                                @isset($banner['button_url'])
                                    <a href="{{ $banner['button_url'] }}"
                                        class="e-btn e-btn-2">{{ $banner['button_title'] }}</a>
                                @endisset
                            </div>
                            <div class="banner__thumb d-none d-sm-block d-md-none d-lg-block">
                                @isset($banner['side_image'])
                                    <img src="{{ asset($banner['side_image']) }}" alt="{{ $banner['title'] }}">
                                @endisset
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
