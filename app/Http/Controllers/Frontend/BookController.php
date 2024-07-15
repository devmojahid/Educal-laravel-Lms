<?php

namespace App\Http\Controllers\Frontend;

use App\Filters\ShopFilter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookGenre;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{

    public function books(Request $request, array $queryParameters = [])
    {
        $peram = $request->query('sortBy');

        // Debugging output to check the value of sortBy
        Log::info('sortBy parameter:', ['sortBy' => $peram]);

        $books = Book::with(["categories", "genres"])->where('status', "active");

        switch ($peram) {
            case "newest":
                $books = $books->orderBy('created_at', 'desc');
                break;
            case "oldest":
                $books = $books->orderBy('created_at', 'asc');
                break;
            case "expensive":
                $books = $books->orderBy('price', 'desc');
                break;
            case "cheap":
                $books = $books->orderBy('price', 'asc');
                break;
            case "free":
                $books = $books->where("price", "<=", 0);
                break;
            default:
                $books = $books->orderBy('id', 'desc');
                break;
        }

        $books = $books->paginate(6);

        $booksCategories = BookCategory::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $booksGenres = BookGenre::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $recentBooks = Book::orderBy('id', 'DESC')->where('status', "active")->limit(3)->get();
        return view("frontend.pages.books", compact('books', 'booksCategories', 'booksGenres', 'recentBooks'));
    }


    public function bookDetails($slug)
    {
        $book = Book::where('status', "active")->where('slug', $slug)->first();
        $recentBooks = Book::orderBy('id', 'DESC')->where('status', "active")->limit(3)->get();
        if (!$book) {
            abort(404);
        }

        $relatedBooks = Book::where('status', "active")->where('id', '!=', $book->id)->limit(4)->get();


        return view("frontend.pages.book-details", compact(['book', 'recentBooks', 'relatedBooks']));
    }

    // filter course
    public function bookFilter(Request $request)
    {
        $books = Book::where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
        if ($request->ajax()) {
            if (!empty($request->sortBy)) {
                $sortBy = $request->sortBy;
                if ($sortBy == "newest") {
                    $books = Book::where('status', "active")->orderBy('created_at', 'desc')->paginate(6);
                } elseif ($sortBy == "oldest") {
                    $books = Book::where('status', "active")->orderBy('created_at', 'asc')->paginate(6);
                } elseif ($sortBy == "expensive") {
                    $books = Book::where('status', "active")->orderBy('price', 'desc')->paginate(6);
                } elseif ($sortBy == "cheap") {
                    $books = Book::where('status', "active")->orderBy('price', 'asc')->paginate(6);
                } elseif ($sortBy == "free") {
                    $books = Book::where('status', "active")
                        ->where("price", "<=", floatval(0))
                        ->orderBy('id', 'DESC')->paginate(6);
                } else {
                    $books = Book::where('status', "active")->orderBy('id', 'DESC')->paginate(6);
                }
                return view("frontend.pages.book.single-book-in-grid", compact('books'))->render();
            }
            return view("frontend.pages.book.single-book-in-grid", compact('books'))->render();
        }
    }

    // book category

    public function category(BookCategory $category)
    {

        $books = $category->books()->where('status', "active")->paginate(6);

        $booksCategories = BookCategory::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $booksGenres = BookGenre::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $recentBooks = Book::orderBy('id', 'DESC')->where('status', "active")->limit(3)->get();
        return view("frontend.pages.book.category-books", compact(['books', 'booksCategories', 'booksGenres', 'recentBooks', 'category']));
    }

    // book genre
    public function genere($slug)
    {
        $genre = BookGenre::where('slug', $slug)->first();
        $books = $genre->books()->where('status', "active")->paginate(6);
        $booksCategories = BookCategory::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $booksGenres = BookGenre::where('status', "active")->orderBy('id', 'DESC')->limit(8)->get();
        $recentBooks = Book::orderBy('id', 'DESC')->where('status', "active")->limit(3)->get();
        return view("frontend.pages.book.category-books", compact(['books', 'booksCategories', 'booksGenres', 'recentBooks', 'genre']));
    }

    // all courses page
    public function allCourses(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::with(["user"])->where('status', "approved")->orderBy('id', 'DESC')->paginate(6);
            return response()->json($data);
        }
    }

    // search course
    public function courseSearch(Request $request)
    {
        $search = htmlspecialchars($request->search);
        $courses = Course::with(["user", "category"])->where('status', "approved")->where('title', 'LIKE', '%' . $search . '%')->paginate(6);
        $courseCategories = CourseCategory::orderBy('id', 'DESC')->limit(5)->with("course")->get();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        return view("frontend.pages.course", compact(['courses', 'courseCategories', 'recentCourses', 'search']));
    }

    // category course
    public function courseCategory($slug)
    {
        $category = CourseCategory::where('slug', $slug)->first();
        $courses = Course::with(["user", "category"])->where('status', "approved")->where('category_id', $category->id)->paginate(6);
        $courseCategories = CourseCategory::orderBy('id', 'DESC')->limit(5)->with("course")->get();
        $recentCourses = Course::orderBy('id', 'DESC')->where('status', "approved")->limit(3)->get();
        return view("frontend.pages.course", compact(['courses', 'courseCategories', 'recentCourses', 'category']));
    }
}
