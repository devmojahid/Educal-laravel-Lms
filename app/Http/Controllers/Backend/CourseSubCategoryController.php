<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseSubCategory;
use Illuminate\Support\Str;
use App\Models\CourseCategory;

class CourseSubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:course-sub-category-list', ['only' => ['index']]);
        $this->middleware('permission:course-sub-category-create', ['only' => ['store']]);
        $this->middleware('permission:course-sub-category-edit', ['only' => ['update']]);
        $this->middleware('permission:course-sub-category-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = CourseSubCategory::with("course_category")->orderBy('id', 'desc')->get();
        $categories = CourseCategory::orderBy('title', 'asc')->get();
        return view("backend.course.subcategory.index", compact('subcategories', 'categories'));
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
                'title.required'=>'Course Sub Categry Title is Required',
            ]
        );

        $course_sub_category = new CourseSubCategory();
        $course_sub_category->title = sanitizeInput($request->title);
        $course_sub_category->slug = Str::slug($request->title);
        $course_sub_category->description = sanitizeInput($request->description);
        $course_sub_category->status = $request->status;
        $course_sub_category->image = $request->image ? $request->image : 'default.png'; 
        if($request->hasFile('svg')){
            $svg = $request->file('svg');
            $svg_name = "/uploads/course_subcategory/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/course_subcategory/'), $svg_name);
            $course_sub_category->svg = $svg_name;
        }
        $course_sub_category->meta_title = $request->meta_title;
        $course_sub_category->meta_description = sanitizeInput($request->meta_description);
        $course_sub_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $course_sub_category->course_category_id = $request->blog_category_id;
        $course_sub_category->user_id = auth()->user()->id;
        $course_sub_category->save();

        session()->flash('success', 'Course Sub Category has been created !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Course Sub Category has been created !!',
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
                'title.required'=>'Course Sub Categry Title is Required',
            ]
        );

        $blog_sub_category = CourseSubCategory::find($request->id);
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
            $svg_name = "/uploads/course_subcategory/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/course_subcategory/'), $svg_name);
            $blog_sub_category->svg = $svg_name;
        }
        $blog_sub_category->meta_title = $request->meta_title;
        $blog_sub_category->meta_description = sanitizeInput($request->meta_description);
        $blog_sub_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $blog_sub_category->course_category_id = $request->blog_category_id;
        $blog_sub_category->user_id = auth()->user()->id;
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
        $blog_sub_category = CourseSubCategory::find($request->id);
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