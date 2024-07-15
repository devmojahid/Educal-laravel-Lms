@extends('frontend.layouts.master')
@section('title', 'Order Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Order'])
    <section class="error__area pt-200 pb-200">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    @include('frontend.student.dashboard-menu')
                </div>
                <div class="col-xl-8">
                    <div class="tp-dashboard-body Dashboard">
                        <div class="tp-dashborad-title-wrapper d-flex justify-content-between align-items-center">
                            <h3 class="dashboard-title mb-10 ">{{ __('frontend.order_history') }}</h3>
                        </div>
                        <div class="tp-dashboard-my-course">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('frontend.course_name') }} </th>
                                        <th scope="col">{{ __('dashboard.image') }}</th>
                                        <th scope="col">price</th>
                                        <th scope="col">{{ __('dashboard.status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order as $orderItem)
                                        @foreach ($orderItem->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->item->title }}</td>
                                                <td>
                                                    <img src="{{ asset($item->item->image) }}"
                                                        alt="{{ $item->item->title }}" width="50">
                                                </td>
                                                <td>
                                                    @if (
                                                        $item->item->price == null &&
                                                            $item->item->discount_price == null &&
                                                            empty($item->item->discount_price) &&
                                                            empty($item->item->price))
                                                        {{ __('frontend.free') }}
                                                    @else
                                                        <div class="course__video-price">
                                                            @if ($item->item->discount_price != null)
                                                                {{ currency_symbol($item->item->price) }}
                                                            @else
                                                                {{ currency_symbol($item->item->price) }}
                                                            @endif
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->item_type == 'App\Models\Course')
                                                        @if ($orderItem->status == 'pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ __('dashboard.pending') }}</span>
                                                        @elseif($orderItem->status == 'approved')
                                                            <span
                                                                class="badge bg-success">{{ __('dashboard.approve') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger">{{ __('dashboard.reject') }}</span>
                                                        @endif
                                                    @else
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
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                No Order Found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
