<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pages;

class CustomPageController extends Controller
{
    public function index()
    {
        $pages = Pages::orderBy('id', 'desc')->get();
        return view('backend.pages.custom.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.pages.custom.create');
    }

    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required',
            'content' => 'nullable',
        ]);
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name =  '/uploads/pages/'. time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/pages');
            $image->move($destinationPath, $image_name);
            $data['image'] = $image_name;
        }

        $data['title']  = sanitizeInput($request->title);
        $data['content']= sanitizeInput($request->content);

        $slug= Str::slug($request->title);
        if(Pages::where('slug',$slug)->exists()){
            $slug = $slug . time();
        }
        $data['slug'] = $slug;
        $data['status'] = $request->status ?? 'inactive';
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = sanitizeInput($request->meta_description);
        $data['meta_keywords'] = $request->meta_keywords;
        Pages::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully');
    }

    public function show($slug)
    {
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.pages.custom.index', compact('page'));
    }

    public function edit($id)
    {
        $page = Pages::findOrFail($id);
        return view('backend.pages.custom.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name =  '/uploads/pages/'. time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/pages');
            $image->move($destinationPath, $image_name);
            $data['image'] = $image_name;
        }

        
        $data['title']  = sanitizeInput($request->title);
        $data['content']= sanitizeInput($request->content);

        $slug= Str::slug($request->title);
        $data['slug'] = $slug;
        $data['status'] = $request->status ?? 'inactive';
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = sanitizeInput($request->meta_description);
        $data['meta_keywords'] = $request->meta_keywords;
        Pages::where('id', $id)->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully');
    }

    public function delete(Request $request){
        Pages::find($request->id)->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Page deleted successfully !!',
        ]);
    }
}