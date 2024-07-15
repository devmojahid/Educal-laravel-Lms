<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //blog page show
    public function blog()
    {
        $blogs = Blog::where('status', 'active')->with(['category', 'tag', 'user'])->latest()->paginate(6);

        $categories = BlogCategory::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $tags = BlogTag::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $recentBlogs = Blog::latest()
            ->select('id', 'title', 'slug', 'image', 'created_at')
            ->take(3)
            ->get();

        $sidebar = [
            'categories' => $categories,
            'tags' => $tags,
            'recentBlogs' => $recentBlogs
        ];
        return view("frontend.pages.blog", compact(['blogs', 'sidebar']));
    }

    //blog details page show

    public function blogDetails($slug)
    {
        $blog = Blog::with(['category', 'tag', 'user', 'comments', 'replies'])->where('slug', $slug)->first();
        //releted blog
        if ($blog) {
            $reletedBlogs = Blog::with(['category', 'tag', 'user'])->where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->latest()->paginate(2);

            $categories = BlogCategory::orderBy('id', 'desc')
                ->select('id', 'title', 'slug')
                ->take(5)->get();
            $tags = BlogTag::orderBy('id', 'desc')
                ->select('id', 'title', 'slug')
                ->take(5)->get();
            $recentBlogs = Blog::latest()
                ->select('id', 'title', 'slug', 'image', 'created_at')
                ->take(3)
                ->get();

            $sidebar = [
                'categories' => $categories,
                'tags' => $tags,
                'recentBlogs' => $recentBlogs
            ];
            return view("frontend.pages.blog-details", compact(['blog', "reletedBlogs", 'sidebar']));
        } else {
            // 404 page show
            return view('errors.404');
        }
    }

    //blog category page show
    public function blogCategory($slug)
    {
        $category = BlogCategory::where('slug', $slug)->first();
        $blogs = Blog::with(['category', 'tag', 'user'])->where('category_id', $category->id)->latest()->paginate(6);

        $categories = BlogCategory::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $tags = BlogTag::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $recentBlogs = Blog::latest()
            ->select('id', 'title', 'slug', 'image', 'created_at')
            ->take(3)
            ->get();

        $sidebar = [
            'categories' => $categories,
            'tags' => $tags,
            'recentBlogs' => $recentBlogs
        ];
        return view("frontend.pages.blog", compact(['blogs', 'sidebar']));
    }

    //blog tag page show
    public function blogTag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->first();
        $blogs = Blog::with(['category', 'tag', 'user'])->where('tag_id', $tag->id)->latest()->paginate(6);

        $categories = BlogCategory::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $tags = BlogTag::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $recentBlogs = Blog::latest()
            ->select('id', 'title', 'slug', 'image', 'created_at')
            ->take(3)
            ->get();

        $sidebar = [
            'categories' => $categories,
            'tags' => $tags,
            'recentBlogs' => $recentBlogs
        ];
        return view("frontend.pages.blog", compact(['blogs', 'sidebar']));
    }

    //blog search page show
    public function blogSearch(Request $request)
    {
        $search = htmlspecialchars($request->search);
        $blogs = Blog::with(['category', 'tag', 'user'])->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->latest()->paginate(6);

        $categories = BlogCategory::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $tags = BlogTag::orderBy('id', 'desc')
            ->select('id', 'title', 'slug')
            ->take(5)->get();
        $recentBlogs = Blog::latest()
            ->select('id', 'title', 'slug', 'image', 'created_at')
            ->take(3)
            ->get();

        $sidebar = [
            'categories' => $categories,
            'tags' => $tags,
            'recentBlogs' => $recentBlogs
        ];
        return view("frontend.pages.blog", compact(['blogs', 'sidebar', 'search']));
    }
}