<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogSubCategory;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;



class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $blogs = Blog::with(["category", "subcategory"])->orderBy('id', 'desc')->get();
        } else {
            $blogs = Blog::where('user_id', Auth::id())->with(["category", "subcategory"])->orderBy('id', 'desc')->get();
        }
        return view("backend.blog.blog.index", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view("backend.blog.blog.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);



        $slug = Str::slug($request->title);
        if (Blog::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->description = sanitizeInput($request->description);
        $blog->svg = sanitizeInput($request->svg);
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = sanitizeInput($request->meta_description);
        $blog->meta_keywords = sanitizeInput($request->meta_keywords);
        $blog->status = $request->status;
        $blog->user_id = auth()->user()->id ?? 1;
        $blog->category_id = $request->category_id;
        if ($request->subcategory_id) {
            $blog->subcategory_id = $request->subcategory_id;
        }
        $blog->tag_id = $request->tag_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name =  '/uploads/blogs/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $image_name);
            $blog->image = $image_name;
        }

        $blog->save();

        session()->flash('success', 'Blog created successfully.');
        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit blog
        $blog = Blog::with(["category", "subcategory"])->findOrFail($id);
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view("backend.blog.blog.edit", compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update blog
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $slug = Str::slug($request->title);
        if (Blog::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->description = str_replace('script', '', sanitizeInput($request->description));
        $blog->svg = sanitizeInput($request->svg);
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = sanitizeInput($request->meta_description);
        $blog->meta_keywords = sanitizeInput($request->meta_keywords);
        $blog->status = $request->status;
        $blog->user_id = auth()->user()->id ?? 1;
        $blog->category_id = $request->category_id;
        if ($request->subcategory_id) {
            $blog->subcategory_id = $request->subcategory_id;
        }
        $blog->tag_id = $request->tag_id;
        if ($request->hasFile('image')) {
            //delete old image
            if ($blog->image != null) {
                if (file_exists(public_path($blog->image)) && !empty($blog->image)) {
                    unlink(public_path($blog->image));
                }
            }
            $image = $request->file('image');
            $image_name =  '/uploads/blogs/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs');
            $image->move($destinationPath, $image_name);
            $blog->image = $image_name;
        }
        $blog->save();

        session()->flash('success', 'Blog updated successfully.');
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delte blog
        $blog = Blog::findOrFail($id);
        if (file_exists(public_path($blog->image)) && !empty($blog->image)) {
            unlink(public_path($blog->image));
        }
        $blog->delete();
        session()->flash('success', 'Blog deleted successfully.');
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }

    /**
     * Get sub categories by category id
     */


    public function getSubCategories($categoryId)
    {

        $subcategories = BlogSubCategory::where('blog_category_id', $categoryId)->where("status", "active")->get();
        return response()->json($subcategories);
    }

    // comments 
    public function blogComments()
    {
        $comments = Comment::orderBy('id', 'desc')->get();
        return view("backend.blog.comments.index", compact('comments'));
    }

    // approve comment 
    public function approveComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'approved';
        $comment->save();
        session()->flash('success', 'Comment approved successfully.');
        return redirect()->back()->with('success', 'Comment approved successfully.');
    }

    //reject comment
    public function rejectComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'rejected';
        $comment->save();
        session()->flash('success', 'Comment rejected successfully.');
        return redirect()->back()->with('success', 'Comment rejected successfully.');
    }

    // delete comment
    public function deleteComment(Request $request)
    {
        $menu = Comment::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Comment deleted successfully!!',
        ]);
    }
    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        if ($blog->image != null && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        $blog->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Blog deleted successfully!!',
        ]);
    }
}
