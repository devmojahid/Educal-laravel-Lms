<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    SiteController,
    BlogController,
    BookController,
    BookReviewController,
    CourseController,
    CartController,
    CheckoutController,
    MakeInstructorController,
    EventController,
    NewsletterController,
    ReviewController
};

use App\Http\Controllers\StudentController;
use App\Http\Controllers\Backend\Pages\CustomPageController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\RazorpayPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'user'])->group(function () {
    Route::get("/", [StudentController::class, 'dashboard']);
    Route::get("/orders-history", [StudentController::class, 'order'])->name('order.history');
    Route::get("/profile", [StudentController::class, 'profile'])->name('profile');
    Route::get("/enrolled-course", [StudentController::class, 'enrolledCourse'])->name('enrolled.course');
    Route::get("/enrolled-items", [StudentController::class, 'enrolledBook'])->name('enrolled.book');
    Route::get("/download-item", [StudentController::class, 'downloadItem'])->name('download.item');
    Route::get("/download-item/{slug}", [StudentController::class, 'downloadFile'])->name('download.file');
    Route::get('/physical-item', [StudentController::class, 'physicalItem'])->name('physical.item');
    Route::get("/active-course", [StudentController::class, 'activeCourse'])->name('active.course');
    Route::get("/complete-course", [StudentController::class, 'completeCourse'])->name('complete.course');
    Route::get("/student/settings", [StudentController::class, 'settings'])->name('settings');
    Route::get("/instructor/apply", [MakeInstructorController::class, 'index'])->name('instructor.apply');
    Route::get("/learning-dashboard/{slug}", [StudentController::class, 'learningDashboard'])->name('learning');
    //lesson route
    Route::get("/learning-dashboard/{slug}/lesson/{id}", [StudentController::class, 'lesson'])->name('lesson');
    //question 
    Route::get('/learning-dashboard/{slug}/lesson/{id}/question/{quizId}', [StudentController::class, 'getQuizQuestion'])->name('quiz.question');
    //quiz submit
    Route::post('/learning-dashboard/{slug}/lesson/{id}/question/{quizId}/submit', [StudentController::class, 'submitQuiz'])->name('quiz.submit');
});
// user update
Route::put("/user/update/{id}", [UserController::class, 'update'])->name('student.user.update');
Route::get("/user/update/password", [UserController::class, 'updatepass'])->name('student.user.update.password.get');
Route::put("/user/update/password/{id}", [UserController::class, 'updatepasspost'])->name('student.user.update.password.post');

Route::get("/", [SiteController::class, 'home'])->name('home');
Route::get("/about", [SiteController::class, 'about'])->name('about');

Route::get("/contact", [SiteController::class, 'contact'])->name('contact');
Route::post("/contact", [SiteController::class, 'contactSubmit'])->name('contact.submit');
Route::get("/instructor", [SiteController::class, 'instructor'])->name('instructor');
Route::get("/instructor-details/{id}", [SiteController::class, 'instructorDetails'])->name('instructor.details');
Route::get("/profile", [SiteController::class, 'profile'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//blog route
Route::get("/blog", [BlogController::class, 'blog'])->name('blog');
Route::get("/blog-details/{slug}", [BlogController::class, 'blogDetails'])->name('blog.details');
Route::get("/blog/category/{slug}", [BlogController::class, 'blogCategory'])->name('blog.category');
Route::get("/blog/tag/{slug}", [BlogController::class, 'blogTag'])->name('blog.tag');

//course route
Route::get("/course", [CourseController::class, 'course'])->name('course');
Route::get("/course-details/{slug}", [CourseController::class, 'courseDetails'])->name('course.details');
Route::get("/all-courses", [CourseController::class, 'allCourses'])->name('all.courses');
//filter course
Route::get("/course/filter", [CourseController::class, 'courseFilter'])->name('course.filter');
//search course
Route::get("/course/search", [CourseController::class, 'courseSearch'])->name('course.search');
//category course
Route::get("/course/category/{slug}", [CourseController::class, 'courseCategory'])->name('course.category');

//add to cart routes
Route::post("/add-to-cart", [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get("/cart", [CartController::class, 'cart'])->name('cart');
Route::get("/cart/clear", [CartController::class, 'cartClear'])->name('cart.clear');
Route::get("/cart/remove/{id}", [CartController::class, 'cartRemove'])->name('cart.remove');
//item increment and decrement
Route::get("/cart/increment/{id}", [CartController::class, 'cartIncrement'])->name('cart.increment');
Route::get("/cart/decrement/{id}", [CartController::class, 'cartDecrement'])->name('cart.decrement');
Route::post('/cart/coupon', [CartController::class, 'coupon'])->name('cart.coupon');
Route::post("/total/price/session", [CartController::class, 'totalPriceSession'])->name('total.price.session');

//checkout route


Route::get("/checkout", [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post("/checkout", [CheckoutController::class, 'store'])->name('checkout.store')->middleware('auth');
Route::get("/checkout/success", [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');
Route::get("/checkout/cancel", [CheckoutController::class, 'cancel'])->name('checkout.cancel')->middleware('auth');

// event route
Route::get("/event-details/{id}", [EventController::class, 'eventDetails'])->name('event.details');
Route::post("/event/ticket", [EventController::class, 'eventTicket'])->name('event.ticket')->middleware('auth');
Route::get("/event/ticket/success", [EventController::class, 'eventTicketSuccess'])->name('event.ticket.success')->middleware('auth');

// newsletter route
Route::post("/subscribe", [NewsletterController::class, 'subscribe'])->name('subscribe');

//blog Search route
Route::get("/blog/search", [BlogController::class, 'blogSearch'])->name('blog.search');
//course Search route
Route::get("/course/search", [CourseController::class, 'courseSearch'])->name('course.search');

// comment routes
Route::get("/comments", [CommentController::class, 'comments'])->name("admin.comments")->middleware('auth');
Route::get("/comments", [CommentController::class, 'commentsStore'])->name("admin.comments.store");
Route::get("/comments/reply", [CommentController::class, 'commentsReply'])->name("admin.comments.reply");
Route::post("/comments/delete", [CommentController::class, 'deleteComment'])->name("admin.comments.delete");

// review routes
Route::get("/review/store", [ReviewController::class, 'store'])->name("review.store")->middleware('auth');
Route::post("/review/update", [ReviewController::class, 'update'])->name("review.update");
Route::post("/review/delete", [ReviewController::class, 'delete'])->name("review.delete");

Route::get('page/{slug}', [CustomPageController::class, 'show'])->name('pages.details');

Route::post("/checkout/razorpay/callback", [CheckoutController::class, 'handleRazorpayCallback'])->name('checkout.razorpay.callback');

Route::get("/pdf", [CheckoutController::class, 'pdf'])->name('pdf');

//instructor route
Route::post("/instructor/apply", [MakeInstructorController::class, 'store'])->name('instructor.apply.store');

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


Route::get("book/filter", [BookController::class, 'bookFilter'])->name('book.filter');

Route::get('/books', [BookController::class, 'books'])->name('books.index');
Route::get('/book/{slug}', [BookController::class, 'bookDetails'])->name('books.details');
Route::get("/categorie/{category:slug}/books", [BookController::class, 'category'])->name('books.category');
Route::get('/genere/{slug}', [BookController::class, 'genere'])->name('books.genere');
Route::get('/book/search', [BookController::class, 'search'])->name('books.search');
Route::get("/book/search", [BookController::class, 'bookSearch'])->name('book.search');
Route::get("/book/review/store", [BookReviewController::class, 'store'])->name("book.review.store")->middleware('auth');
