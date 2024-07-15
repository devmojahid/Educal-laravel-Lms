<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class BannerController extends Controller
{
    public function getBanner() {
        $banner = [];
        if(SystemSetting::where('key', 'about_banner')->exists()) {
            $bannerData = SystemSetting::where('key', 'about_banner')->first();
            $banner = json_decode($bannerData->value, true);
        }
        return $banner;
    }
    public function index() {
        $banner = [];
        if($this->getBanner()){
            $banner = $this->getBanner();
        }

        return view('backend.pages.about.banner.index', compact('banner'));
    }

    public function store(Request $request) {
       if($request->updateId != null) {
           return $this->update($request, $request->updateId);
        }
        $side_image = null;
        if($request->hasFile('sideImage')) {
            $side_image_file = $request->file('sideImage');
            $side_image = '/uploads/banner/' . time() .'.' . $side_image_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/banner');
            $side_image_file->move($destinationPath, $side_image);
        }

        $bg_image = null;
        if($request->hasFile('bgImage')) {
            $bg_image_file = $request->file('bgImage');
            $bg_image = '/uploads/banner/' . time() . "2" .'.' . $bg_image_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/banner');
            $bg_image_file->move($destinationPath, $bg_image);
        }
        
        $data = [
            'sub_title' => $request->subTitle,
            'title' => $request->title,
            'button_title' => $request->buttonTitle,
            'button_url' => $request->buttonUrl,
            'side_image' => $side_image,
            'bg_image' => $bg_image,
        ];

        //insert data 
        if(SystemSetting::where('key', 'about_banner')->exists()) {
            $banner = SystemSetting::where('key', 'about_banner')->first();
            $banners = json_decode($banner->value, true);
            if($banners == null){
                $banners = [];
            }
            $data['id'] = rand(100000, 999999);
            array_push($banners, $data);
            $banner->value = json_encode($banners);
            $banner->save();
        } else {
            $data['id'] = rand(100000, 999999);
            $banner = new SystemSetting();
            $banner->key = 'about_banner';
            $banner->value = json_encode([$data]);
            $banner->save();
        }

        return redirect()->back()->with('success', 'Banner Created successfully');
    }

    //edit banner
    public function edit($id) {
        $item = [];
        if($this->getBanner()){
            $item = $this->getBanner();
        }

        $item = array_filter($item, function($single) use($id) {
            return $single['id'] == $id;
        });

        $item = array_values($item);
        $item = $item[0];

        $banner = [];
        if($this->getBanner()){
            $banner = $this->getBanner();
        }

        return view('backend.pages.about.banner.index', compact('item', 'banner'));
    }

    public function update(Request $request, $id)
{
    // Fetch the existing banner data
    $banner = SystemSetting::where('key', 'about_banner')->first();

    if (!$banner) {
        // Handle the case where 'banner' key does not exist, create a new record
        $bannerData = [
            'id' => $id,
            'sub_title' => $request->subTitle,
            'title' => $request->title,
            'button_title' => $request->buttonTitle,
            'button_url' => $request->buttonUrl,
        ];

        if ($request->hasFile('sideImage')) {
            // Handle the new sideImage upload
            $side_image_file = $request->file('sideImage');
            $side_image = '/uploads/banner/' . time() . '.' . $side_image_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/banner');
            $side_image_file->move($destinationPath, $side_image);
            $bannerData['side_image'] = $side_image;
        }

        if ($request->hasFile('bgImage')) {
            // Handle the new bgImage upload
            $bg_image_file = $request->file('bgImage');
            $bg_image = '/uploads/banner/' . time() . "2" . '.' . $bg_image_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/banner');
            $bg_image_file->move($destinationPath, $bg_image);
            $bannerData['bg_image'] = $bg_image;
        }

        $newBannerData = [$bannerData];

        // Create a new 'banner' record in the SystemSetting table
        SystemSetting::create([
            'key' => 'about_banner',
            'value' => json_encode($newBannerData),
        ]);
    } else {
        // Handle the case where 'banner' key already exists
        $banners = json_decode($banner->value, true);

        // Find and update the specific banner
        foreach ($banners as $key => $value) {
            if ($value['id'] == $id) {
                // Update the banner data
                $banners[$key]['sub_title'] = $request->subTitle;
                $banners[$key]['title'] = $request->title;
                $banners[$key]['button_title'] = $request->buttonTitle;
                $banners[$key]['button_url'] = $request->buttonUrl;

                if ($request->hasFile('sideImage')) {
                    // Handle the new sideImage upload
                    $side_image_file = $request->file('sideImage');
                    $side_image = '/uploads/banner/' . time() . '.' . $side_image_file->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/banner');
                    $side_image_file->move($destinationPath, $side_image);
                    $banners[$key]['side_image'] = $side_image;
                }

                if ($request->hasFile('bgImage')) {
                    // Handle the new bgImage upload
                    $bg_image_file = $request->file('bgImage');
                    $bg_image = '/uploads/banner/' . time() . "2" . '.' . $bg_image_file->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/banner');
                    $bg_image_file->move($destinationPath, $bg_image);
                    $banners[$key]['bg_image'] = $bg_image;
                }

                break; // Terminate the loop once the banner is found and updated
            }
        }

        // Update the 'banner' key in the SystemSetting table
        $banner->value = json_encode($banners);
        $banner->save();
    }

    return redirect()->back()->with('success', 'Banner Updated successfully');
}


    public function delete(Request $request) {
        $id = $request->id;
        if(SystemSetting::where('key', 'about_banner')->exists()) {
            $banner = SystemSetting::where('key', 'about_banner')->first();
            $banners = json_decode($banner->value, true);
            foreach($banners as $key => $value) {
                if($value['id'] == $id) {
                    unset($banners[$key]);
                }
            }
            $banner->value = json_encode($banners);
            $banner->save();
        }

        return response()->json([
            'status'=>'success',
            'message'=>'Banner deleted successfully'
        ]);
    }
}
