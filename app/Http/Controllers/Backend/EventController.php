<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('backend.event.index', compact('events'));
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'ticket_price' => 'required',
            'ticket_discount_price' => 'nullable|numeric|lt:ticket_price',
        ],
        [
            'ticket_discount_price.lt' => 'The discount price must be less than ticket price.',
        ]
    );

        $event = new Event();
        // speaker image similar to upper code
        if ($request->hasFile('speaker_image')) {
            $speaker_image = $request->file('speaker_image');
            $speaker_image_name = '/uploads/events/speaker/' . time() . "." . $speaker_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/speaker/');
            $speaker_image->move($destinationPath, $speaker_image_name);
            $event->speaker_image = $speaker_image_name;
        }

        if ($request->hasFile('sponsor_logo')) {
            $sponsor_logo = $request->file('sponsor_logo');
            $sponsor_logo_name = '/uploads/events/sponsor/' . time() . "." . $sponsor_logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/sponsor/');
            $sponsor_logo->move($destinationPath, $sponsor_logo_name);
            $event->sponsor_logo = $sponsor_logo_name;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = '/uploads/events/' . time() . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/');
            $image->move($destinationPath, $image_name);
            $event->image = $image_name;
        }
        $event->title = $request->title;
        $event->description = sanitizeInput($request->description);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->ticket_price = $request->ticket_price;
        $event->ticket_discount_price = $request->ticket_discount_price;
        $event->speaker_name = $request->speaker_name;
        $event->speaker_designation = $request->speaker_designation;
        $event->sponsor_name = $request->sponsor_name;
        $event->sponsor_website = $request->sponsor_website;
        $event->sponsor_email = $request->sponsor_email;
        $event->sponsor_phone = $request->sponsor_phone;
        $event->sponsor_facebook = $request->sponsor_facebook;
        $event->sponsor_twitter = $request->sponsor_twitter;
        $event->sponsor_pinterest = $request->sponsor_pinterest;
        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('backend.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'ticket_price' => 'required',
            'ticket_discount_price' => 'nullable|numeric|lt:ticket_price'
        ]);

        $event = Event::find($id);
        if ($request->hasFile('speaker_image')) {
            //unlink old image
            if (file_exists(public_path($event->speaker_image)) && !empty($event->speaker_image)) {
                unlink(public_path($event->speaker_image));
            }
            $speaker_image = $request->file('speaker_image');
            $speaker_image_name = '/uploads/events/speaker/' . time() . "." . $speaker_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/speaker/');
            $speaker_image->move($destinationPath, $speaker_image_name);
            $event->speaker_image = $speaker_image_name;
        }
        if ($request->hasFile('sponsor_logo')) {
            //unlink old image
            if (file_exists(public_path($event->sponsor_logo)) && !empty($event->sponsor_logo)) {
                unlink(public_path($event->sponsor_logo));
            }
            $sponsor_logo = $request->file('sponsor_logo');
            $sponsor_logo_name = '/uploads/events/sponsor/' . time() . "." . $sponsor_logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/sponsor/');
            $sponsor_logo->move($destinationPath, $sponsor_logo_name);
            $event->sponsor_logo = $sponsor_logo_name;
        }
        if ($request->hasFile('image')) {
            //unlink old image
            if (file_exists(public_path($event->image)) && !empty($event->image)) {
                unlink(public_path($event->image));
            }
            $image = $request->file('image');
            $image_name = '/uploads/events/' . time() . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/events/');
            $image->move($destinationPath, $image_name);
            $event->image = $image_name;
        }
        $event->title = $request->title;
        $event->description = sanitizeInput($request->description);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->ticket_price = $request->ticket_price;
        $event->ticket_discount_price = $request->ticket_discount_price;
        $event->speaker_name = $request->speaker_name;
        $event->speaker_designation = $request->speaker_designation;
        $event->sponsor_name = $request->sponsor_name;
        $event->sponsor_website = $request->sponsor_website;
        $event->sponsor_email = $request->sponsor_email;
        $event->sponsor_phone = $request->sponsor_phone;
        $event->sponsor_facebook = $request->sponsor_facebook;
        $event->sponsor_twitter = $request->sponsor_twitter;
        $event->sponsor_pinterest = $request->sponsor_pinterest;
        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    public function delete()
    {
        $id = request('id');
        $event = Event::find($id);
        if (file_exists(public_path($event->image)) && !empty($event->image)) {
            unlink(public_path($event->image));
        }
        if (file_exists(public_path($event->speaker_image)) && !empty($event->speaker_image)) {
            unlink(public_path($event->speaker_image));
        }
        if (file_exists(public_path($event->sponsor_logo)) && !empty($event->sponsor_logo)) {
            unlink(public_path($event->sponsor_logo));
        }
        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Course Tag has been deleted !!',
        ]);
    }
}
