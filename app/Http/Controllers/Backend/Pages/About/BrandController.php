<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use PHPUnit\Event\Telemetry\System;

class BrandController extends Controller
{
    public function getBrand() {
        $brand = [];
        if(SystemSetting::where('key', 'brand')->exists()) {
            $brandData = SystemSetting::where('key', 'brand')->first();
            $brand = json_decode($brandData->value, true);
        }
        return $brand;
    }

    public function index() {
        $brand = [];
        if($this->getBrand()){
            $brand = $this->getBrand();
        }
        return view('backend.pages.about.brand.index', compact('brand'));
    }

    public function store(Request $request) {
        if($request->updateId != null) {
            return $this->update($request, $request->updateId);
        }

        $data = [
            'url' => $request->url,
        ];
        if($request->hasFile('logo')) {
            $image_file = $request->file('logo');
            $image = '/uploads/brand/' . time() .'.' . $image_file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/brand');
            $image_file->move($destinationPath, $image);
            $data['logo'] = $image;
        }

        //insert data 
        if(SystemSetting::where('key', 'brand')->exists()) {
            $brand = SystemSetting::where('key', 'brand')->first();
            $brands = json_decode($brand->value, true);
            if($brands == null){
                $brands = [];
            }
            $data['id'] =rand(100000, 999999);
            array_push($brands, $data);
            $brand->value = json_encode($brands);
            $brand->save();
        } else {
            $data['id'] = rand(100000, 999999);
            $brand = new SystemSetting();
            $brand->key = 'brand';
            $brand->value = json_encode([$data]);
            $brand->save();
        }

        return redirect()->back()->with('success', 'Brand added successfully');
    }

    public function edit($id) {
        $brand = [];
        if($this->getBrand()){
            $brand = $this->getBrand();
        }
        $item = collect($brand)->where('id', $id)->first();
        return view('backend.pages.about.brand.index', compact(['item', 'brand']));
    }


    public function update(Request $request, $id) {
        $brand = SystemSetting::where('key', 'brand')->first();
        if(!$brand){
            $data = [
                'url' => $request->url,
            ];
            if($request->hasFile('logo')) {
                $image_file = $request->file('logo');
                $image = '/uploads/brand/' . time() .'.' . $image_file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/brand');
                $image_file->move($destinationPath, $image);
                $data['logo'] = $image;
            }
            $brand = new SystemSetting();
            $brand->key = 'brand';
            $brand->value = json_encode([$data]);
            $brand->save();
        }else{
            $brands = json_decode($brand->value, true);
            foreach($brands as $key => $value) {
                if($value['id'] == $id) {
                    $brands[$key]['url'] = $request->url;
                    if($request->hasFile('logo')) {
                        $image_file = $request->file('logo');
                        $image = '/uploads/brand/' . time() .'.' . $image_file->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/brand');
                        $image_file->move($destinationPath, $image);
                        $brands[$key]['logo'] = $image;
                    }
                }
            }
            $brand->value = json_encode($brands);
            $brand->save();
        }
        return redirect()->back()->with('success', 'Brand updated successfully');
    }

    
    public function delete() {
        $id = request()->id;
        if(SystemSetting::where('key', 'brand')->exists()) {
            $brand = SystemSetting::where('key', 'brand')->first();
            $brands = json_decode($brand->value, true);
            foreach($brands as $key => $value) {
                if($value['id'] == $id) {
                    unset($brands[$key]);
                }
            }
            $brand->value = json_encode($brands);
            $brand->save();
        }

        return response()->json([
            'status'=>'success',
            'message'=>'Brand deleted successfully'
        ]);
    }

}
