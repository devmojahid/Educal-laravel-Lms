<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = SystemSetting::where('key', 'about_about')->first();
        if (!$aboutData) {
            $aboutData = new SystemSetting;
            $aboutData->key = 'about_about';
            $aboutData->value = json_encode(['title' => 'About Us', 'description' => 'This is about us description', 'button_title' => 'Learn More', 'button_url' => '#', 'skillTitle' => 'Our Skills']);
            $aboutData->save();
        }
        $about = json_decode($aboutData->value, true);
        return view('backend.pages.about.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = SystemSetting::where('key', 'about_about')->first();

        if (!$about) {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'button_title' => $request->buttonTitle,
                'button_url' => $request->buttonUrl,
                'skillTitle' => $request->skillTitle,
            ];

            if ($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/about/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/about');
                $image1_file->move($destinationPath, $image1);
                $data['image1'] = $image1;
            }

            SystemSetting::create([
                'key' => 'about_about',
                'value' => json_encode($data)
            ]);

            return redirect()->back()->with('success', 'About updated successfully');
        } else {
            $abouts = json_decode($about->value, true);
            $abouts['title'] = $request->title;
            $abouts['description'] = $request->description;
            $abouts['button_title'] = $request->buttonTitle;
            $abouts['button_url'] = $request->buttonUrl;
            $abouts['skillTitle'] = $request->skillTitle;

            if ($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/about/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/about');
                $image1_file->move($destinationPath, $image1);
                $abouts['image1'] = $image1;
            }

            $about->value = json_encode($abouts);
            $about->save();

            return redirect()->back()->with('success', 'About updated successfully');
        }
    }
}