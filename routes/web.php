<?php

use App\Http\Controllers\Admin\AllPageContentController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\NewsBlogController as AdminNewsBlogController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\CareerSubmissionController as AdminCareerSubmissionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PoliciesController as AdminPoliciesController;

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\VendorListController;
use App\Http\Controllers\CustomerListController;
use App\Http\Controllers\FeedbackListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsBlogController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\CareerController as PageCareerController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/careers', [PageCareerController::class, 'index'])->name('career');
Route::get('/careers/{slug}', [PageCareerController::class, 'show'])->name('careers.show');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{category}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/news-blog', [NewsBlogController::class, 'index'])->name('news.blog');
// Route::get('/news-blog/{slug}', [NewsBlogController::class, 'show'])->name('news.blog.show');
// Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/policies', [PoliciesController::class, 'index'])->name('policies');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Auth::routes();

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/contact-us', 'contact')->name('contact');

Route::post('/careers/filter', [PageCareerController::class, 'filter'])->name('careers.filter');
Route::post('/vendor-list', [VendorListController::class, 'store'])->name('vendor.store');
Route::post('/customer-list', [CustomerListController::class, 'store'])->name('customer.store');
Route::post('/feedback-list', [FeedbackListController::class, 'store'])->name('feedback.store');


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

    Route::resource('home_page_sections', HomePageController::class);
    Route::resource('home_banners', HomeBannerController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('news_blog', AdminNewsBlogController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('career', AdminCareerController::class);
    Route::resource('career_submissions', AdminCareerSubmissionController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('certificates', AdminCertificateController::class);
    Route::resource('vendor_list', VendorController::class);
    Route::resource('customer_list', CustomerController::class);
    Route::resource('feedback_list', FeedbackController::class);
    Route::resource('policies', PoliciesController::class);
    Route::resource('all_page_content', AllPageContentController::class);
});
