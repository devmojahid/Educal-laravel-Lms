<div class="header__cart">
    <a href="{{ route('cart') }}" class="">
        <div class="header__cart-icon">
            <svg viewBox="0 0 24 24">
                <circle class="st0" cx="9" cy="21" r="1" />
                <circle class="st0" cx="20" cy="21" r="1" />
                <path class="st0" d="M1,1h4l2.7,13.4c0.2,1,1,1.6,2,1.6h9.7c1,0,1.8-0.7,2-1.6L23,6H6" />
            </svg>
        </div>
        <span class="cart-item">
            @auth
                @if (App\Models\Cart::where('user_id', Auth::user()->id)->count() > 0)
                    {{ App\Models\Cart::where('user_id', Auth::user()->id)->count() }}
                @else
                    {{ __('frontend.0') }}
                @endif
            @endauth
            @guest
                {{ __('frontend.0') }}
            @endguest
        </span>
    </a>
</div>