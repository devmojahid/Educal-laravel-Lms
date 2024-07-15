<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class SiteController extends Controller
{
    // home page
    public function home()
    {
        return view("frontend.pages.home");
    }
    // about page
    public function about()
    {
        return view("frontend.pages.about");
    }
    // course page
    public function course()
    {
        return view("frontend.pages.course");
    }
    // course details page
    public function courseDetails()
    {
        return view("frontend.pages.course-details");
    }
    // contact page
    public function contact()
    {
        return view("frontend.pages.contact");
    }

    // contact submit
    public function contactSubmit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:5',
        ]);

        Mail::to($data['email'])->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    // instructor page
    public function instructor()
    {
        $instructors = User::whereIn('usertype', ['instructor', 'admin'])->get();
        return view("frontend.pages.instructor", compact('instructors'));
    }

    // instructor details page
    public function instructorDetails($id)
    {
        $instructor = User::with("courses")->whereIn('usertype', ['instructor', 'admin'])->where('id', $id)->first();
        return view("frontend.pages.instructor-details", compact('instructor'));
    }

    // cart page
    public function cart()
    {
        return view("frontend.pages.cart");
    }


    // login page
    public function login()
    {
        return view("frontend.pages.login");
    }

    // register page
    public function register()
    {
        return view("frontend.pages.register");
    }
}
