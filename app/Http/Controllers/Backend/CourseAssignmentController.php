<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseAssignmentController extends Controller
{
    public function getAssignment($courseId) {
        $assignments = Course::find($courseId)->assignments;
        return view('backend.course.assignment.index', compact('assignments', 'courseId'));
    }   

    public function storeAssignment() {
        //if ajax request then store data
        if(request()->ajax()) {
            $data = request()->validate([
                'course_id' => 'required',
                'title' => 'required',
                'file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'nullable',
                'marks' => 'required',
            ]);
            if(request()->hasFile('file')) {
                $file = request()->file('file');
                $fileName ='/uploads/courses/assignment/'. time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/courses/assignment');
                $file->move($destinationPath, $fileName);
                $data['file'] = $fileName;
            }
            $assignments = Course::find($data['course_id'])->assignments()->create(
                [
                    'title' => sanitizeInput($data['title']),
                    'file' => $data['file'],
                    'start_date' => $data['start_date'],
                    'end_date' => $data['end_date'],
                    'status' => $data['status'],
                    'marks' => $data['marks'],
                ]
            );
            return response()->json([
                'data' => $assignments,
                'message' => 'Assignment added successfully!',
                'status' => 'success'
            ], 200);
        }
    }

    public function updateAssignment() {
        //if ajax request then update data
        if(request()->ajax()) {
            $data = request()->validate([
                'course_id' => 'required',
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'status' => 'nullable',
                'marks' => 'required',
            ]);
            $data['title'] = sanitizeInput($data['title']);
            $data['start_date'] = $data['start_date'];
            $data['end_date'] = $data['end_date'];
            $data['status'] = $data['status'];
            $data['marks'] = $data['marks'];
           
            $assignments = Course::find($data['course_id'])->assignments()
            ->where('id', request()->assignment_id);

            
            if(request()->hasFile('file')) {
                $file = request()->file('file');
                 $fileName = '/uploads/courses/assignment/' . time() . '.' . $file->getClientOriginalExtension();
                 $destinationPath = public_path('/uploads/courses/assignment');
                 $file->move($destinationPath, $fileName);
                 // Unlink old file if it exists
                 if ($assignments->first()->file && file_exists(public_path($assignments->first()->file))) {
                     unlink(public_path($assignments->first()->file));
                 }
                 $data['file'] = $fileName;
             }

            $assignments->update($data);

            return response()->json([
                'data' => $assignments,
                'message' => 'Assignment updated successfully!',
                'status' => 'success'
            ], 200);
        }
    }

    

    public function deleteAssignment() {
        if(request()->ajax()) {
            $assignment = Course::find(request()->course_id)->assignments()->where('id', request()->assignment_id)->first();
            //unlink old file
            if($assignment->file) {
                if (file_exists(public_path($assignment->file)) && !empty($assignment->file)) {
                    unlink(public_path($assignment->file));
                }
            }
            if($assignment) {
                $assignment->delete();
                return response()->json([
                    'message' => 'Resource deleted successfully!',
                    'status' => 'success'
                ], 200);
            }
        }
    }
}
