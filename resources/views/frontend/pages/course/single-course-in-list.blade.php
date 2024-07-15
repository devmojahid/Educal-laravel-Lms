@if ($courses->count() >= 0)
    <div class="row">
        @forelse ($courses as $course)
            <div class="col-xxl-12">
                <div class="course__item white-bg mb-30 fix">
                    <div class="row gx-0">
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="course__thumb course__thumb-list w-img p-relative fix">
                                <a href="{{ route('course.details', $course->slug) }}">
                                    <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                                </a>
                                @isset($course->category)
                                    <div class="course__tag">
                                        <a
                                            href="{{ route('course.category', $course->category->slug) }}">{{ $course->category->title }}</a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                            <div class="course__right">
                                <div class="course__content course__content-4">
                                    <div class="course__meta d-flex align-items-center">
                                        <div class="course__lesson mr-20">
                                            <span><i class="far fa-book-alt"></i>{{ $course->lessonsCount() }}
                                                Lesson</span>
                                        </div>
                                        <div class="course__rating">
                                            <span><i class="icon_star"></i>{{ $course->reviewsAvg() }}
                                                ({{ $course->reviewsCount() }})
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="course__title">
                                        <a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                    </h3>
                                    <div class="course__teacher d-flex align-items-center">
                                        <div class="course__teacher-thumb mr-15">
                                            @isset($course->user->image)
                                                <img src="{{ asset($course->user->image) }}"
                                                    alt="{{ $course->user->full_name }}">
                                            @endisset
                                        </div>
                                        @isset($course->user->id)
                                        <h6><a href="{{ route('instructor.details', $course->user->id) }}">{{ $course->user->full_name }}
                                            </a></h6>
                                        @endisset
                                    </div>
                                </div>
                                <div
                                    class="course__more course__more-2 course__more-3 d-flex justify-content-between align-items-center">
                                    <div class="course__status">
                                        <span>{{ getCoursePrice($course) }}</span>
                                    </div>
                                    <div class="course__btn">
                                        <a href="{{ route('course.details', $course->slug) }}" class="link-btn">
                                            {{ __('frontend.know_details') }}
                                            <i class="far fa-arrow-right"></i>
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">
                <strong>{{ __('frontend.sorry') }}</strong> {{ __('frontend.no_course_found') }}
            </div>
        @endforelse
    </div>
@else
    <div class="alert alert-warning" role="alert">
        <strong>{{ __('frontend.sorry') }}</strong> {{ __('frontend.no_course_found') }}
    </div>
@endif
