<div class="course__review">
    <h3>{{ __('frontend.reviews') }}</h3>

    <div class="course__review-rating mb-50">
        <div class="row g-0">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="course__review-rating-info grey-bg text-center">
                    <h5>
                        {{ $course->reviewsCount() }}
                    </h5>
                    <ul>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($course->reviewsAvg() >= $i)
                                <li><a href="javascript:void(0)"><i class="icon_star"></i></a></li>
                            @else
                                <li><a href="javascript:void(0)"> <i class="fal fa-star"></i></a></li>
                            @endif
                        @endfor
                    </ul>
                    <p>{{ $course->reviewsAvg() }} {{ __('frontend.rating') }}</p>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="course__review-details grey-bg">
                    <h5>{{ __('frontend.detaild_reatings') }}</h5>
                    <div class="course__review-content mb-20">
                        <div class="course__review-item d-flex align-items-center justify-content-between">
                            <div class="course__review-text">
                                <span>{{ __('frontend.5_star') }}</span>
                            </div>
                            <div class="course__review-progress">
                                <div class="single-progress" data-width="{{ $course->reviewsFiveStarPercentage() }}%">
                                </div>
                            </div>
                            <div class="course__review-percent">
                                <h5>{{ $course->reviewsFiveStarPercentage() }}{{ __('frontend.%') }}</h5>
                            </div>
                        </div>
                        <div class="course__review-item d-flex align-items-center justify-content-between">
                            <div class="course__review-text">
                                <span>{{ __('frontend.4_star') }}</span>
                            </div>
                            <div class="course__review-progress">
                                <div class="single-progress" data-width="{{ $course->reviewsFourStarPercentage() }}%">
                                </div>
                            </div>
                            <div class="course__review-percent">
                                <h5>{{ $course->reviewsFourStarPercentage() }}{{ __('frontend.%') }}</h5>
                            </div>
                        </div>
                        <div class="course__review-item d-flex align-items-center justify-content-between">
                            <div class="course__review-text">
                                <span>{{ __('frontend.3_star') }}</span>
                            </div>
                            <div class="course__review-progress">
                                <div class="single-progress" data-width="{{ $course->reviewsThreeStarPercentage() }}%">
                                </div>
                            </div>
                            <div class="course__review-percent">
                                <h5>{{ $course->reviewsThreeStarPercentage() }}{{ __('frontend.%') }}</h5>
                            </div>
                        </div>
                        <div class="course__review-item d-flex align-items-center justify-content-between">
                            <div class="course__review-text">
                                <span>{{ __('frontend.2_star') }}</span>
                            </div>
                            <div class="course__review-progress">
                                <div class="single-progress" data-width="{{ $course->reviewsTwoStarPercentage() }}%">
                                </div>
                            </div>
                            <div class="course__review-percent">
                                <h5>{{ $course->reviewsTwoStarPercentage() }}{{ __('frontend.%') }}</h5>
                            </div>
                        </div>
                        <div class="course__review-item d-flex align-items-center justify-content-between">
                            <div class="course__review-text">
                                <span>{{ __('frontend.1_star') }}</span>
                            </div>
                            <div class="course__review-progress">
                                <div class="single-progress" data-width="{{ $course->reviewsOneStarPercentage() }}%">
                                </div>
                            </div>
                            <div class="course__review-percent">
                                <h5>{{ $course->reviewsOneStarPercentage() }}{{ __('frontend.%') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course__comment mb-75">
        <h3>{{ $course->reviews->where('status', 'approved')->count() }} {{ __('frontend.reviews') }}</h3>
        <ul>
            @if ($course->reviews->where('status', 'approved')->count() > 0)
                @foreach ($course->reviews->where('status', 'approved') as $review)
                    <li>
                        <div class="course__comment-box ">
                            <div class="course__comment-thumb float-start">
                                <img src="{{ asset($review->user->image) }}" alt="">
                            </div>
                            <div class="course__comment-content">
                                <div class="course__comment-wrapper ml-70 fix">
                                    <div class="course__comment-info float-start">
                                        <h4>{{ $review->user->full_name }}</h4>
                                        <span>
                                            {{ $review->created_at->format('d M, Y') }}
                                        </span>
                                    </div>
                                    <div class="course__comment-rating float-start float-sm-end">
                                        <ul>
                                            @if ($review->rating)
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <li><a href="javascript:void(0)"><i class="icon_star"></i></a></li>
                                                @endfor
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="course__comment-text ml-70">
                                    <p>
                                        {{ $review->body }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            @endif
        </ul>
    </div>

    @if ($from_page != 'course_details' && $from_page == 'learning_dashboard')
        <div class="course__form">
            <h3>Write a Review</h3>
            <div class="course__form-inner">
                <form action="{{ route('review.store') }}" method="GET">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <div class="row">
                        <div class="col-xxl-6">
                            <div class="course__form-input">
                                <input type="text" name="title" placeholder="Review Title">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="course__form-input">
                                <input type="number" name="rating" required placeholder="5" max="5"
                                    min="0">
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div class="course__form-input">
                                <div class="course__form-rating">
                                </div>
                                <textarea name="body" placeholder="Review Summary"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="course__form-btn mt-10 mb-55">
                                <button type="submit" class="e-btn">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
