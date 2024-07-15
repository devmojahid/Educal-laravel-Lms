@extends('frontend.layouts.master')
@section('title', 'Book Details Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Book Details'])
    <section class="tp-shop-grid-area pt-100">
        <div class="container">
            @if (isset($search))
                <div class="course__top-search mb-50">
                    <h3 class="course__top-search-title">{{ __('frontend.search_result_for') }}:
                        <span>{{ $search }}</span>
                    </h3>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-0">
                    @include('frontend.pages.book.book-sidebar')
                </div>
                <div class="col-lg-9 order-1 order-lg-1">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="tp-shop-grid-sidebar-left d-flex align-items-center mb-20">
                                <div class="tp-course-grid-sidebar-tab tp-tab">
                                    <ul class="nav nav-tabs" id="filterTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.66667 1H1V5.66667H5.66667V1Z" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12.9997 1H8.33301V5.66667H12.9997V1Z" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M12.9997 8.33337H8.33301V13H12.9997V8.33337Z"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.66667 8.33337H1V13H5.66667V8.33337Z" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile" type="button" role="tab"
                                                aria-controls="profile" aria-selected="false" tabindex="-1">
                                                <svg width="14" height="14" viewBox="0 0 16 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 7.11108H1" stroke="currentColor" stroke-width="1"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 1H1" stroke="currentColor" stroke-width="1"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 13.2222H1" stroke="currentColor" stroke-width="1"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div
                                class="tp-shop-grid-sidebar-right d-flex justify-content-start justify-content-lg-end mb-20">
                                <div
                                    class="tp-course-grid-select tp-course-grid-sidebar-select tpd-select tp_book_filter_sortby">
                                    <select class="wide" style="display: none;">
                                        <option value="newest">Short by: Latest</option>
                                        <option value="oldest">Short by: Oldest</option>
                                        <option value="expensive">Short by: Price High To Low</option>
                                        <option value="cheap"> Short by: Price Low To High </option>
                                        <option value="free"> Short by: Free </option>
                                    </select>
                                    <div class="nice-select wide" tabindex="0"><span class="current">Short by:
                                            Latest</span>
                                        <ul class="list">
                                            <li data-value="newest" class="option selected">Short by: Latest</li>
                                            <li data-value="oldest" class="option">Short by: Oldest</li>
                                            <li data-value="expensive" class="option">Short by: Price High To Low</li>
                                            <li data-value="cheap" class="option">Short by: Price Low To High</li>
                                            <li data-value="free" class="option">Short by: Free</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="book_data_show">
                                @include('frontend.pages.book.single-book-in-grid')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    @forelse ($books as $item)
                                        <div class="tp-shop-list-product-item d-flex mb-10">
                                            <div class="tp-shop-list-product-thumb p-relative">
                                                <a href="{{ route('books.details', $item->slug) }}"><img
                                                        src="{{ asset($item->image) }}" alt=""></a>
                                            </div>
                                            <div class="tp-shop-list-product-content p-relative">
                                                <div class="tp-shop-product-tag">
                                                    @if ($item->categories->count() > 0)
                                                        @foreach ($item->categories as $category)
                                                            <span>{{ $category->title }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <h4 class="tp-shop-product-title"><a
                                                        href="{{ route('books.details', $item->slug) }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </h4>
                                                <p>{{ Str::limit(strip_tags($item->description), 100, ' ') }}</p>
                                                <div class="tp-shop-product-price">
                                                    <span>{{ getBookPrice($item) }}</span>
                                                </div>
                                                <form action="{{ route('add.to.cart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="item_type" value="book">
                                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                    <input class="tp-cart-input" type="hidden" value="1"
                                                        min="1" name="quantity">
                                                    <div class="tp-shop-list-product-btn">
                                                        <button>Add to cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger">No Books Found</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-event-inner-pagination pb-120">
                        <div class="tp-dashboard-pagination pt-20">
                            <div class="tp-pagination shop">
                                <nav>
                                    {{ $books->links('pagination::books-pagination') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            "use strict";

            let startLoader = () => {
                $(".flipping").removeClass("d-none");
            }
            let stopLoader = () => {
                $(".flipping").addClass("d-none");
            }
            //

            $(".tp_book_filter_sortby select").on('change', function() {
                let sortBy = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set('sortBy', sortBy);
                history.pushState(null, null, url);

                $.ajax({
                    url: "{{ route('book.filter') }}",
                    type: "GET",
                    data: {
                        sortBy: sortBy
                    },
                    daraType: "JSON",
                    beforeSend: function() {
                        // startLoader();
                    },
                    success: function(data) {
                        $("#book_data_show").html(data);
                    },
                    complete: function() {
                        // stopLoader();
                    },
                    error: function(error) {
                        // Toast.fire({
                        //     icon: 'error',
                        //     title: 'Something went wrong!'
                        // })
                    }
                });
            });

            // just one check box select
            $("input[type='checkbox']").on('click', function() {
                $("input[type='checkbox']").not(this).prop("checked", false);
            });

            // category filter
            $(".course__sidebar-check").on("click", function() {
                var url = "{{ route('course.filter') }}";
                var category = [];
                var language = [];
                var price = [];
                var level = [];
                $.each($("input[name='category']:checked"), function() {
                    category.push($(this).val());
                });
                $.each($("input[name='language']:checked"), function() {
                    language.push($(this).val());
                });
                $.each($("input[name='price']:checked"), function() {
                    price.push($(this).val());
                });
                $.each($("input[name='level']:checked"), function() {
                    level.push($(this).val());
                });
                $.ajax({
                    url: url,
                    type: "GET",
                    daraType: "JSON",
                    data: {
                        category: category,
                        language: language,
                        price: price,
                        level: level
                    },
                    beforeSend: function() {
                        startLoader();
                    },
                    success: function(data) {
                        $("#course_data_show").html(data);
                    },
                    complete: function() {
                        stopLoader();
                    },
                    error: function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                        })
                    }
                });
            });
        });
    </script>
@endpush
