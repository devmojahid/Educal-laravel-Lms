<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class HeroController extends Controller
{
    public function index()
    {
        $heroData = SystemSetting::where('key', 'hero_sliders')->first();

        if ($heroData) {
            $hero = json_decode($heroData->value, true);
            return view('backend.pages.home.hero', compact('hero'));
        } else {
            return view('backend.pages.home.hero', ['hero' => []]); // Provide a default value or handle it accordingly
        }
    }

    public function update(Request $request)
    {
        $hero = SystemSetting::where('key', 'hero_sliders')->first();

        if (!$hero) {
            $data = [
                'hero_title' => $request->title,
                'hero_subtitle' => $request->subtitle,
                'hero_discription' => $request->discription,
                'hero_button_text' => $request->buttonTitle,
                'hero_button_link' => $request->buttonUrl,
                'hero_shapes' => $request->shapes ?? "off",
                'hero_info_title' => $request->heroInfoTitle,
                'hero_info_discription' => $request->heroInfoDesc,

            ];

            if ($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/hero/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/hero');
                $image1_file->move($destinationPath, $image1);
                $data['image1'] = $image1;
            }
            if ($request->hasFile('image2')) {
                $image2_file = $request->file('image2');
                $image2 = '/uploads/hero/' . time() . "2" . '.' . $image2_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/hero');
                $image2_file->move($destinationPath, $image2);
                $data['image2'] = $image2;
            }

            SystemSetting::create([
                'key' => 'hero_sliders',
                'value' => json_encode($data)
            ]);

            return redirect()->back()->with('success', 'Hero updated successfully');
        } else {
            $heros = json_decode($hero->value, true);
            $heros['hero_title'] = $request->title;
            $heros['hero_subtitle'] = $request->subtitle;
            $heros['hero_discription'] = $request->discription;
            $heros['hero_button_text'] = $request->buttonTitle;
            $heros['hero_button_link'] = $request->buttonUrl;
            $heros['hero_shapes'] = $request->shapes ?? "off";
            $heros['hero_info_title'] = $request->heroInfoTitle;
            $heros['hero_info_discription'] = $request->heroInfoDesc;

            if ($request->hasFile('image1')) {
                $image1_file = $request->file('image1');
                $image1 = '/uploads/hero/' . time() . '.' . $image1_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/hero');
                $image1_file->move($destinationPath, $image1);
                $heros['image1'] = $image1;
            }
            if ($request->hasFile('image2')) {
                $image2_file = $request->file('image2');
                $image2 = '/uploads/hero/' . time() . "2" . '.' . $image2_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/hero');
                $image2_file->move($destinationPath, $image2);
                $heros['image2'] = $image2;
            }

            $hero->value = json_encode($heros);
            $hero->save();

            return redirect()->back()->with('success', 'Hero updated successfully');
        }
    }
}