<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogTag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogTagController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:blog-tag-list', ['only' => ['index']]);
        $this->middleware('permission:blog-tag-create', ['only' => ['store']]);
        $this->middleware('permission:blog-tag-edit', ['only' => ['update']]);
        $this->middleware('permission:blog-tag-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->usertype == 'admin') {
            $tags = BlogTag::orderBy('id', 'desc')->get();
        }else{
            $tags = BlogTag::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        }
        return view("backend.blog.tag.index", compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'description'=>'nullable',
            ],
            [
                'title.required'=>'Blog Tag Title is Required',
            ]
        );

        $blog_tag = new BlogTag();
        $blog_tag->title = $request->title;
        $blog_tag->slug = Str::slug($request->title);
        $blog_tag->description = sanitizeInput($request->description);
        $blog_tag->status = $request->status;
        $blog_tag->image = $request->image ? $request->image : 'default.png'; 
        $blog_tag->svg = sanitizeInput($request->svg);
        $blog_tag->user_id = Auth::id();
        $blog_tag->save();

        session()->flash('success', 'Blog Tag has been created !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Tag has been created !!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'description'=>'nullable',
            ],
            [
                'title.required'=>'Blog Tag Title is Required',
            ]
        );

        $blog_tag = BlogTag::find($request->id);
        $blog_tag->title = $request->title;
        $blog_tag->slug = Str::slug($request->title);
        $blog_tag->description = sanitizeInput($request->description);
        $blog_tag->status = $request->status;
        $blog_tag->image = $request->image ? $request->image : 'default.png'; 
        $blog_tag->svg = sanitizeInput($request->svg);
        $blog_tag->user_id = Auth::id();
        $blog_tag->save();

        session()->flash('success', 'Blog Tag has been updated !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Tag has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        BlogTag::find($request->id)->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Tag has been deleted !!',
        ]);
    }
}
