<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'rating' => 'required|min:0|max:5',
            'course_id' => 'required',
        ]);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->course_id = $request->course_id;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->rating = $request->rating;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully');
    }
}
