<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:course-category-list', ['only' => ['index']]);
        $this->middleware('permission:course-category-create', ['only' => ['store']]);
        $this->middleware('permission:course-category-edit', ['only' => ['update']]);
        $this->middleware('permission:course-category-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::orderBy('id', 'desc')->get();
        return view("backend.course.category.index", compact('categories'));
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
                'svg'=>'nullable|file|mimes:svg,jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'title.required'=>'Course Categry Title is Required',
            ]
        );

        $course_category = new CourseCategory();
        $course_category->title = sanitizeInput($request->title)        ;
        $course_category->slug = Str::slug($request->title);
        $course_category->description = sanitizeInput($request->description);
        $course_category->status = $request->status;
        $course_category->image = $request->image ? $request->image : 'default.png'; 
        if($request->hasFile('svg')){
            $svg = $request->file('svg');
            $svg_name = "/uploads/course_category/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/course_category/'), $svg_name);
            $course_category->svg = $svg_name;
        }
        $course_category->meta_title = $request->meta_title;
        $course_category->meta_description = sanitizeInput($request->meta_description);
        $course_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $course_category->user_id = auth()->user()->id;
        $course_category->save();

        session()->flash('success', 'Course Category has been created !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Course Category has been created !!',
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
                'svg'=>'nullable|file|mimes:svg,jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'title.required'=>'Course Category Title is Required',
            ]
        );

        $course_category = CourseCategory::find($request->id);
        $course_category->title = $request->title;
        $course_category->slug = Str::slug($request->title);
        $course_category->description = sanitizeInput($request->description);
        $course_category->status = $request->status;
        $course_category->image = $request->image ? $request->image : 'default.png';
        if($request->hasFile('svg')){
            if($course_category->svg != null && file_exists(public_path($course_category->svg))){
                unlink(public_path($course_category->svg));
            }
            $svg = $request->file('svg');
            $svg_name = "/uploads/course_category/".time().'.'.$svg->getClientOriginalExtension();
            $svg->move(public_path('/uploads/course_category/'), $svg_name);
            $course_category->svg = $svg_name;
        }
        $course_category->meta_title = $request->meta_title;
        $course_category->meta_description = sanitizeInput($request->meta_description);
        $course_category->meta_keywords = sanitizeInput($request->meta_keywords);
        $course_category->user_id = auth()->user()->id;
        $course_category->save();

        session()->flash('success', 'Course Category has been updated !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Course Category has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $course_category =  CourseCategory::find($request->id);
        if($course_category->svg != null && file_exists(public_path($course_category->svg))){
            unlink(public_path($course_category->svg));
        }
        $course_category->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Course Category has been deleted !!',
        ]);
    }
}