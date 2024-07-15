@extends('frontend.layouts.master')
@section('title', 'Checkout Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Checkout'])
    <!-- checkout-area start -->
    @if (Session::has('coupon'))
        @php
            $total = currency_symbol(
                Session::get('coupon')['total'] ? Session::get('coupon')['total'] - $cartTotal : $cartTotal,
            );
        @endphp
    @else
        @php
            $total = currency_symbol($cartTotal);
        @endphp
    @endif

    @if (Session::has('totalAmount'))
        @php
            Session::forget('totalAmount');
        @endphp
    @endif


    <section class="checkout-area pb-70 pt-100">
        <div class="container">
            @include('frontend.layouts.message')
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" name="first_name" value="{{ auth()->user()->first_name }}"
                                            @if (auth()->user()->first_name != null) readonly @endif />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" value="{{ auth()->user()->last_name }}"
                                            @if (auth()->user()->last_name != null) readonly @endif />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" placeholder="Street address"
                                            value="{{ auth()->user()->address }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city" placeholder="Town / City"
                                            value="{{ auth()->user()->city }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" name="country" placeholder="Country"
                                            value="{{ auth()->user()->country }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" name="postal_code" placeholder="Postcode / Zip"
                                            value="{{ auth()->user()->postal_code }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" placeholder="Enter Your Email"
                                            value="{{ auth()->user()->email }}"
                                            @if (auth()->user()->email != null) readonly @endif />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" placeholder="Enter Your Phone"
                                            value="{{ auth()->user()->phone }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">

                                                    {{-- trim word  --}}
                                                    {{ Str::limit($item->item->title, 30, '') }} <strong
                                                        class="product-quantity"> ×
                                                        {{ $item->quantity }}</strong>
                                                </td>
                                                <td class="product-total ">
                                                    <span class="amount ml-4">
                                                        {{-- @if ($item->course->discount_price != null)
                                                            {{ currency_symbol($item->course->discount_price * $item->quantity) }}
                                                        @elseif($item->course->price != null)
                                                            {{ currency_symbol($item->course->price * $item->quantity) }}
                                                        @else
                                                            {{ __('dashboard.free') }}
                                                        @endif --}}
                                                        @if ($item->item_type == 'App\Models\Book')
                                                            {{ currency_symbol($item->item->price) }}
                                                        @elseif($item->item_type == 'App\Models\Course')
                                                            @if ($item->item->discount_price != null)
                                                                {{ currency_symbol($item->item->discount_price) }}
                                                            @elseif($item->item->price != null)
                                                                {{ currency_symbol($item->item->price) }}
                                                            @else
                                                                {{ __('dashboard.free') }}
                                                            @endif
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <h3>{{ __('dashboard.no_data') }}</h3>
                                                </td>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">
                                                    @if ($cartTotal)
                                                        {{ currency_symbol($cartTotal) }}
                                                    @else
                                                        {{ currency_symbol(0) }}
                                                    @endif
                                                </span></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td>
                                                @if (session()->has('coupon'))
                                                    <strong>
                                                        <span class="amount">
                                                            {{ currency_symbol_only() }}
                                                            {{ numberFormat(Session::get('coupon')['total']) }}
                                                            {{ Session::put('totalAmount', Session::get('coupon')['total']) }}
                                                        </span>
                                                    </strong>
                                                @else
                                                    <strong>
                                                        <span class="amount">
                                                            {{ currency_symbol($cartTotal) }}
                                                            {{ Session::put('totalAmount', $cartTotal) }}
                                                        </span>
                                                    </strong>
                                                @endif
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="accordion" id="checkoutAccordion">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="stipeThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#stipe" aria-expanded="false"
                                                aria-controls="stipe">
                                                Stipe
                                            </button>
                                        </h2>
                                        <div id="stipe" class="accordion-collapse collapse" aria-labelledby="stipeThree"
                                            data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="paymentMethod"
                                                        value="stripe" id="stripeMethod" checked>
                                                    <label class="form-check-label" for="stripeMethod">
                                                        Select Stripe Payment
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="e-btn e-btn-border">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        "use strict";
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        $(document).ready(function() {
            var totalAmmount = "{{ $total }}";
            var numericValue = parseFloat(totalAmmount.replace(/[^0-9.-]+/g, ""));

            if (numericValue == 0 || numericValue == null) {
                // input hidden append paymentMethod free 
                let payment_method_input =
                    `<input type="hidden" name="paymentMethod" value="manual_payment" id="freeMethod">`;
                $(".payment-method").append(payment_method_input);
            }
        });
    </script>
@endpush
