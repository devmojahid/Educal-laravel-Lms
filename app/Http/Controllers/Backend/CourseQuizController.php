<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
use App\Models\Quiz;

class CourseQuizController extends Controller
{
    public function getQuiz($courseId)
    {
        $quizes = Course::find($courseId)->quizzes;

        if ($quizes) {
            return view('backend.course.quize.index', compact('courseId', 'quizes'));
        }
        return view('backend.course.quize.index', compact('courseId'));
    }

    public function createQuiz($courseId)
    {
        $quizes = Course::find($courseId)->quizzes;
        if ($quizes) {
            return view('backend.course.quize.create', compact(['courseId', 'quizes']));
        }
    }

    public function storeQuiz(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required',
                'title' => 'required',
                'quiz_duration' => 'required',
                'quiz_status' => 'required',
                'marks_per_question' => 'required',
            ]);
            $slug = Str::slug($request->title);
            $slugCount = Quiz::where("slug", $slug)->count();
            if ($slugCount > 0) {
                $slug = $slug . '-' . time();
            }

            $quiz = Course::find($request->course_id)->quizzes()->create([
                'title' => $request->title,
                'slug' => $slug,
                'quiz_duration' => $request->quiz_duration,
                'quiz_status' => $request->quiz_status,
                'marks_per_question' => $request->marks_per_question,
                'quiz_type' => $request->quiz_type,

            ]);

            $quizId = $quiz->id;

            if ($request->quiz_type == 'multiple') {
                return redirect()->route('admin.course.createQuizQuestionData', $quizId);
            }
        } catch (Validator $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // EditQuiz
    public function editQuiz($courseId, $quizId)
    {
        $quizes = Quiz::find($quizId);
        if ($quizes) {
            return view('backend.course.quize.edit', compact('courseId', 'quizes'));
        }
    }

    // updateQuiz
    public function updateQuiz(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required',
                'title' => 'required',
                'quiz_duration' => 'required',
                'quiz_status' => 'required',
                'marks_per_question' => 'required',
                'quize_id' => 'required',
            ]);
            $slug = Str::slug($request->title);
            $slugCount = Quiz::where("slug", $slug)->count();
            if ($slugCount > 0) {
                // Append a unique identifier to make the slug unique
                $slug = $slug . '-' . time();
            }
            $quize_id = $request->quize_id;
            $quiz = Quiz::find($quize_id);
            $quiz->title = $request->title;
            $quiz->slug = $slug;
            $quiz->quiz_duration = $request->quiz_duration;
            $quiz->quiz_status = $request->quiz_status;
            $quiz->marks_per_question = $request->marks_per_question;
            $quiz->quiz_type = $request->quiz_type;
            $quiz->course_id = $request->course_id;
            $quiz->save();
            if ($request->quiz_type == 'multiple') {
                return redirect()->back()->with('success', 'Quiz updated successfully !!');
            }
        } catch (Validator $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function deleteQuiz(Request $request)
    {
        $quiz = Quiz::find($request->id);
        $quiz->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Quiz deleted successfully !!',
        ]);
    }
}