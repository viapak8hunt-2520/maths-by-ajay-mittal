<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\StudyResourceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestPaperController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::middleware('can:manage-content')->group(function () {
        Route::resource('course-categories', CourseCategoryController::class)->except(['show']);
        Route::post('courses/{course}/duplicate', [CourseController::class, 'duplicate'])->name('courses.duplicate');
        Route::resource('courses', CourseController::class);
        Route::resource('courses.chapters', ChapterController::class)->shallow()->except(['show']);
        Route::resource('resources', StudyResourceController::class)->except(['show']);
        Route::resource('test-papers', TestPaperController::class)->except(['show']);
        Route::resource('faqs', FaqController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('achievements', AchievementController::class)->except(['show']);
        Route::get('site-content', [SiteContentController::class, 'edit'])->name('site-content.edit');
        Route::put('site-content', [SiteContentController::class, 'update'])->name('site-content.update');
        Route::get('media', [MediaController::class, 'index'])->name('media.index');
    });

    Route::middleware('can:manage-enquiries')->group(function () {
        Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::put('enquiries/{enquiry}', [EnquiryController::class, 'update'])->name('enquiries.update');
    });
});
