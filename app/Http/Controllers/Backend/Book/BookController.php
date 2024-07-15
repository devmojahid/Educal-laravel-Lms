<?php

namespace App\Http\Controllers\Backend\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookGenre;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategory::orderBy('title', 'asc')->get();
        $genres = BookGenre::orderBy('title', 'asc')->get();
        $books = Book::orderBy('id', 'desc')->get();
        return view("backend.book.book.index", compact('books', 'categories', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCategory::orderBy('title', 'asc')->get();
        $genres = BookGenre::orderBy('title', 'asc')->get();
        return view("backend.book.book.create", compact('categories', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request, BookService $bookService)
    {
        $book = $bookService->store($request->validated());
        return redirect()->route('admin.books.edit', $book->id)->with('success', 'Book has been created !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = BookCategory::orderBy('title', 'asc')->get();
        $genres = BookGenre::orderBy('title', 'asc')->get();
        return view("backend.book.book.edit", compact('book', 'categories', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book, BookService $bookService)
    {
        $bookService->update($request->validated(), $book);
        return redirect()->route('admin.books.edit', $book->id)->with('success', 'Book has been updated !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!empty($book->image) && $book->image != '/uploads/cms/book/book-placeholder.png' && file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }

        if (!empty($book->book_file) && file_exists(public_path($book->book_file))) {
            unlink(public_path($book->book_file));
        }
        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Book has been deleted !!',
        ]);
    }
}
