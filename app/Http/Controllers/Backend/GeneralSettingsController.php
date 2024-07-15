<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
class GeneralSettingsController extends Controller
{
    public function generalSetting() {
        $categories = \App\Models\CourseCategory::where('status', 'active')->get();
        return view('backend.setting.general-setting', compact('categories'));
    }

    public function generalSettingUpdate(Request $request,$key) {
        $setting = SystemSetting::where('key', $key)->first();
        $data = [
            $key.'_shape' => $request->{$key.'_shape'} ?? "off",
            $key.'_categories' => $request->{$key.'_categories'} ?? [],
            $key.'_title' => $request->{$key.'_title'} ?? "",
            $key.'_description' => $request->{$key.'_description'} ?? "",
            $key.'_cta_title' => $request->{$key.'_cta_title'} ?? "",
            $key.'_cta_btn_text' => $request->{$key.'_cta_btn_text'} ?? "",
            $key.'_cta_btn_link' => $request->{$key.'_cta_btn_link'} ?? "",
            $key.'_main_desc' => $request->{$key.'_main_desc'} ?? "",
            $key.'_copy_right' => $request->{$key.'_copy_right'} ?? "",
            $key.'_facebook' => $request->{$key.'_facebook'} ?? "",
            $key.'_twitter' => $request->{$key.'_twitter'} ?? "",
            $key.'_pinterest' => $request->{$key.'_pinterest'} ?? "",
            $key.'_office_address' => $request->{$key.'_office_address'} ?? "",
            $key.'_email_one' => $request->{$key.'_email_one'} ?? "",
            $key.'_email_two' => $request->{$key.'_email_two'} ?? "",
            $key.'_phone_one' => $request->{$key.'_phone_one'} ?? "",
            $key.'_phone_two' => $request->{$key.'_phone_two'} ?? "",
        ];

        foreach (['logo','logo_2','favicon',"main_logo","auth_template_image","breadcrumb_image"] as $imageField) {
            if ($request->hasFile("{$key}_{$imageField}")) {
                $imageFile = $request->file("{$key}_{$imageField}");
                $imageName = "/uploads/{$key}/" . time() . "_{$imageField}." . $imageFile->getClientOriginalExtension();
                $destinationPath = public_path("/uploads/{$key}");
                $imageFile->move($destinationPath, $imageName);
                $data["{$key}_{$imageField}"] = $imageName;
            }
        }

        if($setting){
            $settings = json_decode($setting->value,true);
            $settings = array_merge($settings,$data);
            $setting->update([
                'value' =>  sanitizeJsonInput(json_encode($settings))
            ]);
        } else {
           SystemSetting::create([
                'key' => $key,
                'value' =>  sanitizeJsonInput(json_encode($data))
            ]);
        }
        return redirect()->back()->with('success', 'General settings updated successfully');
    }
}