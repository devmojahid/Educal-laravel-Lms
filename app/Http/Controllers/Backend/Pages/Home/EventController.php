<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class EventController extends Controller
{
    public function index()
    {
        if(SystemSetting::where('key', 'home_event')->exists()) {
            $eventData = SystemSetting::where('key', 'home_event')->first();
            $event = json_decode($eventData->value,true);
        } else {
            $event = [];
        }
        return view('backend.pages.home.event', compact(['event']));
    }

    public function update(Request $request) {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if(SystemSetting::where('key', 'home_event')->exists()) {
            $home_event = SystemSetting::where('key', 'home_event')->first();
            $home_event->value = json_encode($data);
            $home_event->save();
        } else {
            $home_event = new SystemSetting;
            $home_event->key = 'home_event';
            $home_event->value = json_encode($data);
            $home_event->save();
        }

        return redirect()->back()->with('success', 'Event updated successfully');
    }
}
