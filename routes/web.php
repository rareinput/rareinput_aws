<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SequenceController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScriptsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\LandingPagePublicController;
use Illuminate\Support\Facades\Route;

// Hardcoded landing pages (reference templates — comment out before going to production)
Route::get('/christmas-offer', fn () => view('landing-pages.christmas-offer'))->name('landing.christmas-offer');
Route::get('/shopify-development', fn () => view('landing-pages.shopify-development'))->name('landing.shopify-development');

// Sitemap
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

// Public routes
Route::get('/', HomeController::class)->name('home');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/shopify', [ServiceController::class, 'shopify'])->name('services.shopify');
Route::get('/services/wordpress', [ServiceController::class, 'wordpress'])->name('services.wordpress');
Route::get('/services/web-development', [ServiceController::class, 'webDevelopment'])->name('services.web-development');
Route::get('/services/app-development', [ServiceController::class, 'appDevelopment'])->name('services.app-development');
Route::get('/services/seo', [ServiceController::class, 'seo'])->name('services.seo');
Route::get('/services/performance-marketing', [ServiceController::class, 'performanceMarketing'])->name('services.performance-marketing');
Route::get('/services/email-marketing', [ServiceController::class, 'emailMarketing'])->name('services.email-marketing');
Route::get('/services/social-media', [ServiceController::class, 'socialMedia'])->name('services.social-media');


Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/faq', 'faq')->name('faq');
Route::view('/about', 'about')->name('about');
Route::get('/careers', CareersController::class)->name('careers');
Route::get('/careers/apply/{jobPosting}', [JobApplicationController::class, 'show'])->name('careers.apply');
Route::post('/careers/apply/{jobPosting}', [JobApplicationController::class, 'store'])->name('careers.apply.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');
Route::get('/unsubscribe/{token}', [SubscribeController::class, 'unsubscribe'])->name('unsubscribe');

// Admin routes (authenticated)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::delete('posts/bulk', [PostController::class, 'bulkDestroy'])->name('posts.bulk-destroy');
    Route::resource('posts', PostController::class);
    Route::resource('job-postings', JobPostingController::class);
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::patch('applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::delete('applications', [ApplicationController::class, 'bulkDestroy'])->name('applications.bulk-destroy');
    Route::get('applications/{application}/download', [ApplicationController::class, 'download'])->name('applications.download');
    Route::resource('subscribers', SubscriberController::class)->except(['show']);
    Route::resource('tags', TagController::class)->except(['show']);
    Route::resource('sequences', SequenceController::class);
    Route::resource('categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::get('scripts', [ScriptsController::class, 'edit'])->name('scripts.edit');
    Route::put('scripts', [ScriptsController::class, 'update'])->name('scripts.update');
    Route::get('landing-pages/{landing_page}/preview', [LandingPageController::class, 'preview'])->name('landing-pages.preview');
    Route::post('landing-pages/{landing_page}/duplicate', [LandingPageController::class, 'duplicate'])->name('landing-pages.duplicate');
    Route::resource('landing-pages', LandingPageController::class);
});

require __DIR__.'/auth.php';

// Catch-all for CMS landing pages — MUST be last
Route::get('/{slug}', LandingPagePublicController::class)->name('landing-page.show');
