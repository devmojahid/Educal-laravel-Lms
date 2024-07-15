<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class InstructorController extends Controller
{
    public function allInstructor()
    {
        $users = User::where('usertype', "instructor")->get();
        return view('backend.user.user.index', compact('users'));
    }

    public function pendingInstructor()
    {
        $users = User::where('usertype','<>' ,"instructor")->where('cv',"<>", null)->get();
        $pendingInstructor = true;
        return view('backend.user.user.index', compact(['users','pendingInstructor']));
    }

    public function pendingInstructorDetails($id) {
        $admin = User::find($id);
        $pendingInstructor = true;
        return view('backend.setting.admin-profile', compact(['admin','pendingInstructor']));
    }

    public function approveInstructor($id) {
        $instrucator = User::find($id);
        $instrucator->usertype = "instructor";
        $instrucator->assignRole('instructor');
        $instrucator->save();
        return redirect()->route('all.instructor')->with('success', 'Instructor Approved Successfully');
    }
}
