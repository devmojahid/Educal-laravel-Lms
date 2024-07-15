<?php

namespace App\Http\Controllers\Backend\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Models\BookCategory;
use App\Services\BookCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->usertype != "admin") {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategory::orderBy('id', 'desc')->get();
        return view("backend.book.category.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCategoryRequest $request, BookCategoryService $bookCategoryService)
    {
        $bookCategoryService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Book Category has been created !!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCategoryRequest $request, BookCategory $bookCategory, BookCategoryService $bookCategoryService)
    {
        $bookCategoryService->update($request->validated(), $bookCategory);

        return response()->json([
            'status' => 'success',
            'message' => 'Book Category has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory)
    {
        if (!empty($bookCategory->svg) && file_exists(public_path($bookCategory->svg))) {
            unlink(public_path($bookCategory->svg));
        }
        $bookCategory->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Book Category has been deleted !!',
        ]);
    }
}
