<?php

namespace App\Http\Controllers\Backend\Pages\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\InsructorBanner;

class InstructorServiceController extends Controller
{
    public function serviceIndex()
    {
        $instructorData = SystemSetting::where('key', 'instructor_service')->first();
        if($instructorData){
            $instructor = json_decode($instructorData->value,true);
        }else{
            $instructor = [];
        }
        $instructorItem = InsructorBanner::OrderBy("id","desc")->get();
        
        return view('backend.pages.instructor.become_instructor_service.index', compact('instructor', 'instructorItem'));
    }

    public function update(Request $request)
    {
        $instructor = SystemSetting::where('key', 'instructor_service')->first();
        if(!$instructor){
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            SystemSetting::create([
                'key' => 'instructor_service',
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
            'title'       => 'required',
            'description' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'icon'        => 'nullable',
            'bg_color'    => 'required',
        ]);

        $instructor = new InsructorBanner();
        $instructor->title = $request->title;
        $instructor->description = $request->description;
        $instructor->button_text = $request->button_text;
        $instructor->button_link = $request->button_link;
        if ($request->hasFile('icon')){
            $icon = $request->file('icon');
            $icon_name = "/uploads/system/instructor/".time().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('/uploads/system/instructor/'), $icon_name);
            $instructor->icon = $icon_name;
        }
        $instructor->bg_color = $request->bg_color;
        $instructor->save();

        return redirect()->back()->with('success', 'Instructor item added successfully');
    }

    public function itemsUpdate(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'icon'        => 'nullable',
            'bg_color'    => 'required',
        ]);

        $instructor = InsructorBanner::find($id);
        $instructor->title = $request->title;
        $instructor->description = $request->description;
        $instructor->button_text = $request->button_text;
        $instructor->button_link = $request->button_link;
        if ($request->hasFile('icon')){
            if($instructor->icon != null && file_exists(public_path($instructor->icon))){
                unlink(public_path($instructor->icon));
            }
            $icon = $request->file('icon');
            $icon_name = "/uploads/system/instructor/".time().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('/uploads/system/instructor/'), $icon_name);
            $instructor->icon = $icon_name;
        }
        $instructor->bg_color = $request->bg_color;
        $instructor->save();

        return redirect()->back()->with('success', 'Instructor item updated successfully');
    }

    public function itemsEdit($id)
    {
        $instructorData = SystemSetting::where('key', 'instructor_service')->first();
        if($instructorData){
            $instructor = json_decode($instructorData->value,true);
        }else{
            $instructor = [];
        }
        $instructorItem = InsructorBanner::OrderBy("id","desc")->get();
        $item = InsructorBanner::find($id);
        return view('backend.pages.instructor.become_instructor_service.index', compact('instructor', 'instructorItem', 'item'));
    }

    public function itemsDelete(Request $request)
    {
        $instructor = InsructorBanner::find($request->id);
        if($instructor->bg_image){
            unlink(public_path($instructor->bg_image));
        }
        $instructor->delete();
        return response()->json(['status' => 'success', 'message' => 'Instructor item deleted successfully']);
    }
}