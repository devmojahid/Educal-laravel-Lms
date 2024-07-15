<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizeQuestion;
use App\Models\QuizeQuestionOption;

class CourseQuizQuestionController extends Controller
{
    public function getQuizQuestion($quizId) {
        $questions = Quiz::find($quizId)->questions;
        if($questions) {
            return view('backend.course.question.index', compact('quizId', 'questions'));
        }
        return view('backend.course.question.index', compact('courseId'));
    }

    public function createQuizQuestion($quizId) {
        $questions = Quiz::find($quizId)->questions;
        if($questions) {
            return view('backend.course.question.create', compact('quizId', 'questions'));
        }
    }

    public function storeQuizQuestion(Request $request) {
        try {
            $question = new QuizeQuestion();
            $question->question =$request->question[0];
            $question->options = json_encode($request->option);
            $question->answer = $request->answer[0];
            $question->quiz_id = $request->quiz_id;
            $question->save();
            return redirect()->route('admin.course.getQuizQuestionData', $request->quiz_id)->with('success', 'Question created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course.getQuizQuestionData', $request->quiz_id)->with('error', 'Something went wrong');
        }
    }

    public function editQuizQuestion($quizId, $questionId) {
        $question = QuizeQuestion::find($questionId);
        $questions = Quiz::find($quizId)->questions;
        if($questions) {
            return view('backend.course.question.edit', compact('quizId', 'questions', 'question'));
        }
    }

    public function updateQuizQuestion(Request $request, $id) {
        try {
            $question = QuizeQuestion::find($id);
            $question->question =$request->question[0];
            $question->options = json_encode($request->option);
            $question->answer = $request->answer[0];
            $question->quiz_id = $request->quiz_id;
            $question->save();
            return redirect()->route('admin.course.getQuizQuestionData', $request->quiz_id)->with('success', 'Question updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.course.getQuizQuestionData', $request->quiz_id)->with('error', 'Something went wrong');
        }
    }

    //deleteQuizQuestion
    public function deleteQuizQuestion(Request $request) {
        $Question = QuizeQuestion::find($request->id);
        $Question->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Question deleted successfully !!',
        ]);
    }
}