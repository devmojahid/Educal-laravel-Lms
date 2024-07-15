@extends("frontend.layouts.master")
@section("title","Your Order Successfull")
@section("content")
@include("frontend.layouts.breadcrumb",["title"=>"Your Order Successfull"])

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
                    <div>Country     : {{ $order->user->country }}</div>
                    <div>Address     : {{ $order->user->address }}</div>
                    <div>Email       : {{ $order->user->email }}</div>
                    <div>Phone       : {{ $order->user->phone }}</div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Image</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                   @if($order->event != null)
                    <tr>
                            <td class="left strong">{{ $order->event->title }}</td>
                            <td class="left">
                                <img src="{{ asset($order->event->image) }}" alt="{{ $order->event->title }}" width="100">
                            </td>
                            <td class="right">{{ $order->event->ticket_discount_price ?? $order->event->ticket_price }}</td>
                    </tr>
                    @endif
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
                                    <strong>{{ $order->event->ticket_discount_price ?? $order->event->ticket_price  }}</strong>
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