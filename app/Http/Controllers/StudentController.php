<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\QuizeQuestion;

class StudentController extends Controller
{
    //dashboard
    public function dashboard()
    {

        $courseCounts = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('user_id', auth()->user()->id)
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();


        return view('frontend.student.dashboard', compact('courseCounts'));
    }

    //profile
    public function  profile()
    {
        $user = auth()->user();
        return view('frontend.student.profile', compact('user'));
    }

    //enrolled course
    public function  enrolledCourse()
    {
        $enroledsCoursesItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'enrolled')
            ->latest()
            ->get();


        return view('frontend.student.enrolled-course', compact('enroledsCoursesItems'));
    }

    //enrolled book
    public function  enrolledBook()
    {
        $enroledsBooksItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Book')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        $item_status = 'enrolled';

        return view('frontend.student.enrolled-book', compact('enroledsBooksItems', 'item_status'));
    }

    //download items

    public function downloadItem()
    {
        $enroledsBooksItems = [];

        $orderItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Book')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'enrolled')
            ->latest()
            ->get();


        foreach ($orderItems as $orderItem) {
            if ($orderItem->item->product_type == 'downloadable') {
                $enroledsBooksItems[] = $orderItem;
            }
        }

        $item_status = 'downloadable';
        return view('frontend.student.enrolled-book', compact('enroledsBooksItems', 'item_status'));
    }

    // physical book download
    public function physicalItem()
    {
        $enroledsBooksItems = [];

        $orderItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Book')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->orWhere('status', 'complete')
            ->latest()
            ->get();

        foreach ($orderItems as $orderItem) {
            if ($orderItem->item->product_type == 'physical' || $orderItem->item->product_type == null) {
                $enroledsBooksItems[] = $orderItem;
            }
        }

        $item_status = 'physical';
        return view('frontend.student.enrolled-book', compact('enroledsBooksItems', 'item_status'));
    }

    public function  downloadFile($slug)
    {
        $book = Book::where('slug', $slug)
            ->where('product_type', 'downloadable')
            ->first();
        if (!$book) {
            return redirect()->back()->with('error', 'Book not found');
        }
        $downloadPath = public_path($book->book_file);
        return response()->download($downloadPath);
    }

    //active course
    public function  activeCourse()
    {

        $activeCoursesItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('frontend.student.active-course', compact('activeCoursesItems'));
    }

    //complete course
    public function  completeCourse()
    {

        $completeCoursesItems = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'complete')
            ->latest()
            ->get();

        return view('frontend.student.complete-course', compact('completeCoursesItems'));
    }

    //enrolled course details
    public function  enrolledCourseDetails()
    {
        return view('frontend.student.enrolled-course-details');
    }

    //settings
    public function  settings()
    {
        return view('frontend.student.settings');
    }

    //order
    public function  order()
    {
        $order = Order::with("orderItems")->where('user_id', auth()->user()->id)->get();
        return view('frontend.student.order', compact('order'));
    }

    //learning dashboard
    public function  learningDashboard($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $orderItem = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('item_id', $course->id)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'enrolled')
            ->orWhere('status', 'active')
            ->first();

        if (!$orderItem) {
            return redirect()->back()->with('error', 'You are not enrolled in this course');
        }
        $orderItem->update([
            'status' => 'active'
        ]);
        $lessonData = Lesson::where('course_id', $course->id)->first();
        return view('frontend.student.learning-dashboard', compact('course', 'lessonData'));
    }

    //lesson
    public function  lesson($slug, $id)
    {

        $course = Course::where('slug', $slug)->first();
        // $orderItem = OrderItem::where('course_id', $course->id)->where('user_id', auth()->user()->id)->first();

        $orderItem = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('item_id', $course->id)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->first();


        if (!$orderItem) {
            return redirect()->back()->with('error', 'You are not enrolled in this course');
        }
        $lessonData = Lesson::where('id', $id)->first();
        return view('frontend.student.learning-dashboard', compact('course', 'lessonData'));
    }

    //get quiz question
    public function  getQuizQuestion($slug, $id, $quizId)
    {
        $course = Course::where('slug', $slug)->first();
        // $orderItem = OrderItem::where('course_id', $course->id)->where('user_id', auth()->user()->id)->first();

        $orderItem = OrderItem::with(['item'])
            ->where('item_type', 'App\Models\Course')
            ->where('item_id', $course->id)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->first();


        if (!$orderItem) {
            return redirect()->back()->with('error', 'You are not enrolled in this course');
        }
        $lessonData = Lesson::where('id', $id)->first();
        $quizQuestions = Quiz::with("questions")->where('id', $quizId)->first();
        return view('frontend.student.learning-dashboard', compact(['course', 'lessonData', 'quizQuestions']));
    }

    //submit quiz
    public function  submitQuiz(Request $request, $slug, $id, $quizId)
    {
        $all_question_answers_values = json_decode($request->quiz_answer, true);
        $marks = 0;
        $attemts = 0;
        $correctAnswer = 0;
        $totalQuestion = $request->total_questions;
        $percentage = 0;

        foreach ($all_question_answers_values as $values) {
            $questionId = $values['questionId'];
            $answer = $values['answer'];
            $question = QuizeQuestion::find($questionId);
            if ($question->answer == $answer) {
                $correctAnswer++;
            }
            $attemts++;
        }
        $percentage = ($correctAnswer / $totalQuestion) * 100;
        $marks = $correctAnswer * 10;
        $data = [
            'marks' => $marks,
            'totalQuestion' => $totalQuestion,
            'attemts' => $attemts,
            'correctAnswer' => $correctAnswer,
            'percentage' => $percentage,
            'quiz_id' => $quizId
        ];


        // Redirect back to the previous view
        session()->put("quiz_result_{$quizId}", $data);
        return redirect()->back()->with('success', 'Your quiz has been submitted successfully');
    }
}
