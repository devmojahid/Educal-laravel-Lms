<?php

namespace App\Http\Controllers\Backend\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function getBanner() {
        $testimonial = [];
        if(SystemSetting::where('key', 'testimonial')->exists()) {
            $testimonialData = SystemSetting::where('key', 'testimonial')->first();
            $testimonial = json_decode($testimonialData->value, true);
        }
        return $testimonial;
    }
    public function index() {
        $testimonial = [];
        if($this->getBanner()){
            $testimonial = $this->getBanner();
        }

        $testimonialItem = Testimonial::all();
        return view('backend.pages.about.testimonial.index', compact('testimonial', 'testimonialItem'));
    }

    public function store(Request $request) {
       $testimonial = SystemSetting::where('key', 'testimonial')->first();
         if(!$testimonial){
            $data = [
                'title' => $request->title,
                'videoTitle'=> $request->videoTitle,
                'videoUrl'=> $request->videoUrl,
                'videoDesc'=> $request->videoDesc,
            ];

            SystemSetting::create([
                'key' => 'testimonial',
                'value' => sanitizeJsonInput(json_encode($data))
            ]);
            return redirect()->back()->with('success', 'Testimonial updated successfully');
        }else{
            $testimonialData = json_decode($testimonial->value, true);
            $testimonialData['title'] = $request->title;
            $testimonialData['videoTitle'] = $request->videoTitle;
            $testimonialData['videoUrl'] = $request->videoUrl;
            $testimonialData['videoDesc'] = $request->videoDesc;
            
            $testimonial->value = sanitizeJsonInput(json_encode($testimonialData));
            $testimonial->save();
            return redirect()->back()->with('success', 'Testimonial updated successfully');
        }

    }


    //testimonial items 
    public function testimonialItemStore(Request $request){
        if($request->updateId != null) {
            return $this->testimonialItemUpdate($request, $request->updateId);
        }
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $destinationPath = public_path('/uploads/testimonial');
        $image->move($destinationPath, $imageName);
        
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = sanitizeInput($request->description);
        $testimonial->image = '/uploads/testimonial/' . $imageName;
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial item created successfully');
    }

    //testimonial items update
    public function testimonialItemUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = sanitizeInput($request->description);
        if($request->hasFile('image')) {
            if(file_exists(public_path($testimonial->image)) && !empty($testimonial->image)){
                unlink(public_path($testimonial->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $destinationPath = public_path('/uploads/testimonial');
            $image->move($destinationPath, $imageName);
            $testimonial->image = '/uploads/testimonial/' . $imageName;
        }
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial item updated successfully');
    }

    //testimonial items edit 
    public function testimonialItemEdit($id){
        $item = Testimonial::find($id);
        $testimonialItem = Testimonial::all();
        $testimonial = [];
        if($this->getBanner()){
            $testimonial = $this->getBanner();
        }
        return view('backend.pages.about.testimonial.index', compact('testimonial', 'testimonialItem', 'item'));
    }

    //  testimonial items delete
    public function testimonialItemDelete(Request $request){
        $id = $request->id;
        $testimonial = Testimonial::find($id);
        if(file_exists(public_path($testimonial->image)) && !empty($testimonial->image)){
            unlink(public_path($testimonial->image));
        }
        $testimonial->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Testimonial item deleted successfully'
        ]);
    }
}
