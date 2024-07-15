<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class WhyController extends Controller
{
    public function index()
    {
        $whyData = SystemSetting::where('key', 'about_why')->first();
        if(!$whyData){
            $why = [
                'sub_title' => '',
                'title' => '',
                'description' => '',
                'why_button_1' => '',
                'why_button_url_1' => '',
                'why_button_2' => '',
                'why_button_url_2' => '',
                'image1' => '',
            ];
            return view('backend.pages.about.why', compact('why'));
        }
        $why = json_decode($whyData->value,true);
        return view('backend.pages.about.why', compact('why'));
    }

    public function update(Request $request) {
        $why = SystemSetting::where('key', 'about_why')->first();

        if(!$why){
            $data = [
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'description' => $request->description,
                'why_button_1' => $request->why_button_1,
                'why_button_url_1' => $request->why_button_url_1,
                'why_button_2' => $request->why_button_2,
                'why_button_url_2' => $request->why_button_url_2,
            ];

            if($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/about/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/about');
                $image1_file->move($destinationPath, $image1);
                $data['image1'] = $image1;
            }

            SystemSetting::create([
                'key' => 'about_why',
                'value' => json_encode($data)
            ]);

            return redirect()->back()->with('success', 'Why updated successfully');
        }else{
            $why = json_decode($why->value,true);
            $data = [
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'description' => $request->description,
                'why_button_1' => $request->why_button_1,
                'why_button_url_1' => $request->why_button_url_1,
                'why_button_2' => $request->why_button_2,
                'why_button_url_2' => $request->why_button_url_2,
            ];

            if($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/about/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/about');
                $image1_file->move($destinationPath, $image1);
                $data['image1'] = $image1;
            }else{
                $data['image1'] = $why['image1'];
            }

            SystemSetting::where('key', 'about_why')->update([
                'value' => json_encode($data)
            ]);

            return redirect()->back()->with('success', 'Why updated successfully');
        }
    }

}
