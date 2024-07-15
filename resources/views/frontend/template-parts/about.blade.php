@php
    $aboutEncoded = App\Models\SystemSetting::where('key', 'about_about')->get();
    $about = json_decode($aboutEncoded[0]->value, true);
    if (!isset($about['skillTitle'])) {
        $about['skillTitle'] = [];
    }
@endphp
<section class="about__area pt-120 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6">
                <div class="about__thumb-wrapper">
                    <div class="about__thumb ml-100">
                        @isset($about['image1'])
                            <img src="{{ asset($about['image1']) }}" alt="">
                        @endisset
                    </div>

                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="about__content pl-70 pr-60 pt-25">
                    <div class="section__title-wrapper mb-25">
                        <h2 class="section__title">{{ sanitizeJsonInput($about['title']) }}</h2>
                        <p>{{ sanitizeJsonInput($about['description']) }}</p>
                    </div>
                    <div class="about__list mb-35">
                        <ul>
                            @foreach ($about['skillTitle'] as $skill)
                                <li class="d-flex align-items-center"> <i class="icon_check"></i> {{ $skill }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ $about['button_url'] }}" class="e-btn e-btn-border">{{ $about['button_title'] }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
