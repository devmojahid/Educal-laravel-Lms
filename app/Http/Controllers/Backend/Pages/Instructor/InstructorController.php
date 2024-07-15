<?php

namespace App\Http\Controllers\Backend\Pages\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\InsructorApply;

class InstructorController extends Controller
{
    public function index()
    {
        $instructorData = SystemSetting::where('key', 'become_instructor')->first();
        if($instructorData){
            $instructor = json_decode($instructorData->value,true);
        }else{
            $instructor = [];
        }
        $instructorItem = InsructorApply::OrderBy("id","desc")->get();
        
        return view('backend.pages.instructor.become_instructor.index', compact('instructor', 'instructorItem'));
    }

    public function update(Request $request)
    {
        $instructor = SystemSetting::where('key', 'become_instructor')->first();
        if(!$instructor){
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            SystemSetting::create([
                'key' => 'become_instructor',
                'value' => sanitizeJsonInput(json_encode($data))
            ]);
            return redirect()->back()->with('success', 'Instructor data updated successfully');
        }else{
            $instructorData = json_decode($instructor->value, true);
            $instructorData['title'] = $request->title;
            $instructorData['description'] = $request->description;

            $instructor->value = sanitizeJsonInput(json_encode($instructorData));
            $instructor->save();
            return redirect()->back()->with('success', 'Instructor data updated successfully');
        }
        $instructor = [
            'title' => $request->title,
            'description' => $request->description,
        ];
    }

    //items add
    public function itemsStore(Request $request)
    {
        if($request->updateId != null) {
            return $this->itemsUpdate($request, $request->updateId);
        }

        $request->validate([
            'button_text' => 'required',
            'bg_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('bg_image');
        $imageName = time().'.'.$image->extension();
        $destinationPath = public_path('/uploads/instructor');
        $image->move($destinationPath, $imageName);

        $instructor = new InsructorApply();
        $instructor->button_text = $request->button_text;
        $instructor->bg_image = '/uploads/instructor/' . $imageName;
        $instructor->save();

        return redirect()->back()->with('success', 'Instructor item added successfully');
    }

    public function itemsUpdate(Request $request, $id)
    {
        $request->validate([
            'button_text' => 'required',
            'bg_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $instructor = InsructorApply::find($id);
        $instructor->button_text = $request->button_text;
        if($request->file('bg_image')){
            $image = $request->file('bg_image');
            $imageName = time().'.'.$image->extension();
            $destinationPath = public_path('/uploads/instructor');
            $image->move($destinationPath, $imageName);
            $instructor->bg_image = '/uploads/instructor/' . $imageName;
        }
        $instructor->save();

        return redirect()->back()->with('success', 'Instructor item updated successfully');
    }

    public function itemsEdit($id)
    {
        $instructorData = SystemSetting::where('key', 'become_instructor')->first();
        if($instructorData){
            $instructor = json_decode($instructorData->value,true);
        }else{
            $instructor = [];
        }
        $instructorItem = InsructorApply::OrderBy("id","desc")->get();
        $item = InsructorApply::find($id);
        return view('backend.pages.instructor.become_instructor.index', compact('instructor', 'instructorItem', 'item'));
    }

    public function itemsDelete(Request $request)
    {
        $instructor = InsructorApply::find($request->id);
        if($instructor->bg_image){
            unlink(public_path($instructor->bg_image));
        }
        $instructor->delete();
        return response()->json(['status' => 'success', 'message' => 'Instructor item deleted successfully']);
    }
}