@extends('frontend.layouts.master')
@section('title', 'Dashboard Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Dashboard'])
    <section class="error__area pt-200 pb-200">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    @include('frontend.student.dashboard-menu')
                </div>
                <div class="col-xl-8">
                    <div class="tp-dashboard-body My Profile ">
                        <h3 class="dashboard-title mb-20">{{ __('frontend.purchased_product') }}</h3>
                        <div class="tp-dashboard-nav mb-30">
                            <ul>
                                <li><a class="@if (url()->current() == route('dashboard.enrolled.book')) is-active @endif"
                                        href="{{ route('dashboard.enrolled.book') }}">{{ __('frontend.all_items') }}</a>
                                </li>
                                <li><a class="@if (url()->current() == route('dashboard.download.item')) is-active @endif"
                                        href="{{ route('dashboard.download.item') }}">{{ __('frontend.downloadable_items') }}</a>
                                </li>
                                <li><a class="@if (url()->current() == route('dashboard.physical.item')) is-active @endif"
                                        href="{{ route('dashboard.physical.item') }}">{{ __('frontend.physical_items') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            @forelse ($enroledsBooksItems as $item)
                                <div class="col-lg-6">
                                    <div class="tp-shop-product-item text-center mb-50">
                                        <div class="tp-shop-product-thumb p-relative">
                                            <a href="{{ route('books.details', $item->item->slug) }}">
                                                <img src="{{ asset($item->item->image) }}" alt="{{ $item->item->title }}">
                                            </a>
                                        </div>
                                        <div class="tp-shop-product-content">
                                            <div class="tp-shop-product-tag">
                                                @if ($item->item->categories->count() > 0)
                                                    @foreach ($item->item->categories as $category)
                                                        <span>{{ $category->title }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <h4 class="tp-shop-product-title"><a
                                                    href="{{ route('books.details', $item->item->slug) }}">
                                                    {{ Str::limit($item->item->title, 20, '') }}
                                                </a></h4>
                                            <div class="tp-shop-product-price">
                                                @if ($item->item->discount_price != null)
                                                    <span>{{ currency_symbol($item->item->discount_price) }}</span>
                                                    <del>
                                                        <span
                                                            class="tp-shop-product-price-old">{{ currency_symbol($item->item->price) }}</span>
                                                    </del>
                                                @else
                                                    <span>{{ currency_symbol($item->item->price) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="course__more d-flex justify-content-between align-items-center">
                                            <div class="course__btn">
                                                @if (!empty($item_status) && $item_status != 'downloadable')
                                                    <div class="d-flex">
                                                        <div class="me-2">
                                                            <span>{{ __('dashboard.status') }}</span>
                                                        </div>
                                                        <div>
                                                            @if ($item->status == 'complete')
                                                                <span class="badge bg-primary">
                                                                    {{ __('dashboard.complete') }}
                                                                </span>
                                                            @elseif($item->status == 'pending')
                                                                <span class="badge bg-warning">
                                                                    {{ __('dashboard.pending') }}
                                                                </span>
                                                            @elseif($item->status == 'enrolled')
                                                                <span class="badge bg-info">
                                                                    {{ __('dashboard.downloadable') }}
                                                                </span>
                                                            @elseif($item->status == 'active')
                                                                <span class="badge bg-success">
                                                                    Shiped
                                                                </span>
                                                            @else
                                                                <span class="badge bg-danger">
                                                                    Canceled
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <a class="e-btn"
                                                        href="{{ route('dashboard.download.file', $item->item->slug) }}">Download</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-danger">
                                        {{ __('frontend.no_book_found') }}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
