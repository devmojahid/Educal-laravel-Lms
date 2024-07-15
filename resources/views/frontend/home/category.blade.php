<section class="category__area pt-120 pb-70">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xxl-4 col-xl-6 col-lg-6">
                <div class="section__title-wrapper mb-45">
                    <h2 class="section__title">
                        {{ sanitizeJsonInput(getSystemSetting('home_categories', 'category_title')) }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $categories = getSystemSetting('home_categories', 'categories');
            @endphp

            @if (isset($categories) && count($categories) > 0)
                @foreach ($categories as $categoryId)
                    @php
                        $category = App\Models\CourseCategory::find($categoryId);
                    @endphp
                    @if ($category)
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="category__item mb-30 transition-3 d-flex align-items-center">
                                <div class="category__icon mr-30">
                                    @isset($category->svg)
                                        <img src="{{ $category->svg }}" alt="{{ sanitizeJsonInput($category->title) }}">
                                    @endisset
                                </div>
                                <div class="category__content">
                                    <h4 class="category__title"><a
                                            href="{{ route('course.category', $category->slug) }}">{{ sanitizeJsonInput($category->title) }}
                                    </h4></a>
                                    <p>{{ sanitizeJsonInput($category->description) }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>
