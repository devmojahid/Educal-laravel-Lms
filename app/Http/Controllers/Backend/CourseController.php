<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\CourseLanguage;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;



class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:course-list', ['only' => ['index']]);
        $this->middleware('permission:course-create', ['only' => ['store']]);
        $this->middleware('permission:course-edit', ['only' => ['update']]);
        $this->middleware('permission:course-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $courses = Course::with(["category", "subcategory", 'topics', 'lessons'])->orderBy('id', 'desc')->get();
            return view("backend.course.course.index", compact('courses'));
        } else {
            $courses = Course::with(["category", "subcategory", 'topics', 'lessons'])->where("user_id", auth()->user()->id)->orderBy('id', 'desc')->get();
            return view("backend.course.course.index", compact('courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CourseCategory::orderBy('id', 'desc')->where("status", 'active')->get();
        $languages = CourseLanguage::orderBy('id', 'desc')->where("status", 'active')->get();
        return view("backend.course.course.create", compact(['categories', 'languages']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_title' => 'required|string|max:255',

        ]);

        try {
            $slug = Str::slug($validatedData['course_title']);
            if (Course::where('slug', $slug)->first()) {
                $slug = $slug . '-' . time();
            }

            $course = Course::create([
                'title' => $validatedData['course_title'],
                'slug' => $slug,
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Course created successfully',
                'id' => $course->id,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function storeLesson(Request $request)
    {
        $validatedData = $request->validate([
            'topic_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
        ]);
        $slug = Str::slug($validatedData['title']);
        if (Lesson::where('slug', $slug)->first()) {
            $slug = $slug . '-' . time();
        }

        $type = null;
        if ($request->video != null) {
            $type = 'video';
        } elseif ($request->audio != null) {
            $type = 'audio';
        } elseif ($request->pdf != null) {
            $type = 'pdf';
        } elseif ($request->video_url != null) {
            $type = 'youtube';
        }

        //video thumbnail image store
        $video_thumbnail_image = null;
        if ($request->file('video_thumbnail_image')) {
            $image = $request->video_thumbnail_image;
            $video_thumbnail_image =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $video_thumbnail_image);
        } else {
            $video_thumbnail_image = null;
        }

        // video store
        $video = null;
        if ($request->file('video')) {
            $image = $request->video;
            $video =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $video);
        } else {
            $video = null;
        }

        // audio store
        $audio = null;
        if ($request->file('audio')) {
            $image = $request->audio;
            $audio =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $audio);
        } else {
            $audio = null;
        }

        // pdf store
        $pdf = null;
        if ($request->file('pdf')) {
            $image = $request->pdf;
            $pdf =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $pdf);
        } else {
            $pdf = null;
        }

        //ppt store
        $ppt = null;
        if ($request->file('ppt')) {
            $image = $request->ppt;
            $ppt =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $ppt);
        } else {
            $ppt = null;
        }

        $lesson = Lesson::where('topic_id', $validatedData['topic_id'])->create([
            'topic_id' => $validatedData['topic_id'],
            'title' => sanitizeJsonInput($validatedData['title']),
            'slug' => $slug,
            'description' => sanitizeJsonInput($validatedData['description']),
            'video_url' => $request->video_url,
            'video' => $video,
            'audio' => $audio,
            'pdf' => $pdf,
            'ppt' => $ppt,
            'video_thumbnail' => $video_thumbnail_image,
            'type' => $type,
            'sereal' => $request->sereal,
        ]);
        return response()->json([
            'status' => 'success',
            'data' => $lesson,
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
        //edit blog
        $course = Course::with(["category", "subcategory", 'topics', 'lessons'])->findOrFail($id);
        $categories = CourseCategory::orderBy('id', 'desc')->where('status', 'active')->get();
        $languages = CourseLanguage::orderBy('id', 'desc')->where('status', 'active')->get();
        $topics = Topic::with("lessons")->where('course_id', $id)->get();
        return view("backend.course.course.edit", compact(['course', 'categories', 'languages', 'topics']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData(Request $request, string $id)
    {
        $request->validate([
            'price' => 'nullable|numeric|min:0 ',
            'discount_price' => 'nullable|numeric|lt:price',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // update course
        $course = Course::find($id);
        // if ajax request
        if ($request->ajax()) {
            $slug = Str::slug($request['data']['course_title']);
            if (Course::where('slug', $slug)->where('id', '!=', $id)->first()) {
                $slug = $slug . '-' . time();
            }
            $course->title = $request['data']['course_title'];
            $course->slug = $slug;
            $course->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Course updated successfully',
            ]);
        }
        $status = 'pending';
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $status = 'approved';
        } elseif ($request->is_it_update == 'true') {
            $status = 'approved';
        } elseif (Auth::check() && Auth::user()->usertype == 'instructor') {
            $status = 'pending';
        }

        if ($request->file('course_image')) {
            if ($course->image != null && file_exists(public_path($course->image)) && !empty($course->image)) {
                unlink(public_path($course->image));
            }
            $image = $request->course_image;
            $course_image =  '/uploads/courses/' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/courses');
            $image->move($destinationPath, $course_image);
            $course->image = $course_image;
        }

        $slug = Str::slug($request->course_title);
        if (Course::where('slug', $slug)->where('id', '!=', $id)->first()) {
            $slug = $slug . '-' . time();
        }
        $course->title = $request->course_title;
        $course->slug = $slug;
        $course->description = sanitizeInput($request->course_description);
        $course->category_id = $request->category_id;
        if($request->subcategory_id != null){
            $course->subcategory_id  = $request->subcategory_id;
        }
        
        $course->language_id = $request->language_id;
        $course->price = $request->price;
        $course->discount_price = $request->discount_price;
        $course->duration = $request->duration;
        $course->video = $request->course_video;
        $course->level = $request->level;
        $course->requirements = $request->requirements;
        $course->meta_title = $request->meta_title;
        $course->meta_description = sanitizeInput($request->meta_description);
        $course->meta_keywords = sanitizeInput($request->meta_keywords);
        $course->status = $status;
        $course->save();
        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delte blog
        $course = Course::findOrFail($id);
        if ($course->image != null && file_exists(public_path($course->image)) && !empty($course->image)) {
            unlink(public_path($course->image));
        }
        $course->delete();
        session()->flash('success', 'Course deleted successfully.');
        return redirect()->route('course.index')->with('success', 'course deleted successfully.');
    }

    /**
     * Get sub categories by category id
     */


    public function getSubCategories($categoryId)
    {

        $subcategories = CourseSubCategory::where('course_category_id', $categoryId)->where("status", "active")->get();
        return response()->json($subcategories);
    }

    public function getCurriculum($id)
    {
        $topics = Topic::where('course_id', $id)->get();
        $lessons = [];
        foreach ($topics as $topic) {
            $lessons[] = Lesson::where('topic_id', $topic->id)->where('course_id', $id)->get();
        }
        return response()->json(
            [
                'status' => 'success',
                'data' => $topics,
                'lessons' => $lessons,
            ]
        );
    }

    // Rivew 
    public function courseReview()
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $reviews = Review::orderBy('id', 'desc')->get();
            return view("backend.course.review.index", compact('reviews'));
        } else {
            if (Auth::user()->usertype == 'instructor') {
                $reviews = Review::with('course')->whereHas('course', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })->orderBy('id', 'desc')->get();
                return view("backend.course.review.index", compact('reviews'));
            }
        }
    }

    // approve comment 
    public function approveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'approved';
        $review->save();
        session()->flash('success', 'Review approved successfully.');
        return redirect()->back()->with('success', 'Review approved successfully.');
    }

    //reject comment
    public function rejectReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'rejected';
        $review->save();
        session()->flash('success', 'Review rejected successfully.');
        return redirect()->back()->with('success', 'Review rejected successfully.');
    }

    // delete comment
    public function deleteReview(Request $request)
    {
        $review = Review::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Review deleted successfully!!',
        ]);
    }

    //pending course 
    public function pendingCourse()
    {
        $courses = Course::where('status', 'pending')->orderBy('id', 'desc')->get();
        return view("backend.course.course.pending", compact('courses'));
    }

    // approve course
    public function approvedCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 'approved';
        $course->save();
        return redirect()->back()->with('success', 'Course approved successfully.');
    }

    //reject course
    public function rejectedCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 'rejected';
        $course->save();
        return redirect()->back()->with('success', 'Course rejected successfully.');
    }


    public function deleteCourse(Request $request)
    {
        $course = Course::find($request->id);
        if ($course->image != null && file_exists(public_path($course->image)) && !empty($course->image)) {
            unlink(public_path($course->image));
        }
        $course->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Course has been deleted !!',
        ]);
    }
}