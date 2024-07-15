<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\CourseCategory;
use App\Models\Course;

class FindCourseController extends Controller
{
    public function index()
    {
        $courseCatefories = CourseCategory::orderBy('title',"asc")->where('status', 'active')->get();
        if(SystemSetting::where('key', 'home_find_course')->exists()) {
            $categoriesData = SystemSetting::where('key', 'home_find_course')->first();
            $categories = json_decode($categoriesData->value,true);
        } else {
            $categories = [];
        }
        $courses = Course::orderBy('title', 'desc')->where('status', 'approved')->get();

        if(SystemSetting::where('key', 'home_find_course')->exists()){
            $findCourseData = SystemSetting::where('key', 'home_find_course')->first();
            $findCourse = json_decode($findCourseData->value,true);
        } else {
            $findCourse = [];
        }

        
      
        return view('backend.pages.home.find-course', compact(['courseCatefories','categories','courses','findCourse']));
    }

    public function update(Request $request) {
        $data = [
            'title' => $request->title,
            'categories' => $request->categories ?? [],
            'courses' => $request->courses ?? [],
        ];

        if(SystemSetting::where('key', 'home_find_course')->exists()) {
            $home_find_course = SystemSetting::where('key', 'home_find_course')->first();
            $home_find_course->value = json_encode($data);
            $home_find_course->save();
        } else {
            $home_find_course = new SystemSetting;
            $home_find_course->key = 'home_find_course';
            $home_find_course->value = json_encode($data);
            $home_find_course->save();
        }

        return redirect()->back()->with('success', 'Find Course updated successfully');
    }
}
