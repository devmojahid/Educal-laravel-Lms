<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogSubCategory;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

class BlogSubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:blog-sub-category-list', ['only' => ['index']]);
        $this->middleware('permission:blog-sub-category-create', ['only' => ['store']]);
        $this->middleware('permission:blog-sub-category-edit', ['only' => ['update']]);
        $this->middleware('permission:blog-sub-category-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->usertype == 'admin') {
            $subcategories = BlogSubCategory::with("blog_category")->orderBy('id', 'desc')->get();
            $categories = BlogCategory::orderBy('title', 'asc')->get();
        }else{
            $subcategories = BlogSubCategory::where('user_id', Auth::id())->with("blog_category")->orderBy('id', 'desc')->get();
            $categories = BlogCategory::where('user_id', Auth::id())->orderBy('title', 'asc')->get();
        }
        return view("backend.blog.subcategory.index", compact('subcategories', 'categories'));
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
                'blog_category_id'=>'required',
                'svg'=>'nullable|file|mimes:svg,jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'title.required'=>'Blog Sub Categry Title is Required',
            ]
        );

        $blog_sub_category = new BlogSubCategory();
        $blog_sub_category->title = sanitizeInput($request->title);
        $blog_sub_category->slug = Str::slug($request->title);
        $blog_sub_category->description = sanitizeInput($request->description);
        $blog_sub_category->status = $request->status;
        $blog_sub_category->image = $request->image ? $request->image : 'default.png'; 
        if($request->hasFile('svg')){
            $svg = $request->file('svg');
            $svg_name = "/uploads/blog_subcategory/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/blog_subcategory/'), $svg_name);
            $blog_sub_category->svg = $svg_name;
        }
        $blog_sub_category->meta_title = $request->meta_title;
        $blog_sub_category->meta_description = sanitizeInput($request->meta_description);
        $blog_sub_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $blog_sub_category->blog_category_id = $request->blog_category_id;
        $blog_sub_category->user_id = Auth::id();
        $blog_sub_category->save();

        session()->flash('success', 'Blog Sub Category has been created !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Sub Category has been created !!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'description'=>'nullable',
                'blog_category_id'=>'required',
                'svg'=>'nullable|file|mimes:svg,jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'title.required'=>'Blog Sub Categry Title is Required',
            ]
        );

        $blog_sub_category = BlogSubCategory::find($request->id);
        $blog_sub_category->title = sanitizeInput($request->title);
        $blog_sub_category->slug = Str::slug($request->title);
        $blog_sub_category->description = sanitizeInput($request->description);
        $blog_sub_category->status = $request->status;
        $blog_sub_category->image = $request->image ? $request->image : 'default.png';
        if($request->hasFile('svg')){
            if($blog_sub_category->svg != null && file_exists(public_path($blog_sub_category->svg))){
                unlink(public_path($blog_sub_category->svg));
            }
            $svg = $request->file('svg');
            $svg_name = "/uploads/blog_subcategory/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/blog_subcategory/'), $svg_name);
            $blog_sub_category->svg = $svg_name;
        }
        $blog_sub_category->meta_title = $request->meta_title;
        $blog_sub_category->meta_description = sanitizeInput($request->meta_description);
        $blog_sub_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $blog_sub_category->blog_category_id = $request->blog_category_id;
        $blog_sub_category->user_id = Auth::id();
        $blog_sub_category->save();

        session()->flash('success', 'Blog Sub Category has been updated !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Sub Category has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $blog_sub_category = BlogSubCategory::find($request->id);
        if($blog_sub_category->svg != null && file_exists(public_path($blog_sub_category->svg))){
            unlink(public_path($blog_sub_category->svg));
          }
        $blog_sub_category->delete();

        session()->flash('success', 'Blog Sub Category has been deleted !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Sub Category has been deleted !!',
        ]);
    }
}