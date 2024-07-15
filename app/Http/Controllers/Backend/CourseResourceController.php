<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseResourceController extends Controller
{
    public function getResource($courseId) {
        $resources = Course::find($courseId)->resources;
        return view('backend.course.resource.index', compact('resources', 'courseId'));
    }

    public function storeResource() {
        //if ajax request then store data
        if(request()->ajax()) {
            request()->validate([
                'course_id' => 'required',
                'title' => 'required',
                'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar',
            ]);
            $data = [
                'course_id' => request()->course_id,
                'title' => sanitizeInput(request()->title),
            ];
            if(request()->hasFile('file')) {
                $file = request()->file('file');
                $fileName ='/uploads/courses/resource/'. time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/courses/resource');
                $file->move($destinationPath, $fileName);
                $data['file'] = $fileName;
            }
            $resource = Course::find($data['course_id'])->resources()->create($data);
            return response()->json([
                'data' => $resource,
                'message' => 'Resource added successfully!',
                'status' => 'success'
            ], 200);
        }
    }

    public function loadAllData() {
        if(request()->ajax()) {
            $resources = Course::find(request()->course_id)->resources;
            return response()->json([
                'data' => $resources,
                'message' => 'Resources loaded successfully!',
                'status' => 'success'
            ], 200);
        }
    }

    public function updateResource() {
        if(request()->ajax()) {
            request()->validate([
                'course_id' => 'required',
                'title' => 'required',
                'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar',
            ]);
            $data = [
                'course_id' => request()->course_id,
                'title' => sanitizeInput(request()->title),
            ];
            if(request()->hasFile('file')) {
                $file = request()->file('file');
                $fileName ='/uploads/courses/resource/'. time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/courses/resource');
                $file->move($destinationPath, $fileName);
                $data['file'] = $fileName;
            }
            $resource = Course::find($data['course_id'])->resources()->where('id', request()->resource_id)->first();
            //unlike old file
            if($resource->file) {
                unlink(public_path($resource->file));
            }
            if($resource) {
                $resource->update($data);
                return response()->json([
                    'data' => $resource,
                    'message' => 'Resource updated successfully!',
                    'status' => 'success'
                ], 200);
            }
        }

    }

    public function deleteResource() {
        if(request()->ajax()) {
            $resource = Course::find(request()->course_id)->resources()->where('id', request()->resource_id)->first();
            if($resource->file != null && file_exists(public_path($resource->file))  && !empty($resource->file)){
                unlink(public_path($resource->file));
            }
            if($resource) {
                $resource->delete();
                return response()->json([
                    'message' => 'Resource deleted successfully!',
                    'status' => 'success'
                ], 200);
            }
        }
    }
}
