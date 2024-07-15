<?php

namespace App\Http\Controllers\Backend\Book;

use App\Http\Controllers\Controller;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $reviews = BookReview::orderBy('id', 'desc')->get();
            return view("backend.book.review.index", compact('reviews'));
        }
    }

    public function approveReview($id)
    {
        $review = BookReview::findOrFail($id);
        $review->status = 'approved';
        $review->save();
        return redirect()->back()->with('success', 'Review approved successfully');
    }

    public function rejectReview($id)
    {
        $review = BookReview::findOrFail($id);
        $review->status = 'rejected';
        $review->save();
        return redirect()->back()->with('success', 'Review rejected successfully');
    }

    public function deleteReview(Request $request)
    {
        $review = BookReview::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Review deleted successfully!!',
        ]);
    }
}
