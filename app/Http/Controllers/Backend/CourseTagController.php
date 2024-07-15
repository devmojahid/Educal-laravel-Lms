<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTag;
use Illuminate\Support\Str;

class CourseTagController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:course-tag-list', ['only' => ['index']]);
        $this->middleware('permission:course-tag-create', ['only' => ['store']]);
        $this->middleware('permission:course-tag-edit', ['only' => ['update']]);
        $this->middleware('permission:course-tag-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = CourseTag::orderBy('id', 'desc')->get();
        return view("backend.course.tag.index", compact('tags'));
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
                'title.required'=>'Course Tag Title is Required',
            ]
        );

        $course_tag = new CourseTag();
        $course_tag->title = $request->title;
        $course_tag->slug = Str::slug($request->title);
        $course_tag->description = sanitizeInput($request->description);
        $course_tag->status = $request->status;
        $course_tag->image = $request->image ? $request->image : 'default.png'; 
        $course_tag->svg = sanitizeInput($request->svg);
        $course_tag->user_id = auth()->user()->id;
        $course_tag->save();

        session()->flash('success', 'Course Tag has been created !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Course Tag has been created !!',
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
                'title.required'=>'Course Tag Title is Required',
            ]
        );

        $course_tag = CourseTag::find($request->id);
        $course_tag->title = $request->title;
        $course_tag->slug = Str::slug($request->title);
        $course_tag->description = sanitizeInput($request->description);
        $course_tag->status = $request->status;
        $course_tag->image = $request->image ? $request->image : 'default.png'; 
        $course_tag->svg = sanitizeInput($request->svg);
        $course_tag->user_id = auth()->user()->id;
        $course_tag->save();

        session()->flash('success', 'Course Tag has been updated !!');

        return response()->json([
            'status'=>'success',
            'message'=>'Course Tag has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        CourseTag::find($request->id)->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Course Tag has been deleted !!',
        ]);
    }
}
