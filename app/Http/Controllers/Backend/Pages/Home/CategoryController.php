<?php

namespace App\Http\Controllers\Backend\Pages\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\CourseCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $courseCatefories = CourseCategory::orderBy('title', "asc")->where('status', 'active')->get();
        $categoriesData = SystemSetting::where('key', 'home_categories')->first();
        if (!$categoriesData) {
            $categoriesData = new SystemSetting;
            $categoriesData->key = 'home_categories';
            $categoriesData->value = json_encode(['category_title' => 'Popular Categories', 'categories' => []]);
            $categoriesData->save();
        }
        $categories = json_decode($categoriesData->value, true);
        return view('backend.pages.home.category', compact(['courseCatefories', 'categories']));
    }

    public function update(Request $request)
    {
        $data = [
            'category_title' => $request->title,
            'categories' => $request->categories ?? [],
        ];

        if (SystemSetting::where('key', 'home_categories')->exists()) {
            $home_categories = SystemSetting::where('key', 'home_categories')->first();
            $home_categories->value = json_encode($data);
            $home_categories->save();
        } else {
            $home_categories = new SystemSetting;
            $home_categories->key = 'home_categories';
            $home_categories->value = json_encode($data);
            $home_categories->save();
        }

        return redirect()->back()->with('success', 'Category updated successfully');
    }
}