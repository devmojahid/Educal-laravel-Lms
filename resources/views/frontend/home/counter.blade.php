@php
    $counterData = App\Models\SystemSetting::where('key', 'home_counter')->first();
    if (isset($counterData->value)) {
        $counters = json_decode($counterData->value, true);
    } else {
        $counters = [];
    }
@endphp

<section class="counter__area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 offset-xl-3 col-xl-6 offset-xl-3">
                <div class="section__title-wrapper text-center mb-60">
                    @if (isset($counters['title']))
                        <h2 class="section__title">{{ sanitizeInput($counters['title']) }}</h2>
                    @endif
                    @if (isset($counters['description']))
                        <p>{{ sanitizeInput($counters['description']) }}</p>
                    @endif
                </div>
            </div>
        </div>     
        @isset($counters['counter'])
            <div class="pl-60 pr-60">
                @php
                    $iconColors = ['user', 'book', 'graduate', 'globe'];
                @endphp
                <div class="row">
                    @for ($i = 0; $i < count($counters['counter']['counter_amount']); $i++)
                        @php
                            $icon_color = $iconColors[$i] ?? 'user';
                        @endphp
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                            <div class="counter__item mb-30">
                                <div class="counter__icon {{ $icon_color }} mb-15">
                                    @isset($counters['counter']['counter_icon'][$i])
                                        <img src="{{ $counters['counter']['counter_icon'][$i] }}" alt="">
                                    @endisset
                                </div>
                                <div class="counter__content">
                                    <h4><span class="counter">{{ $counters['counter']['counter_amount'][$i] }}</span></h4>
                                    <p>{{ $counters['counter']['counter_desc'][$i] }}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @endisset
    </div>
</section>
