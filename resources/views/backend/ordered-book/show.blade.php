@extends('backend.layouts.master')
@section('title', 'Blogs')
@section('content')
    <div class="container mt-65 mb-65">
        <div class="card">
            <div class="card-header"> Invoice <strong>
                    {{ monthDayYear($order->created_at) }}
                </strong>
                <span class="float-right">
                    <strong>Status:</strong> {{ $order->status }} </span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">Order From:</h6>
                        <div>
                            <strong>{{ $order->user->FullName }}</strong>
                        </div>
                        <div>Order Number: {{ $order->order_number }}</div>
                        <div>Country : {{ $order->user->country }}</div>
                        <div>Address : {{ $order->user->address }}</div>
                        <div>Email : {{ $order->user->email }}</div>
                        <div>Phone : {{ $order->user->phone }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Image</th>
                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $key => $orderItem)
                                <tr>
                                    <td class="center">{{ $key + 1 }}</td>
                                    <td class="left strong">{{ $orderItem->item->title }}</td>
                                    <td class="left">
                                        <img src="{{ asset($orderItem->item->image) }}"
                                            alt="{{ $orderItem->item->title }}" width="100">
                                    </td>
                                    <td class="right">
                                        @if ($orderItem->item->discount_price == null)
                                            {{ $orderItem->item->price }}
                                        @else
                                            {{ $orderItem->item->discount_price }}
                                        @endif
                                    </td>
                                    <td class="center">{{ $orderItem->quantity }}</td>
                                    <td class="right">{{ $orderItem->total }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5"></div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>{{ $order->total }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
