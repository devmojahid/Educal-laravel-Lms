<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Jobs\BulkNewsLetterMailJob;


class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        return view('backend.newsletter.index', compact('newsletters'));
    }

    public function subscribe(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:newsletters,email'
            ],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Email must be valid',
                'email.unique' => 'Email already subscribed'
            ]
        );


        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        return redirect()->back()->with('success', 'You have subscribed successfully');
    }

    public function delete(Request $request)
    {
        $id =  $request->id;
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Course Tag has been deleted !!',
        ]);
    }

    public function bulkEmail()
    {
        $subscribers = Newsletter::all();
        return view('backend.newsletter.bulk-email', compact('subscribers'));
    }

    public function sendMail(Request $request)
    {
        $data = [
            'subscriberes' => $request->subscriberes,
            'subject' => $request->subject,
            'message' => $request->body,
        ];

        $subscribers = $request->subscriberes;
        foreach ($subscribers as $subscriber) {
            BulkNewsLetterMailJob::dispatch($subscriber, $request->subject, $request->body);
        }

        return redirect()->back()->with('success', 'Mail has been sent successfully');
    }
}