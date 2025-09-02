<?php

use App\Http\Controllers\Admin\AllPageContentController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\NewsBlogController as AdminNewsBlogController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\CareerSubmissionController as AdminCareerSubmissionController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\VendorController as AdminVendorController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\PoliciesController as AdminPoliciesController;

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\NewsBlogController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\CareerController as PageCareerController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/careers', [PageCareerController::class, 'index'])->name('career');
Route::get('/careers/{id}', [PageCareerController::class, 'show'])->name('careers.show');

Route::get('/careers/{id}/apply', [PageCareerController::class, 'apply'])->name('apply.form');
Route::post('/careers/{id}/apply', [PageCareerController::class, 'submit'])->name('apply.submit');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{category}', [ProductController::class, 'show'])->name('products.show');

Route::post('/customer-list/store', [ContactFormController::class, 'storeCustomer'])->name('customer_list.public_store');
Route::post('/vendor-list/store', [ContactFormController::class, 'storeVendor'])->name('vendor_list.public_store');
Route::post('/feedback-list/store', [ContactFormController::class, 'storeFeedback'])->name('feedback_list.public_store');

Route::get('/media', [NewsBlogController::class, 'index'])->name('media.index');
Route::get('/media/{id}', [NewsBlogController::class, 'show'])->name('media.show');

// Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/policies', [PoliciesController::class, 'index'])->name('policies');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Auth::routes();

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/contact-us', 'contact')->name('contact');

Route::post('/careers/filter', [PageCareerController::class, 'filter'])->name('careers.filter');


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
    Route::resource('reviews', AdminReviewController::class);
    Route::resource('certificates', AdminCertificateController::class);
    Route::resource('vendor_list', AdminVendorController::class);
    Route::resource('customer_list', AdminCustomerController::class);
    Route::resource('feedback_list', AdminFeedbackController::class);
    Route::resource('policies', AdminPoliciesController::class);
    Route::resource('all_page_content', AllPageContentController::class);
});
