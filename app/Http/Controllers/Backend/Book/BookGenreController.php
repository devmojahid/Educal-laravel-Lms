<?php

namespace App\Http\Controllers\Backend\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookGenreRequest;
use App\Models\BookGenre;
use App\Services\BookGenreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookGenreController extends Controller
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
        $genres = BookGenre::orderBy('id', 'desc')->get();
        return view("backend.book.genre.index", compact('genres'));
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
    public function store(BookGenreRequest $request, BookGenreService $bookGenreService)
    {
        $bookGenreService->store($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Book Genre has been created !!',
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
    public function update(BookGenreRequest $request, BookGenre $bookGenre, BookGenreService $bookGenreService)
    {
        $bookGenreService->update($request->validated(), $bookGenre);

        return response()->json([
            'status' => 'success',
            'message' => 'Book Genre has been updated !!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookGenre $bookGenre)
    {
        if (!empty($bookGenre->image) && file_exists(public_path($bookGenre->image))) {
            unlink(public_path($bookGenre->image));
        }

        $bookGenre->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book Genre has been deleted !!',
        ]);
    }
}
