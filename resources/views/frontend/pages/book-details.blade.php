<!-- product details area start -->
@extends('frontend.layouts.master')
@section('title', 'Book Details Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Book Details'])
    <section class="tp-product-details-area pt-100">
        @php
            $specifications = json_decode($book->specifications);

        @endphp
        <div class="tp-product-details-top pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tp-product-details-thumb">
                            <img src="{{ $book->image }}" alt="">
                        </div>
                    </div> <!-- col end -->
                    <div class="col-lg-6">
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>
                                    @foreach ($book->categories as $category)
                                        <a href="{{ route('books.category', $category->slug) }}">{{ $category->title }}</a>
                                    @endforeach
                                </span>
                            </div>
                            <h3 class="tp-product-details-title">{{ $book->title }}</h3>

                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">

                                <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                    <div class="tp-product-details-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($book->reviewsAvg() >= $i)
                                                <span><i class="icon_star"></i></span>
                                            @else
                                                <span> <i class="fal fa-star"></i></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="tp-product-details-reviews">
                                        <span>({{ $book->reviewsCount() }} Reviews)</span>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($book->short_description))
                                <p>{{ $book->short_description }}</p>
                            @endif

                            <!-- price -->
                            <div class="tp-product-details-price-wrapper mb-20">

                                @if (floatval($book->discount_price) != 0)
                                    <span class="tp-product-details-price new-price">
                                        {{ currency_symbol($book->discount_price) }}
                                    </span>
                                    <span class="tp-product-details-price old-price">
                                        {{ currency_symbol($book->price) }}
                                    </span>
                                @else
                                    <span class="tp-product-details-price new-price">
                                        {{ currency_symbol($book->price) }}
                                    </span>
                                @endif
                            </div>
                            <!-- actions -->
                            <div class="tp-product-details-action-wrapper">
                                <h3 class="tp-product-details-action-title">Quantity</h3>
                                <form action="{{ route('add.to.cart') }}" method="POST">
                                    @csrf
                                    <div class="tp-product-details-action-item-wrapper d-flex align-items-center">

                                        <div class="tp-product-details-quantity">
                                            <div class="tp-product-quantity mb-15 mr-15">
                                                <input class="tp-cart-input" type="number" value="1" min="1"
                                                    name="quantity">
                                            </div>
                                        </div>
                                        <div class="tp-product-details-add-to-cart mb-15 w-100">
                                            <input type="hidden" name="item_type" value="book">
                                            <input type="hidden" name="item_id" value="{{ $book->id }}">
                                            <button type="submit" class="tp-product-details-buy-now-btn w-100">Add To
                                                Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tp-product-details-query">
                                @empty(!$book->language)
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Book Language: </span>
                                        <p>
                                            {{ $book->language }}
                                        </p>
                                    </div>
                                @endempty

                                @empty(!$book->book_pages)
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Book Pages: </span>
                                        <p>
                                            {{ $book->book_pages }}
                                        </p>
                                    </div>
                                @endempty

                                @empty(!$book->author_id)
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Author: </span>
                                        <p>
                                            {{ $book->author->full_name }}
                                        </p>
                                    </div>
                                @endempty

                                @if ($book->product_type == null)
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Product Type: </span>
                                        <p>
                                            Physical
                                        </p>
                                    </div>
                                @elseif ($book->product_type == 'downloadable')
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Product Type: </span>
                                        <p>
                                            Downloadable
                                        </p>
                                    </div>
                                @else
                                    <div class="tp-product-details-query-item d-flex align-items-center">
                                        <span> Product Type: </span>
                                        <p>
                                            Physical
                                        </p>
                                    </div>
                                @endif


                            </div>
                            <div class="tp-product-details-social">
                                <span>Share: </span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a
                                    href="https://twitter.com/intent/tweet?text={{ urlencode($book->title) }}&url={{ urlencode(Request::url()) }}"><i
                                        class="fab fa-twitter"></i></a>
                                <a
                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(Request::url()) }}"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a
                                    href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(Request::url()) }}&media={{ urlencode($book->image) }}&description={{ urlencode($book->title) }}"><i
                                        class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-product-details-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-product-details-tab-nav tp-tab">
                            <nav>
                                <div class="nav nav-tabs justify-content-center p-relative tp-product-tab"
                                    id="navPresentationTab" role="tablist">
                                    @empty(!$book->description)
                                        <button class="nav-link @if (!empty($book->description) && empty($specifications)) active @endif"
                                            id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
                                            type="button" role="tab" aria-controls="nav-description"
                                            aria-selected="true">Description</button>
                                    @endempty
                                    @empty(!$specifications)
                                        <button class="nav-link @if (!empty($specifications)) active @endif"
                                            id="nav-addInfo-tab" data-bs-toggle="tab" data-bs-target="#nav-addInfo"
                                            type="button" role="tab" aria-controls="nav-addInfo"
                                            aria-selected="false">Additional
                                            information
                                        </button>
                                    @endempty
                                    <button class="nav-link @if (empty($book->description) && empty($specifications)) active @endif"
                                        id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button"
                                        role="tab" aria-controls="nav-review" aria-selected="false">Reviews
                                        ({{ $book->reviewsCount() }})</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="navPresentationTabContent">
                                @empty(!$book->description)
                                    <div class="tab-pane fade @if (!empty($book->description) && empty($specifications)) show active @endif"
                                        id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab"
                                        tabindex="0">
                                        <div class="tp-product-details-additional-p">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    {{ sanitizeInput($book->description) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endempty
                                @empty(!$specifications)
                                    <div class="tab-pane fade @if (!empty($specifications)) show active @endif"
                                        id="nav-addInfo" role="tabpanel" aria-labelledby="nav-addInfo-tab" tabindex="0">
                                        <div class="tp-product-details-additional-info ">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-10">
                                                    <table>
                                                        <tbody>
                                                            @forelse ($specifications as $key => $specification)
                                                                <tr>
                                                                    <td>
                                                                        {{ $specification->key }}
                                                                    </td>
                                                                    <td>{{ $specification->value }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="2">No specifications found</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endempty
                                <div class="tab-pane fade @if (empty($book->description) && empty($specifications)) show active @endif"
                                    id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                    <div class="tp-product-details-review-wrapper pt-60">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="tp-product-details-review-statics">
                                                    <!-- number -->
                                                    <div class="tp-product-details-review-number d-inline-block mb-50">
                                                        <h3 class="tp-product-details-review-number-title">Customer
                                                            reviews
                                                        </h3>
                                                        <div
                                                            class="tp-product-details-review-summery d-flex align-items-center">
                                                            <div class="tp-product-details-review-summery-value">
                                                                <span>{{ $book->reviewsAvg() }}</span>
                                                            </div>
                                                            <div
                                                                class="tp-product-details-review-summery-rating d-flex align-items-center">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($book->reviewsAvg() >= $i)
                                                                        <span><i class="icon_star"></i></span>
                                                                    @else
                                                                        <span> <i class="fal fa-star"></i></span>
                                                                    @endif
                                                                @endfor
                                                                <p>({{ $book->reviewsCount() }} Reviews)</p>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-details-review-rating-list">
                                                            <!-- single item -->
                                                            <div
                                                                class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>{{ __('frontend.5_star') }}</span>
                                                                <div class="tp-product-details-review-rating-bar">
                                                                    <span
                                                                        class="tp-product-details-review-rating-bar-inner"
                                                                        data-width="{{ $book->reviewsFiveStarPercentage() }}%"></span>
                                                                </div>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    <span>{{ $book->reviewsFiveStarPercentage() }}{{ __('frontend.%') }}</span>
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div
                                                                class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>{{ __('frontend.4_star') }}</span>
                                                                <div class="tp-product-details-review-rating-bar">
                                                                    <span
                                                                        class="tp-product-details-review-rating-bar-inner"
                                                                        data-width="{{ $book->reviewsFourStarPercentage() }}%"></span>
                                                                </div>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    <span>{{ $book->reviewsFourStarPercentage() }}{{ __('frontend.%') }}</span>
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div
                                                                class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>{{ __('frontend.3_star') }}</span>
                                                                <div class="tp-product-details-review-rating-bar">
                                                                    <span
                                                                        class="tp-product-details-review-rating-bar-inner"
                                                                        data-width="{{ $book->reviewsThreeStarPercentage() }}%"></span>
                                                                </div>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    <span>{{ $book->reviewsThreeStarPercentage() }}{{ __('frontend.%') }}</span>
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div
                                                                class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>{{ __('frontend.2_star') }}</span>
                                                                <div class="tp-product-details-review-rating-bar">
                                                                    <span
                                                                        class="tp-product-details-review-rating-bar-inner"
                                                                        data-width="{{ $book->reviewsTwoStarPercentage() }}%"></span>
                                                                </div>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    <span>{{ $book->reviewsTwoStarPercentage() }}{{ __('frontend.%') }}</span>
                                                                </div>
                                                            </div> <!-- end single item -->

                                                            <!-- single item -->
                                                            <div
                                                                class="tp-product-details-review-rating-item d-flex align-items-center">
                                                                <span>{{ __('frontend.1_star') }}</span>
                                                                <div class="tp-product-details-review-rating-bar">
                                                                    <span
                                                                        class="tp-product-details-review-rating-bar-inner"
                                                                        data-width="{{ $book->reviewsOneStarPercentage() }}%"></span>
                                                                </div>
                                                                <div class="tp-product-details-review-rating-percent">
                                                                    <span>{{ $book->reviewsOneStarPercentage() }}{{ __('frontend.%') }}</span>
                                                                </div>
                                                            </div> <!-- end single item -->
                                                        </div>
                                                    </div>

                                                    <!-- reviews -->
                                                    @if ($book->reviews->where('status', 'approved')->count() > 0)
                                                        <div class="tp-product-details-review-list pr-110">
                                                            <h3 class="tp-product-details-review-title">
                                                                Rating & Review
                                                            </h3>
                                                            @foreach ($book->reviews->where('status', 'approved') as $review)
                                                                <div
                                                                    class="tp-product-details-review-avater d-flex align-items-start">
                                                                    <div class="tp-product-details-review-avater-thumb">
                                                                        <a href="javascript:void(0)">
                                                                            <img src="{{ asset($review->user->image) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="tp-product-details-review-avater-content">
                                                                        <div
                                                                            class="tp-product-details-review-avater-rating d-flex align-items-center">

                                                                            @if ($review->rating)
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    @if ($review->rating >= $i)
                                                                                        <span><i
                                                                                                class="icon_star"></i></span>
                                                                                    @else
                                                                                        <span> <i
                                                                                                class="fal fa-star"></i></span>
                                                                                    @endif
                                                                                @endfor
                                                                            @endif
                                                                        </div>
                                                                        <h3 class="tp-product-details-review-avater-title">
                                                                            {{ $review->user->full_name }}
                                                                        </h3>
                                                                        <span
                                                                            class="tp-product-details-review-avater-meta">{{ $review->created_at->format('d M, Y') }}</span>

                                                                        <div
                                                                            class="tp-product-details-review-avater-comment">
                                                                            <p>{{ $review->body }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="tp-product-details-review-form">
                                                    <h3 class="tp-product-details-review-form-title">
                                                        Review this product
                                                    </h3>
                                                    <p>Your email address will not be published. Required fields are
                                                        marked
                                                        *</p>
                                                    <form action="{{ route('book.review.store') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="book_id"
                                                            value="{{ $book->id }}">

                                                        <div class="tp-product-details-review-input-wrapper mt-30">
                                                            <div class="tp-product-details-review-input-box">
                                                                <div class="tp-product-details-review-input">
                                                                    <textarea id="body" name="body" placeholder="Write your review here..."></textarea>
                                                                    @error('body')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="tp-product-details-review-input-title">
                                                                    <label for="body">Your Message</label>
                                                                </div>
                                                            </div>
                                                            <div class="tp-product-details-review-input-box">
                                                                <div class="tp-product-details-review-input">
                                                                    <input name="title" id="title" type="text"
                                                                        class="mb-2" placeholder="Title Hear ">
                                                                    @error('title')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="tp-product-details-review-input-title">
                                                                    <label for="title">Your Titile</label>
                                                                </div>
                                                            </div>
                                                            <div class="tp-product-details-review-input-box">
                                                                <div class="tp-product-details-review-input">
                                                                    <input name="rating" id="rating" type="number"
                                                                        class="mb-2" min="1" max="5"
                                                                        placeholder="Rating Hear">
                                                                    @error('rating')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="tp-product-details-review-input-title">
                                                                    <label for="rating">Your Rating</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-details-review-btn-wrapper">
                                                            <button class="tp-product-details-review-btn">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product details area end -->


    <!-- product details related start -->
    @if ($relatedBooks->count() > 0)
        <section class="tp-product-related-area pt-80 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-product-related-heading text-center mb-30">
                            <h4 class="tp-product-related-title">
                                You may also like
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($relatedBooks as $relatedBook)
                        <div class="col-lg-3 col-sm-6">
                            <div class="tp-shop-product-item text-center mb-50">
                                <div class="tp-shop-product-thumb p-relative">
                                    <a href="{{ route('books.details', $relatedBook->slug) }}"><img
                                            src="{{ $relatedBook->image }}" alt=""></a>
                                    <form action="{{ route('add.to.cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_type" value="book">
                                        <input type="hidden" name="item_id" value="{{ $relatedBook->id }}">
                                        <input class="tp-cart-input" type="hidden" value="1" min="1"
                                            name="quantity">
                                        <div class="tp-shop-product-thumb-btn">
                                            <button>Add to cart</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tp-shop-product-content">
                                    <div class="tp-shop-product-tag">
                                        @if ($relatedBook->categories->count() > 0)
                                            @foreach ($relatedBook->categories as $category)
                                                <span>{{ $category->title }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <h4 class="tp-shop-product-title"><a
                                            href="{{ route('books.details', $relatedBook->slug) }}">{{ $relatedBook->title }}</a>
                                    </h4>
                                    <div class="tp-shop-product-price">
                                        <span>
                                            @if (floatval($relatedBook->discount_price) != 0)
                                                <span class="tp-product-details-price new-price">
                                                    {{ currency_symbol($relatedBook->discount_price) }}
                                                </span>
                                                <span class="tp-product-details-price old-price">
                                                    {{ currency_symbol($relatedBook->price) }}
                                                </span>
                                            @else
                                                <span class="tp-product-details-price new-price">
                                                    {{ currency_symbol($relatedBook->price) }}
                                                </span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- product details related end -->
@endsection
