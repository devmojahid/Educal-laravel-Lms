<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class PricePlanController extends Controller
{
    public function index()
    {
        if(SystemSetting::where('key', 'home_price_plan')->exists()) {
            $pricePlanData = SystemSetting::where('key', 'home_price_plan')->first();
            $prices = json_decode($pricePlanData->value,true);
        } else {
            $prices = [];
        }
        return view('backend.pages.home.price-plan', compact('prices'));
    }

    public function update(Request $request) {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if(SystemSetting::where('key', 'home_price_plan')->exists()) {
            $home_price_plan = SystemSetting::where('key', 'home_price_plan')->first();
            $home_price_plan->value = json_encode($data);
            $home_price_plan->save();
        } else {
            $home_price_plan = new SystemSetting;
            $home_price_plan->key = 'home_price_plan';
            $home_price_plan->value = json_encode($data);
            $home_price_plan->save();
        }

        return redirect()->back()->with('success', 'Price Plan updated successfully');
    }
}
