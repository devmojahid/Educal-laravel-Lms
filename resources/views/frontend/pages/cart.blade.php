@extends('frontend.layouts.master')
@section('title', 'Cart Page Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'Cart Page'])
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-content table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            @if ($item->item_type == 'App\Models\Book')
                                                <a href="{{ route('books.details', $item->item->slug) }}"><img
                                                        src="{{ asset($item->item->image) }}" alt=""></a>
                                            @elseif($item->item_type == 'App\Models\Course')
                                                <a href="{{ route('course.details', $item->item->slug) }}"><img
                                                        src="{{ asset($item->item->image) }}" alt=""></a>
                                            @endif
                                        </td>
                                        <td class="product-name">
                                            @if ($item->item_type == 'App\Models\Book')
                                                <a href="{{ route('books.details', $item->item->slug) }}">
                                                    {{ $item->item->title }}
                                                </a>
                                            @elseif($item->item_type == 'App\Models\Course')
                                                <a href="{{ route('course.details', $item->item->slug) }}">
                                                    {{ $item->item->title }}
                                                </a>
                                            @endif
                                        </td>
                                        <td class="product-price">
                                            <span class="amount" id="peritemAmmount">
                                                @if ($item->item_type == 'App\Models\Book')
                                                    @if (floatval($item->item->discount_price) != 0)
                                                        {{ currency_symbol($item->item->discount_price) }}
                                                    @else
                                                        {{ currency_symbol($item->item->price) }}
                                                    @endif
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
                                        <td class="product-quantity text-center">
                                            <div class="product-quantity mt-10 mb-10">
                                                <div class="product-quantity-form">
                                                    <a href="{{ route('cart.decrement', $item->item->id) }}"><i
                                                            class="far fa-minus"></i></a>
                                                    <input class="cart-input" type="text" id="quantity"
                                                        value="{{ $item->quantity }}" readonly />
                                                    <a href="{{ route('cart.increment', $item->item->id) }}"><i
                                                            class="far fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount" id="productSubtotal">
                                                @if ($item->item_type == 'App\Models\Book')
                                                    @if (floatval($item->item->discount_price) != 0)
                                                        {{ currency_symbol($item->item->discount_price * $item->quantity) }}
                                                    @else
                                                        {{ currency_symbol($item->item->price * $item->quantity) }}
                                                    @endif
                                                @elseif($item->item_type == 'App\Models\Course')
                                                    @if ($item->item->discount_price != null)
                                                        {{ currency_symbol($item->item->discount_price * $item->quantity) }}
                                                    @elseif($item->item->price != null)
                                                        {{ currency_symbol($item->item->price * $item->quantity) }}
                                                    @else
                                                        {{ __('dashboard.free') }}
                                                    @endif
                                                @endif

                                            </span></td>
                                        <td class="product-remove"><a href="{{ route('cart.remove', $item->item->id) }}"><i
                                                    class="fa fa-times"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <h3>{{ __('dashboard.no_data') }}</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">

                                <div class="coupon d-sm-flex align-items-center" id="couponField">
                                    <input id="coupon_code" class="input-text" name="code" placeholder="Coupon code"
                                        type="text">
                                    <button class="e-btn" name="apply_coupon" id="apply_coupon" type="submit">Apply
                                        coupon</button>
                                </div>
                                <div class="couponApplid"></div>

                                <div class="coupon2">
                                    <a href="{{ route('cart.clear') }}" class="e-btn" name="update_cart"
                                        type="submit">Clear Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Subtotal <span id="subtotal">
                                            @if ($cartTotal)
                                                {{ currency_symbol($cartTotal) }}
                                            @else
                                                {{ currency_symbol(0) }}
                                            @endif
                                        </span></li>
                                    <li>Total <span id="total">
                                            @if ($cartTotal)
                                                {{ currency_symbol($cartTotal) }}
                                            @else
                                                {{ currency_symbol(0) }}
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                                <a class="e-btn e-btn-border" href="{{ route('checkout') }}">Proceed to checkout</a>
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
        //coupon code apply 
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            $currency_symbol = "{{ currency_symbol_only() }}";
            $(document).on("click", "#apply_coupon", function() {
                var coupon_code = $("#coupon_code").val();
                var subtotal = $("#subtotal").text();
                var total = $("#total").text();
                $.ajax({
                    url: "{{ route('cart.coupon') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "coupon_code": coupon_code,
                        "subtotal": subtotal,
                        "total": total,
                    },
                    success: function(response) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success
                        });
                        $("#total").html(`
                  ${$currency_symbol} ${response.total}
               `);
                        $(".couponApplid").html(`
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     ${response.success}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
               `);
                        $("#couponField").addClass("d-none");
                        $("#couponField").removeClass("d-sm-flex");
                    },
                    error: function(err) {
                        Toast.fire({
                            icon: 'error',
                            title: err.responseJSON.error
                        });
                    }
                })
            })
        })
    </script>
@endpush
