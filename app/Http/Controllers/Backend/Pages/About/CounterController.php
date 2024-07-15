<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class CounterController extends Controller
{
    public function index()
    {
        $counterData = SystemSetting::where('key', 'about_counter')->first();
        if(isset($counterData->value)){
            $counters = json_decode($counterData->value,true);
        }else{
            $counters = [
                'title' => '',
                'description' => '',
                'counter_icon' => [],
                'counter_amount' => [],
                'counter_desc' => [],
            ];
        }
        
        return view('backend.pages.about.counter.index', compact('counters'));
    }

    public function update(Request $request) {
        $counter = SystemSetting::where('key', 'about_counter')->first();
        if(!$counter){
            $data = [
                'title' => $request->title,
                'description' => $request->description,
            ];
            $counters = $request->file('counter_icon');
            if($request->hasFile('counter_icon')){
                $counter_icon = [];
                foreach($counters as $key => $icon){
                    $icon_name = time().$key.'.'.$icon->getClientOriginalExtension();
                    $icon->move(public_path('/uploads/system/counter/'), $icon_name);
                    $counter_icon[] = '/uploads/system/counter/'.$icon_name;
                }
                $data['counter']['counter_icon'] = $counter_icon;
            }
            $data['counter']['counter_amount'] = $request->counter_amount;
            $data['counter']['counter_desc'] = $request->counter_desc;
            SystemSetting::create([
                'key' => 'about_counter',
                'value' => json_encode($data)
            ]);
            return redirect()->back()->with('success', 'Counter updated successfully');
        }else{
            $counterData = json_decode($counter->value, true);
            $counterData['title'] = $request->title;
            $counterData['description'] = $request->description;
            $existingIcons = $counterData['counter']['counter_icon'] ?? [];

            $counters = $request->file('counter_icon');
            if ($request->hasFile('counter_icon')) {
                $counter_icon = $existingIcons; // Start with existing icons
                foreach ($counters as $key => $icon) {
                    $icon_name = time() . $key . '.' . $icon->getClientOriginalExtension();
                    $icon->move(public_path('/uploads/system/counter/'), $icon_name);
                    $newIconPath = '/uploads/system/counter/' . $icon_name;

                    // Check if there's an existing icon to replace
                    if (isset($existingIcons[$key])) {
                        // Replace existing icon path
                        $counter_icon[$key] = $newIconPath;
                    } else {
                        // Add new icon to the array
                        $counter_icon[] = $newIconPath;
                    }
                }
                $counterData['counter']['counter_icon'] = $counter_icon;
            }
            $counterData['counter']['counter_amount'] = $request->counter_amount;
            $counterData['counter']['counter_desc'] = $request->counter_desc;
            $counter->value = json_encode($counterData);
            $counter->save();
            return redirect()->back()->with('success', 'Counter updated successfully');

        }
    }
}