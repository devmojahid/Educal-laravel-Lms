<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentsStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'blog_id' => 'required',
        ]);


        if(Auth::check()){
            $status = 'approved';
            if(Auth::user()->usertype == 'admin'){
                $status = 'approved';
            }else{
                $status = 'pending';
            }

            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'blog_id' => $request->blog_id,
                'content' => sanitizeInput($request->content),
                'parent_id' => null,
                'status' => $status,
            ]);

            if(Auth::user()->usertype == 'admin'){
                return redirect()->back()->with('success', 'Comment created successfully');
            }else{

                return redirect()->back()->with('success', 'Comment created successfully Waiting for approval');
            }

        }else{
            return redirect()->back()->with('error', 'Please login to comment');
        }

    }

    public function commentsReply(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'blog_id' => 'required',
        ]);

        if(Auth::check()){
            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'blog_id' => $request->blog_id,
                'content' => sanitizeInput($request->content),
                'parent_id' => $request->parent_id,
                'status' => Auth::user()->usertype == 'admin' ? 'approved' : 'pending',
            ]);

            if(Auth::user()->usertype == 'admin'){
                return redirect()->back()->with('success', 'Comment created successfully');
            }else{
                return redirect()->back()->with('success', 'Comment created successfully Waiting for approval');
            }

        }else{
            return redirect()->back()->with('error', 'Please login to comment');
        }
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
