@php
    $eventData = App\Models\SystemSetting::where('key', 'home_event')->first();
    if (isset($eventData->value)) {
        $events = json_decode($eventData->value, true);
    } else {
        $events = [];
    }
@endphp

<section class="events__area pt-115 pb-120 p-relative">
    <div class="events__shape">
        <img class="events-1-shape" src="{{ asset('frontend') }}/assets/img/events/events-shape.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 offset-xxl-4">
                <div class="section__title-wrapper mb-60 text-center">
                    @if (isset($events['title']))
                        <h2 class="section__title">{{ sanitizeInput($events['title']) }} <span
                                class="yellow-bg yellow-bg-big"><img
                                    src="{{ asset('frontend') }}/assets/img/shape/yellow-bg.png" alt=""></span></h2>
                    @endif
                    @if (isset($events['description']))
                        <p>{{ sanitizeInput($events['description']) }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($events = App\Models\Event::orderBy('id', 'desc')->limit(4)->get() as $event)
                <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                    <div class="events__item mb-10 hover__active">
                        <div class="events__item-inner d-sm-flex align-items-center justify-content-between white-bg">
                            <div class="events__content">
                                <div class="events__meta">
                                    <span>{{ monthDayYear($event->start_date) }}</span>
                                    <span>
                                        {{ timeFormat($event->start_time) }}
                                        {{ __('frontend.-') }}
                                        {{ timeFormat($event->end_time) }}
                                    </span>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <h3 class="events__title"><a
                                        href="{{ route('event.details', $event->id) }}">{{ $event->title }}</a>
                                </h3>
                            </div>
                            <div class="events__more">
                                <a href="{{ route('event.details', $event->id) }}" class="link-btn">
                                    {{ __('frontend.view_more') }}
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2 class="text-center">
                    {{ __('frontend.no_event_found') }}
                </h2>
            @endforelse
        </div>
    </div>
</section>
