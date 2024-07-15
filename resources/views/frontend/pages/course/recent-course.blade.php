<div class="course__sidebar-course">
    <h3 class="course__sidebar-title">{{ __('frontend.recent_course') }}</h3>
    <ul>
        @foreach ($recentCourses as $recentCourse)
            <li>
                <div class="course__sm d-flex align-items-center mb-20">
                    <div class="course__sm-thumb mr-20">
                        <a href="{{ route('course.details', $recentCourse->slug) }}">
                            <img src="{{ asset($recentCourse->image) }}" alt="{{ $recentCourse->title }}">
                        </a>
                    </div>
                    <div class="course__sm-content">
                        <div class="course__sm-rating">
                            <ul>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($recentCourse->reviewsAvg() >= $i)
                                        <li><a href="javascript:void(0)"> <i class="icon_star"></i> </a></li>
                                    @else
                                        <li><a href="javascript:void(0)"><i class="fal fa-star"></i></a></li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                        <h5><a href="{{ route('course.details', $recentCourse->slug) }}">{{ $recentCourse->title }}</a>
                        </h5>
                        <div class="course__sm-price">
                            <span>
                                {{ getCoursePrice($recentCourse) }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
