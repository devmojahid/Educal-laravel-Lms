<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class CourseController extends Controller
{

    public function course()
    {
        $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('id', 'desc')->paginate(6);
        $courseCategories = CourseCategory::orderBy('id', 'DESC')->limit(5)->with("course")->get();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        return view("frontend.pages.course", compact('courses', 'courseCategories', 'recentCourses'));
    }
    public function courseDetails($slug)
    {
        $course = Course::with(["user", "assignments", "resources", "quizzes", "language", "topics", "lessons", "curriculum", "category", "reviews"])->where('status', "approved")->where('slug', $slug)->first();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        if (!$course) {
            abort(404);
        }
        $reletedCourses = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->limit(3)->get();
        return view("frontend.pages.course-details", compact(['course', 'recentCourses', 'reletedCourses']));
    }

    // filter course
    public function courseFilter(Request $request)
    {
        $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
        if ($request->ajax()) {
            if (!empty($request->sortBy)) {
                $sortBy = $request->sortBy;
                if ($sortBy == "newest") {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('created_at', 'desc')->paginate(6);
                } elseif ($sortBy == "oldest") {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('created_at', 'asc')->paginate(6);
                } elseif ($sortBy == "expensive") {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('price', 'desc')->paginate(6);
                } elseif ($sortBy == "cheap") {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('price', 'asc')->paginate(6);
                } elseif ($sortBy == "free") {
                    $courses = Course::with(["user", "category"])->where('price', '=', null)->where('status', "approved")->paginate(6);
                } else {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
                }
                return view("frontend.pages.course.single-course-in-grid", compact('courses'))->render();
            }
            if (!empty($request->category) || !empty($request->level) || !empty($request->price) || !empty($request->language)) {
                if (!empty($request->category)) {
                    $category = $request->category;
                    $courses = Course::with(["user", "category"])->where('status', "approved")->where('category_id', $category)->paginate(6);
                } elseif (!empty($request->level)) {
                    $level = $request->level;
                    $courses = Course::with(["user", "category"])->where('status', "approved")->where('level', $level)->paginate(6);
                } elseif (!empty($request->price)) {
                    $request->price == "free" ? $courses = Course::with(["user", "category"])->where('status', "approved")->where("price", null)->paginate(6) : $courses = Course::with(["user", "category"])->where('status', "approved")->where("price", ">", 0)->paginate(6);
                } elseif (!empty($request->language)) {
                    $language = $request->language;
                    $courses = Course::with(["user", "category"])->where('status', "approved")->where('language_id', $language)->paginate(6);
                } else {
                    $courses = Course::with(["user", "category"])->where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
                }
                return view("frontend.pages.course.single-course-in-grid", compact('courses'))->render();
            }
            return view("frontend.pages.course.single-course-in-grid", compact('courses'))->render();
        }
    }

    // all courses page
    public function allCourses(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::with(["user"])->where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
            return response()->json($data);
        }
    }

    // search course
    public function courseSearch(Request $request)
    {
        $search = htmlspecialchars($request->search);
        $courses = Course::with(["user", "category"])->where('status', "approved")->where('title', 'LIKE', '%' . $search . '%')->paginate(6);
        $courseCategories = CourseCategory::orderBy('id', 'DESC')->limit(5)->with("course")->get();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        return view("frontend.pages.course", compact(['courses', 'courseCategories', 'recentCourses', 'search']));
    }

    // category course
    public function courseCategory($slug)
    {
        $category = CourseCategory::where('slug', $slug)->first();
        $courses = Course::with(["user", "category"])->where('status', "approved")->where('category_id', $category->id)->paginate(6);
        $courseCategories = CourseCategory::orderBy('id', 'DESC')->limit(5)->with("course")->get();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        return view("frontend.pages.course", compact(['courses', 'courseCategories', 'recentCourses', 'category']));
    }
}
