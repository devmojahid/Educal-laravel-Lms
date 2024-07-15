<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MakeInstructorController extends Controller
{
    public function index()
    {
        return view('frontend.pages.make-instructor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:10000',
        ],
        [
            'cv.required' => 'Please upload your CV',
            'cv.mimes' => 'Please upload your CV in PDF format',
            'cv.max' => 'Please upload your CV in PDF format and maximum size is 10MB',
        ]);
        $cv_name = null;
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cv_name =  '/uploads/instructor/'. time() . '.' . $cv->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/instructor');
            $cv->move($destinationPath, $cv_name);
        }

        try {
            $user_id = $request->user_id;
            $user = User::find($user_id);
            $user->cv = $cv_name;
            $user->save();
            return redirect()->back()->with('success', 'Your application has been submitted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
