<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use Illuminate\Support\Str;


class CourseLanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:course-language-list', ['only' => ['index']]);
        $this->middleware('permission:course-language-create', ['only' => ['store']]);
        $this->middleware('permission:course-language-edit', ['only' => ['update']]);
        $this->middleware('permission:course-language-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = CourseLanguage::orderBy('id', 'desc')->get();
        return view("backend.course.language.index", compact('languages'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate(
            [
                'title'=>'required',
            ],
            [
                'title.required'=>'Course Language Title is Required',
            ]
        );
        $slug = Str::slug($request->title);
        if(CourseLanguage::where('slug', $slug)->exists()){
            $slug = $slug.'-'.time();
        }
        $image_name = null;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name =  '/uploads/courses/language/'. time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses/language');
            $image->move($destinationPath, $image_name);
        }

        $course_language = new CourseLanguage();
        $course_language->title = $request->title;
        $course_language->slug = $slug;
        $course_language->status = $request->status;
        $course_language->image = $image_name; 
        $course_language->user_id = auth()->user()->id;
        $course_language->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Course Language has been created !!',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
            ],
            [
                'title.required'=>'Course Language Title is Required',
            ]
        );
        $slug = Str::slug($request->title);
        if(CourseLanguage::where('slug', $slug)->exists()){
            $slug = $slug.'-'.time();
        }
        
        $course_language = CourseLanguage::find($request->id);
        $image_name = null;
        if ($request->file('image')) {
            if(file_exists(public_path($course_language->image)) && !empty($course_language->image)){
                unlink(public_path($course_language->image));
            }
            $image = $request->file('image');
            $image_name =  '/uploads/courses/language/'. time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses/language');
            $image->move($destinationPath, $image_name);
        }

        
        $course_language->title = $request->title;
        $course_language->slug = $slug;
        $course_language->status = $request->status;
        $course_language->user_id = auth()->user()->id;
        if ($request->image) {
            $course_language->image = $image_name; 
        }
        $course_language->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Course Language has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
       $course =  CourseLanguage::find($request->id);
         if(file_exists(public_path($course->image)) && !empty($course->image)){
              unlink(public_path($course->image));
            }
        $course->delete();
        
        return response()->json([
            'status'=>'success',
            'message'=>'Course Tag has been deleted !!',
        ]);
    }
}
