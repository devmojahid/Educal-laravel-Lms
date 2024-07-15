<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{
    BackupController,
    BlogCategoryController,
    BlogController,
    BlogTagController,
    BlogSubCategoryController,
    RoleController,
    UserController,
    LangController,
    SettingAdminProfileController,
    SettingController,
    CourseCategoryController,
    CourseSubCategoryController,
    CourseTagController,
    CourseController,
    CourseLanguageController,
    CourseQuizController,
    CourseQuizQuestionController,
    CourseResourceController,
    CourseAssignmentController,
    CouponController,
    OrderController,
    InstructorController,
    TopicController,
    LessonController,
    EventController as EventControllerBackend,
    DashboardController,
    MenuController,
    CommissionController,
    GeneralSettingsController,
    CurrencyController,
    PaymentController,
    SiteSettingsController,
    MaintenanceController,
    BookOrderController,
    UpdateController
};
use App\Http\Controllers\Backend\Book\BookCategoryController;
use App\Http\Controllers\Backend\Book\BookController;
use App\Http\Controllers\Backend\Book\BookGenreController;
use App\Http\Controllers\Backend\Book\ReviewController;
use App\Http\Controllers\Backend\Pages\Home\{
    HomeController,
    HeroController,
    CategoryController,
    BannerController,
    FindCourseController,
    EventController,
    PricePlanController,
    CounterController
};
use App\Http\Controllers\Backend\Pages\About\{
    AboutController,
    BrandController,
    BannerController as AboutBannerController,
    TestimonialController,
    CounterController as AboutCounterController,
    WhyController
};
use App\Http\Controllers\Backend\Pages\Instructor\{
    InstructorController as PagesInstructorController,
    InstructorServiceController,
};

use App\Http\Controllers\Backend\Pages\CustomPageController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get("/", function () {
    return redirect()->route('admin.dashboard');
});

// update routes

Route::get('/update', [UpdateController::class, 'index'])->name('admin.updtae');
Route::post('/update', [UpdateController::class, 'update'])->name('admin.update');
Route::get("/backup", [BackupController::class, 'index'])->name('admin.backup');
Route::post("/backup/sql", [BackupController::class, 'backupSql'])->name('admin.backup.sql');
Route::post("/backup/upload", [BackupController::class, 'backupUploads'])->name('admin.backup.upload');


// blog categories routes
Route::post('blog-cat-update', [BlogCategoryController::class, 'update'])->name('blog-categories.update-without-resource');
Route::post('blog-cat-delete', [BlogCategoryController::class, 'delete'])->name('delete.blog.category');
Route::resource('blog-categories', BlogCategoryController::class);

// blog sub categories routes
Route::get('blog-sub-categories', [BlogSubCategoryController::class, 'index'])->name('blog-sub-categories.index');
Route::post('blog-sub-categories', [BlogSubCategoryController::class, 'store'])->name('blog-sub-categories.store');
Route::post('blog-sub-categories-update', [BlogSubCategoryController::class, 'update'])->name('blog-sub-categories.update.without.resource');
Route::post('blog-sub-categories-delete', [BlogSubCategoryController::class, 'delete'])->name('delete.blog.subcategory');

Route::resource('blog-tags', BlogTagController::class);
Route::post('blog-tag-update', [BlogTagController::class, 'update'])->name('blog-tag.update');
Route::post('blog-tag-delete', [BlogTagController::class, 'delete'])->name('delete.blog.tag');

// blog comments routes
Route::get('/blog-comments', [BlogController::class, 'blogComments'])->name('admin.blog.comments');
Route::get('/blog-comments/approve/{id}', [BlogController::class, 'approveComment'])->name('admin.blog.comments.approve');
Route::get('/blog-comments/reject/{id}', [BlogController::class, 'rejectComment'])->name('admin.blog.comments.reject');
Route::post('/blog-comments/delete', [BlogController::class, 'deleteComment'])->name('admin.blog.comments.delete');




// blog routes
Route::resource('blog', BlogController::class);
Route::get('/blog/subcategories/{categoryId}', [BlogController::class, 'getSubCategories']);
Route::post("/blog/delete", [BlogController::class, 'deleteBlog'])->name('admin.blog.delete');
// user routes
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::get("/all-roles", [RoleController::class, 'allRoles'])->name('all.roles');

//language routes
Route::get('lang', [LangController::class, 'lang']);
Route::get('lang/change', [LangController::class, 'lang_change'])->name('lang.change');

Route::group(['prefix' => 'teacher'], function () {
    Route::get("/all", [InstructorController::class, 'allInstructor'])->name('all.instructor');
    Route::get("/pending", [InstructorController::class, 'pendingInstructor'])->name('pending.instructor');
    Route::get("/pending/{id}", [InstructorController::class, 'pendingInstructorDetails'])->name('pending.instructor.details');
    Route::get("/approve/{id}", [InstructorController::class, 'approveInstructor'])->name('approve.instructor');
});


// clear cache routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        session()->flush('success', 'Cache is cleared');
        return redirect()->back()->with('success', 'Cache is cleared');
    })->name("admin.clear.cache");
});


Route::get("/wihdraw/pending-list", [WithdrawController::class, 'pendingList'])->name('admin.withdraw.pending.list');
//setting routes
Route::prefix('setting')->group(function () {
    Route::get("/admin-profile", [SettingAdminProfileController::class, 'index'])->name('admin.profile');
    //password change
    Route::get("/profile/password", [SettingAdminProfileController::class, 'passwordChange'])->name('admin.profile.password.get');
    Route::get("/general-setting", [GeneralSettingsController::class, 'generalSetting'])->name('admin.general.setting');
    Route::post("/general-setting-update/{key}", [GeneralSettingsController::class, 'generalSettingUpdate'])->name('admin.general.setting.update');
    Route::get("/smtp-setting", [SettingController::class, 'smtpSetting'])->name('admin.smtp.setting');
    Route::post("smtp-setting-update", [SettingController::class, 'smtpSettingUpdate'])->name("admin.smtp.setting.update");
    Route::get("/sidebar-setting", [SettingController::class, 'sidebarSetting'])->name('admin.sidebar.setting');
    Route::post("/sidebar-setting-update", [SettingController::class, 'sidebarSettingUpdate'])->name('admin.sidebar.setting.update');
    Route::get("/payout-info", [SettingController::class, 'payoutSettings'])->name('admin.payout.setting');
    Route::post("/payout-info-update", [SettingController::class, 'payoutSettingsUpdate'])->name('admin.payout.setting.update');
    Route::get("/withdraw-list", [WithdrawController::class, 'index'])->name('admin.withdraw.list');
    Route::get('add-withdraw', [WithdrawController::class, 'addWithdraw'])->name('admin.add.withdraw');
    Route::post("/withdraw-store", [WithdrawController::class, 'storeWithdraw'])->name('admin.withdraw.store');
    Route::get("/withdraw-approve/{id}", [WithdrawController::class, 'approveWithdraw'])->name('admin.withdraw.approve');
    Route::get("/withdraw-reject/{id}", [WithdrawController::class, 'rejectWithdraw'])->name('admin.withdraw.reject');
    Route::get("/withdraw-processing/{id}", [WithdrawController::class, 'processingWithdraw'])->name('admin.withdraw.processing');
});

/*
* Course routes
*/

//categories routes
Route::resource('course-categories', CourseCategoryController::class);
Route::post('course-cat-update', [CourseCategoryController::class, 'update'])->name('course-categories.update.without.resource');
Route::post('course-cat-delete', [CourseCategoryController::class, 'delete'])->name('delete.course.category');

//sub categories routes
Route::get('course-sub-categories', [CourseSubCategoryController::class, 'index'])->name('course-sub-categories.index');
Route::post('course-sub-categories', [CourseSubCategoryController::class, 'store'])->name('course-sub-categories.store');
Route::post('course-sub-categories-update', [CourseSubCategoryController::class, 'update'])->name('course-sub-categories.update');
Route::post('course-sub-categories-delete', [CourseSubCategoryController::class, 'delete'])->name('delete.course.subcategory');
//Tag routes
Route::resource('course-tags', CourseTagController::class);
Route::post('course-tag-update', [CourseTagController::class, 'update'])->name('course-tag.update');
Route::post('course-tag-delete', [CourseTagController::class, 'delete'])->name('delete.course.tag');

//language routes
Route::resource('course-languages', CourseLanguageController::class);
Route::post('course-language-update', [CourseLanguageController::class, 'update'])->name('course-languages.update.without.resource');
Route::post('course-language-delete', [CourseLanguageController::class, 'delete'])->name('delete.course.language');


//course review routes
Route::get('/course-review', [CourseController::class, 'courseReview'])->name('admin.course.review');
Route::get('/course-review/approve/{id}', [CourseController::class, 'approveReview'])->name('admin.course.review.approve');
Route::get('/course-review/reject/{id}', [CourseController::class, 'rejectReview'])->name('admin.course.review.reject');
Route::post('/course-review/delete', [CourseController::class, 'deleteReview'])->name('admin.course.review.delete');

// course routes
Route::resource('course', CourseController::class);
Route::put('/course/make/update/{id}', [CourseController::class, 'updateData'])->name('admin.course.update');
Route::get('/course/subcategories/{categoryId}', [CourseController::class, 'getSubCategories']);
Route::get('/course/curriculum/{courseId}', [CourseController::class, 'getCurriculum'])->name('admin.course.getCurriculumData');
Route::post('/course/lesson/store', [CourseController::class, 'storeLesson'])->name('admin.course.storeLessonData');
Route::post("/course/delete", [CourseController::class, 'deleteCourse'])->name('admin.course.delete');

//course status routes
Route::get('/course/status/pending', [CourseController::class, 'pendingCourse'])->name('admin.course.pending');
Route::get('/course/approved/{id}', [CourseController::class, 'approvedCourse'])->name('admin.course.approved');
Route::get('/course/rejected/{id}', [CourseController::class, 'rejectedCourse'])->name('admin.course.rejected');


// Topic Routes
Route::post('/course/topic/store', [TopicController::class, 'storeTopic'])->name('admin.course.storeTopicData');
Route::post('/course/topic/edit', [TopicController::class, 'editTopic'])->name('admin.course.editTopicData');
Route::post('/course/topic/update', [TopicController::class, 'updateTopic'])->name('admin.course.updateTopicData');
Route::post('/course/topic/delete', [TopicController::class, 'deleteTopic'])->name('admin.course.deleteTopicData');

// get topic data in course edit page
Route::post('/course/topic/get-data', [TopicController::class, 'getTopic'])->name('admin.course.getTopicData');

//lesson routes
Route::post('/course/lesson/store', [LessonController::class, 'storeLesson'])->name('admin.course.storeLessonData');
Route::post('/course/lesson/edit', [LessonController::class, 'editLesson'])->name('admin.course.editLessonData');
Route::post('/course/lesson/update', [LessonController::class, 'updateLesson'])->name('admin.course.updateLessonData');
Route::post('/course/lesson/delete', [LessonController::class, 'deleteLesson'])->name('admin.course.deleteLessonData');

// Course Quiz routes
Route::get('/course/quiz/{courseId}', [CourseQuizController::class, 'getQuiz'])->name('admin.course.getQuizData');
Route::get('/course/quiz/create/{courseId}', [CourseQuizController::class, 'createQuiz'])->name('admin.course.createQuizData');
Route::post('/course/quiz/store/{courseId}', [CourseQuizController::class, 'storeQuiz'])->name('admin.course.storeQuizData');
Route::get('/course/quiz/edit/{courseId}/{quizId}', [CourseQuizController::class, 'editQuiz'])->name('admin.course.editQuizData');
Route::post('/course/quiz/update/{quizId}', [CourseQuizController::class, 'updateQuiz'])->name('admin.course.updateQuizData');
Route::post('/course/quiz/delete', [CourseQuizController::class, 'deleteQuiz'])->name('admin.course.deleteQuizData');

//Quize Question routes
Route::get('/course/quiz/question/{quizId}', [CourseQuizQuestionController::class, 'getQuizQuestion'])->name('admin.course.getQuizQuestionData');
Route::get('/course/quiz/question/create/{quizId}', [CourseQuizQuestionController::class, 'createQuizQuestion'])->name('admin.course.createQuizQuestionData');
Route::post('/course/quiz/question/store/{quizId}', [CourseQuizQuestionController::class, 'storeQuizQuestion'])->name('admin.course.storeQuizQuestionData');
Route::get('/course/quiz/question/edit/{quizId}/{questionId}', [CourseQuizQuestionController::class, 'editQuizQuestion'])->name('admin.course.editQuizQuestionData');
Route::post('/course/quiz/question/update/{questionId}', [CourseQuizQuestionController::class, 'updateQuizQuestion'])->name('admin.course.updateQuizQuestionData');
Route::post('/course/quiz/question/delete', [CourseQuizQuestionController::class, 'deleteQuizQuestion'])->name('admin.course.deleteQuizQuestionData');

// Course Resource routes
Route::get('/course/resource/{courseId}', [CourseResourceController::class, 'getResource'])->name('admin.course.getResourceData');
Route::post('/course/resource', [CourseResourceController::class, 'storeResource'])->name('admin.course.storeResourceData');
Route::post('/course/resource/loadalldata', [CourseResourceController::class, 'loadAllData'])->name('admin.course.loadAllResources');
Route::post('/course/resource/delete', [CourseResourceController::class, 'deleteResource'])->name('admin.course.deleteResource');
Route::post('/course/resource/update', [CourseResourceController::class, 'updateResource'])->name('admin.course.updateResource');



// Course Assignment routes
Route::get('/course/assignment/{courseId}', [CourseAssignmentController::class, 'getAssignment'])->name('admin.course.getAssignmentData');
Route::post('/course/assignment', [CourseAssignmentController::class, 'storeAssignment'])->name('admin.course.storeAssignmentData');
Route::post('/course/assignment/delete', [CourseAssignmentController::class, 'deleteAssignment'])->name('admin.course.deleteAssignment');
Route::post('/course/assignment/update', [CourseAssignmentController::class, 'updateAssignment'])->name('admin.course.updateAssignment');


// coupon routes
Route::prefix('coupon')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
});
Route::post('/coupon/store', [CouponController::class, 'store'])->name('admin.coupon.store');
Route::get('/coupon/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
Route::post('/coupon/update/{id}', [CouponController::class, 'update'])->name('admin.coupon.update');
Route::post('/coupon/delete', [CouponController::class, 'delete'])->name('admin.coupon.delete');

//order routes
Route::get('/orders', [OrderController::class, 'index'])->name('admin.order.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::post('/orders/update', [OrderController::class, 'update'])->name('admin.orders.update');
Route::post('/orders/delete', [OrderController::class, 'delete'])->name('admin.orders.delete');
Route::get('/orders/invoice/{id}', [OrderController::class, 'invoice'])->name('admin.orders.invoice');
Route::get("/order/show/{id}", [OrderController::class, 'show'])->name('admin.order.show');

//pages routes


Route::prefix('pages')->group(function () {
    //custom pages
    Route::get('/', [CustomPageController::class, 'index'])->name('admin.pages.index');
    Route::get('/create', [CustomPageController::class, 'create'])->name('admin.pages.create');
    Route::post('/store', [CustomPageController::class, 'store'])->name('admin.pages.store');
    Route::get('/edit/{id}', [CustomPageController::class, 'edit'])->name('admin.pages.edit');
    Route::post('/update/{id}', [CustomPageController::class, 'update'])->name('admin.pages.update');
    Route::post('/delete', [CustomPageController::class, 'delete'])->name('admin.pages.delete');
});
//home routes
Route::prefix('home')->group(function () {
    //hero
    Route::get('/hero', [HeroController::class, 'index'])->name('admin.pages.homepage.hero');
    Route::put('/hero/update', [HeroController::class, 'update'])->name('admin.appearance.homepage.hero.update');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.pages.homepage.category');
    Route::put('/category/update', [CategoryController::class, 'update'])->name('admin.appearance.homepage.category.update');
    Route::get("/banner", [BannerController::class, 'index'])->name("admin.pages.homepage.banner");
    Route::post("/banner/store", [BannerController::class, 'store'])->name("admin.pages.homepage.banner.store");
    Route::get("/banner/edit/{id}", [BannerController::class, 'edit'])->name("admin.pages.homepage.banner.edit");
    Route::post("/banner/delete", [BannerController::class, 'delete'])->name("admin.pages.homepage.banner.delete");
    Route::get('/find-course', [FindCourseController::class, 'index'])->name('admin.pages.homepage.find.course');
    Route::put('/find-course/update', [FindCourseController::class, 'update'])->name('admin.appearance.homepage.find.course.update');
    //event
    Route::get('/event', [EventController::class, 'index'])->name('admin.pages.homepage.event');
    Route::put('/event/update', [EventController::class, 'update'])->name('admin.appearance.homepage.event.update');
    //price plan
    Route::get('/price-plan', [PricePlanController::class, 'index'])->name('admin.pages.homepage.price.plan');
    Route::put('/price-plan/update', [PricePlanController::class, 'update'])->name('admin.appearance.homepage.price.plan.update');
    //counter
    Route::get('/counter', [CounterController::class, 'index'])->name('admin.pages.counter');
    Route::put('/counter/update', [CounterController::class, 'update'])->name('admin.pages.counter.update');
});
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('admin.pages.about');
    Route::put('/update', [AboutController::class, 'update'])->name('admin.pages.about.update');

    //brand
    Route::get("/brand", [BrandController::class, 'index'])->name("admin.pages.homepage.brand");
    Route::post("/brand/store", [BrandController::class, 'store'])->name("admin.pages.homepage.brand.store");
    Route::get("/brand/edit/{id}", [BrandController::class, 'edit'])->name("admin.pages.homepage.brand.edit");
    Route::post("/brand/delete", [BrandController::class, 'delete'])->name("admin.pages.homepage.brand.delete");

    //banner
    Route::get("/banner", [AboutBannerController::class, 'index'])->name("admin.pages.about.banner");
    Route::post("/banner/store", [AboutBannerController::class, 'store'])->name("admin.pages.about.banner.store");
    Route::get("/banner/edit/{id}", [AboutBannerController::class, 'edit'])->name("admin.pages.about.banner.edit");
    Route::post("/banner/delete", [AboutBannerController::class, 'delete'])->name("admin.pages.about.banner.delete");

    //testimonial
    Route::get("/testimonial", [TestimonialController::class, 'index'])->name("admin.pages.about.testimonial");
    Route::post("/testimonial/store", [TestimonialController::class, 'store'])->name("admin.pages.about.testimonial.store");
    Route::get("/testimonial/edit/{id}", [TestimonialController::class, 'edit'])->name("admin.pages.about.testimonial.edit");
    Route::post("/testimonial/delete", [TestimonialController::class, 'delete'])->name("admin.pages.about.testimonial.delete");

    //testimonial items add 
    Route::get("/testimonial/items", [TestimonialController::class, "testimonialItemIndex"])->name("admin.pages.about.testimonial.item");
    Route::post("/testimonial/items/store", [TestimonialController::class, "testimonialItemStore"])->name("admin.pages.about.testimonial.item.store");
    Route::get("/testimonial/items/edit/{id}", [TestimonialController::class, "testimonialItemEdit"])->name("admin.pages.about.testimonial.item.edit");
    Route::post("/testimonial/items/update", [TestimonialController::class, "testimonialItemUpdate"])->name("admin.pages.about.testimonial.item.update");
    Route::post("/testimonial/items/delete", [TestimonialController::class, "testimonialItemDelete"])->name("admin.pages.about.testimonial.item.delete");

    //counter
    Route::get('/counter', [AboutCounterController::class, 'index'])->name('admin.pages.about.counter');
    Route::put('/counter/update', [AboutCounterController::class, 'update'])->name('admin.pages.about.counter.update');
    //why
    Route::get('/why', [WhyController::class, 'index'])->name('admin.pages.why');
    Route::put('/why/update', [WhyController::class, 'update'])->name('admin.pages.why.update');
});

// instructor page 

Route::prefix('custom/instructor')->group(function () {
    Route::get('/', [PagesInstructorController::class, 'index'])->name('admin.pages.instructor');
    Route::post('/update', [PagesInstructorController::class, 'update'])->name('admin.pages.instructor.update');

    Route::get("/items", [PagesInstructorController::class, 'itemsIndex'])->name("admin.pages.instructor.items");
    Route::post("/items/store", [PagesInstructorController::class, 'itemsStore'])->name("admin.pages.instructor.items.store");
    Route::get("/items/edit/{id}", [PagesInstructorController::class, 'itemsEdit'])->name("admin.pages.instructor.items.edit");
    Route::post("/items/update", [PagesInstructorController::class, 'itemsUpdate'])->name("admin.pages.instructor.items.update");
    Route::post("/items/delete", [PagesInstructorController::class, 'itemsDelete'])->name("admin.pages.instructor.items.delete");

    Route::get("/service", [InstructorServiceController::class, 'serviceIndex'])->name("admin.pages.instructor.service");
    Route::post("/service/update", [InstructorServiceController::class, 'update'])->name("admin.pages.instructor.service.update");

    Route::get("/service/items", [InstructorServiceController::class, 'itemsIndex'])->name("admin.pages.instructor.service.items");
    Route::post("/service/items/store", [InstructorServiceController::class, 'itemsStore'])->name("admin.pages.instructor.service.items.store");
    Route::get("/service/items/edit/{id}", [InstructorServiceController::class, 'itemsEdit'])->name("admin.pages.instructor.service.items.edit");
    Route::post("/service/items/update", [InstructorServiceController::class, 'itemsUpdate'])->name("admin.pages.instructor.service.items.update");
    Route::post("/service/items/delete", [InstructorServiceController::class, 'itemsDelete'])->name("admin.pages.instructor.service.items.delete");
});


//event routes
Route::prefix("event")->group(function () {
    Route::get("/", [EventControllerBackend::class, 'index'])->name("admin.events.index");
    Route::get("/create", [EventControllerBackend::class, 'create'])->name("admin.events.create");
    Route::post("/store", [EventControllerBackend::class, 'store'])->name("admin.events.store");
    Route::get("/edit/{id}", [EventControllerBackend::class, 'edit'])->name("admin.events.edit");
    Route::post("/update/{id}", [EventControllerBackend::class, 'update'])->name("admin.events.update");
    Route::post("/delete", [EventControllerBackend::class, 'delete'])->name("admin.events.delete");
});

//newsletter routes
Route::get("/newsletter", [NewsletterController::class, 'index'])->name("admin.newsletter.index");
Route::post("/newsletter/delete", [NewsletterController::class, 'delete'])->name("admin.newsletter.delete");
Route::get("/bulk-email", [NewsletterController::class, 'bulkEmail'])->name("admin.bulk.email");
Route::post("/send-bulk-email", [NewsletterController::class, 'sendMail'])->name("admin.send.bulk.email");

//appierance routes
Route::get("/appearance", [HomeController::class, 'index'])->name("admin.appearance.index");

// appierance menu routes
Route::get("/appearance/menu", [MenuController::class, 'index'])->name("admin.appearance.menu");
Route::post("/appearance/menu/store", [MenuController::class, 'store'])->name("admin.appearance.menu.store");
Route::get("/appearance/menu/edit/{id}", [MenuController::class, 'edit'])->name("admin.appearance.menu.edit");
Route::post("/appearance/menu/update", [MenuController::class, 'update'])->name("admin.appearance.menu.update");
Route::post("/appearance/menu/delete", [MenuController::class, 'delete'])->name("admin.appearance.menu.delete");

//admin commission routes
Route::get("/setting/admin-commission", [CommissionController::class, 'adminCommission'])->name("admin.admin.commission");
Route::post("/setting/admin-commission-update", [CommissionController::class, 'adminCommissionUpdate'])->name("admin.admin.commission.update");

//currency routes
Route::get("/currency/change", [CurrencyController::class, 'currencyChange'])->name("admin.currency.change");


//payment routes
Route::get('/payment-method', [PaymentController::class, 'index'])->name('admin.payment.index');
Route::post("/payment-method-update", [PaymentController::class, 'paymentMethodUpdate'])->name("admin.payment.update");

//siteController 
Route::post("/site-settings-method-update", [SiteSettingsController::class, 'siteSettingsMethodUpdate'])->name("admin.site.settings.update");



// Book management routes
Route::name("admin.")->group(function () {
    Route::resource('book-categories', BookCategoryController::class);
    Route::resource('book-genres', BookGenreController::class);
    Route::resource('books', BookController::class);
    Route::post('/book-orders/update', [BookOrderController::class, 'bookOrderUpdate'])->name('book.orders.update');
    Route::post('/book-orders/delete', [BookOrderController::class, 'bookOrderDelete'])->name('book.orders.delete');
    Route::resource('book-orders', BookOrderController::class);
    Route::get('/book-orders-status', [BookOrderController::class, 'orderStatusChange'])->name('book.orders.edit.status');



    //book review routes
    Route::get('/book-review', [ReviewController::class, 'review'])->name('book.review');
    Route::get('/book-review/approve/{id}', [ReviewController::class, 'approveReview'])->name('book.review.approve');
    Route::get('/book-review/reject/{id}', [ReviewController::class, 'rejectReview'])->name('book.review.reject');
    Route::post('/book-review/delete', [ReviewController::class, 'deleteReview'])->name('book.review.delete');
});
