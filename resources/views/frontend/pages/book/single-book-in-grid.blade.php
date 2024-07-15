@if ($books->count() >= 0)
    <div class="row">
        @forelse ($books as $item)
            <div class="col-lg-4 col-sm-6">
                <div class="tp-shop-product-item text-center mb-50">
                    <div class="tp-shop-product-thumb p-relative">
                        <a href="{{ route('books.details', $item->slug) }}"><img src="{{ asset($item->image) }}"
                                alt=""></a>
                        <form action="{{ route('add.to.cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_type" value="book">
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <input class="tp-cart-input" type="hidden" value="1" min="1" name="quantity">
                            <div class="tp-shop-product-thumb-btn">
                                <button>Add to cart</button>
                            </div>
                        </form>
                    </div>
                    <div class="tp-shop-product-content">
                        <div class="tp-shop-product-tag">
                            @if ($item->categories->count() > 0)
                                @foreach ($item->categories as $category)
                                    <span>{{ $category->title }}</span>
                                @endforeach
                            @endif
                        </div>
                        <h4 class="tp-shop-product-title"><a href="{{ route('books.details', $item->slug) }}">
                                {{ Str::limit($item->title, 20, '') }}
                            </a>
                        </h4>
                        <div class="tp-shop-product-price">
                            @if (floatval($item->discount_price) != 0)
                                <span class="tp-product-details-price new-price">
                                    {{ currency_symbol($item->discount_price) }}
                                </span>
                                <span class="tp-product-details-price old-price">
                                    {{ currency_symbol($item->price) }}
                                </span>
                            @else
                                <span class="tp-product-details-price new-price">
                                    {{ currency_symbol($item->price) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-lg-12">
                <div class="alert alert-danger">No Book Found</div>
            </div>
        @endforelse
    </div>
@else
    <div class="alert alert-warning" role="alert">
        <strong>{{ __('frontend.sorry') }}</strong> No Books Found
    </div>
@endif
