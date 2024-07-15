<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pages;
use App\Models\Course;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy("id", "desc")->get();
        return view('backend.menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
        ]);

        $menu = new Menu();
        $slug = Str::slug($request->title);
        if (Menu::where('slug', $slug)->first()) {
            $slug = $slug . '-' . time();
        }
        $menu->title = sanitizeInput($request->title);
        $menu->location = $request->location;
        $menu->content = sanitizeJsonInput($request->content) ?? [];
        $menu->slug = $slug;
        $menu->status = $request->status ?? 'active';
        $menu->save();

        return redirect()->route('admin.appearance.menu')->with('success', 'Menu created successfully');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $courses = Course::where('status', 'approved')->get();
        $pages = Pages::where('status', 'active')->get();
        $menu_items = json_decode($menu->content, true);
        $menu_content = $menu->content;
        return view('backend.menu.edit-1', compact(['menu', 'courses', 'pages', 'menu_items', 'menu_content']));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $menu = Menu::find($request->id);
        $slug = Str::slug(sanitizeInput($request->title));
        $menu->title = sanitizeInput($request->title);
        $menu->location = $request->location;
        $menu->content = sanitizeJsonInput($request->content);
        $menu->slug = $slug;
        $menu->status = $request->status ?? 'active';
        $menu->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Menu updated successfully !!',
            'data' => $menu
        ]);
    }

    public function delete(Request $request)
    {
        $menu = Menu::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Menu deleted successfully !!',
        ]);
    }
}