<div class="tp-shop-grid-sidebar mr-10">
    <!-- categories -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">Categories</h3>

        <div class="tp-shop-widget-content">
            <div class="tp-shop-widget-categories">
                <ul>
                    @forelse ($booksCategories as $bookCategory)
                        <li><a href="{{ route('books.category', $bookCategory->slug) }}">{{ $bookCategory->title }}<span>
                                    {{ $bookCategory->books->count() }}
                                </span></a>
                        @empty
                        <li><a href="#">No Category</a></li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!-- age -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">Genres</h3>
        <div class="tp-shop-widget-content">
            <div class="tp-shop-widget-categories">
                <ul>
                    @foreach ($booksGenres as $genre)
                        <li><a href="{{ route('books.genere', $genre->slug) }}">{{ $genre->title }}<span>
                                    {{ $genre->books->count() }}
                                </span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- recent course -->
    <div class="tp-shop-widget mb-50">
        <h3 class="tp-shop-widget-title">Recent Books</h3>
        <div class="tp-shop-widget-content">
            <div class="tp-shop-recent-course">
                @include('frontend.pages.book.recent-books   ', [
                    'recentBooks' => $recentBooks,
                ])
            </div>
        </div>
    </div>
</div>
