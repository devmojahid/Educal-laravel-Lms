<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'rating' => 'required|int|min:0|max:5',
            'book_id' => 'required',
        ]);

        // if user buy the book then only he can review
        // if (!auth()->user()->books->contains($request->book_id)) {
        //     return redirect()->back()->with('error', 'You can not review this book');
        // }

        // public function orderItems()
        // {
        //     return $this->morphMany(OrderItem::class, 'item');
        // }

        $orderItems = Book::find($request->book_id);

        $review = new BookReview();
        $review->user_id = auth()->user()->id;
        $review->book_id = $request->book_id;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->rating = $request->rating;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully');
    }
}