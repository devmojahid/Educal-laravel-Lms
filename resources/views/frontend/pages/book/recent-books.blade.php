<ul>
    @foreach ($recentBooks as $recentBook)
        <li>
            <div class="course__sm d-flex align-items-center mb-20">
                <div class="course__sm-thumb mr-20">
                    <a href="{{ route('books.details', $recentBook->slug) }}">
                        <img src="{{ asset($recentBook->image) }}" alt="{{ $recentBook->title }}">
                    </a>
                </div>
                <div class="course__sm-content">
                    <div class="course__sm-rating">
                        <ul>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($recentBook->reviewsAvg() >= $i)
                                    <li><a href="javascript:void(0)"> <i class="icon_star"></i> </a></li>
                                @else
                                    <li><a href="javascript:void(0)"><i class="fal fa-star"></i></a></li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <h5><a href="{{ route('books.details', $recentBook->slug) }}">
                            {{ Str::limit($recentBook->title, 30, '') }}
                        </a>
                    </h5>
                    <div class="course__sm-price">
                        @if (floatval($recentBook->discount_price) != 0)
                            <span class="new-price">
                                {{ currency_symbol($recentBook->discount_price) }}
                            </span>
                            <span class="old-price"
                                style="color: #8282af;font-weight: 500;text-decoration-line: line-through">
                                {{ currency_symbol($recentBook->price) }}
                            </span>
                        @else
                            <span class="new-price">
                                {{ currency_symbol($recentBook->price) }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
