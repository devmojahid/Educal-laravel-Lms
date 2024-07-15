<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Commission;
use App\Models\Coupon;
use App\Models\CourseCategory;
use App\Models\Event;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_student = User::where(['usertype' => 'user'])->count();
        $total_instructor = User::where(['usertype' => 'instructor'])->count();
        $total_courses = Course::where(['status' => 'approved'])->count();
        $total_order_amount = Order::where(['status' => 'approved'])->sum('total');
        $total_blogs = Blog::where(['status' => 'active'])->count();
        $total_orders = Order::where(['status' => 'approved'])->count();
        $total_events = Event::count();
        $total_comments = Comment::where(['status'=>'approved'])->count();

        $userCourseCategories = CourseCategory::where(['status' => 'active','user_id' => auth()->user()->id])->get();
        $coupons = Coupon::where(['status' => 'active','user_id' => auth()->user()->id])->get();

        $instructor_courses = Course::where(['status' => 'approved'],['user_id' => auth()->user()->id])->get();
        $instructor_courses_count = $instructor_courses->count();
        $instructor_courses_revenue = Commission::where(['user_id' => auth()->user()->id])->sum('amount');
        $instructor_orders = UserCourse::where(['user_id' => auth()->user()->id])->get();
        $instructor_orders_decode = json_decode($instructor_orders,true);
        $instructor_orders_course = [];
        for($i=0;$i<count($instructor_orders_decode);$i++){
            $instructor_orders_course[$i] = Course::where(['id' => $instructor_orders_decode[$i]['course_id']])->get();
        }
        return view('backend.dashboard',compact(['total_student','total_instructor','total_courses','total_events','total_comments','total_orders','total_order_amount','total_blogs','instructor_courses_count','instructor_courses','instructor_courses_revenue','instructor_orders_course','userCourseCategories','coupons']));
    }
}
