<?php

use App\Http\Controllers\CourseController;

use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SubloginController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\superadmin\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LanguageSwitcherController;

use App\Models\course;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::post('upload', [UploadController::class, 'upload']);

Route::get('lang/{lang}', [LanguageSwitcherController::class, 'switchLang'])->name('lang.switch');

Route::get('/user/login', [SubloginController::class, 'index'])->name('sub_login');
Route::post('/user/login/check', [SubloginController::class, 'check'])->name('sub_login.check');

Route::group(['middleware' => 'visitor'], function () {


    Route::get('/', function () {
        $courses = Course::orderBy('id', 'desc')->take(3)->get();
        return view('index', ['courses' => $courses]);
    })->name('index');

    Route::get('/more_courses', [CourseController::class, 'sub_show'])->name('course.index');
    Route::get('/more_courses/search', [CourseController::class, 'sub_search'])->name('course.index.search');

    Route::group(['middleware' => 'is_loged'], function () {
        Route::get('/user/logout', [SubloginController::class, 'logout'])->name('sub_logout');
        Route::group([
            'middleware' => 'is_subscribed'
        ], function () {
            Route::get('/coursevideos/{id}', [VideoController::class, 'sub_index'])->name('videocourse');
            Route::get('/coursevideos/{id}/play', [VideoController::class, 'sub_play'])->name('videocourse.play');
        });
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'superadmin',
        'middleware' => 'is_superadmin:Both',
        'as'         => 'superadmin.',
    ], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('courses', [CourseController::class, 'index'])->name('course');
        Route::put('courses/store', [CourseController::class, 'store'])->name('course.store');
        Route::put('courses/{id}/update', [CourseController::class, 'update'])->name('course.update');
        Route::get('courses/show', [CourseController::class, 'show'])->name('course.show');
        Route::get('courses/search', [CourseController::class, 'search'])->name('course.search');
        Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
        Route::get('courses/{id}/delete', [CourseController::class, 'delete'])->name('course.delete');

        Route::get('courses/{id}/add_video', [VideoController::class, 'index'])->name('video');
        Route::get('courses/{id}/add_video/show', [VideoController::class, 'show'])->name('video.show');
        Route::get('courses/{id}/add_video/search', [VideoController::class, 'search'])->name('video.search');
        Route::get('courses/{id}/add_video/delete', [VideoController::class, 'delete'])->name('video.delete');
        Route::get('courses/{id}/add_video/edit', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('courses/{id}/add_video/store', [VideoController::class, 'store'])->name('video.store');
        Route::put('courses/{id}/video/update', [VideoController::class, 'update'])->name('video.update');

        Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscriber');
        Route::get('subscribers/show', [SubscriberController::class, 'show'])->name('subscriber.show');
        Route::get('subscribers/search', [SubscriberController::class, 'search'])->name('subscriber.search');
        Route::get('subscriber/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.edit');
        Route::get('subscriber/{id}/delete', [SubscriberController::class, 'delete'])->name('subscriber.delete');
        Route::put('subscriber/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.update');
        Route::put('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

        Route::get('subscriber/{id}/subscribtions', [ReceiptController::class, 'index'])->name('subscriber.receipt');
        Route::get('subscriber/{id}/make_subscribtion', [ReceiptController::class, 'create'])->name('subscriber.receipt.make_receipt');
        Route::get('subscriber/{id}/subscribtion/edit', [ReceiptController::class, 'edit'])->name('subscriber.receipt.edit');
        Route::put('subscriber/{id}/subscribtion/update', [ReceiptController::class, 'update'])->name('subscriber.receipt.update');
        Route::get('subscriber/{id}/subscribtion/delete', [ReceiptController::class, 'delete'])->name('subscriber.receipt.delete');
        Route::put('subscriber/{id}/subscribtion/store', [ReceiptController::class, 'store'])->name('subscriber.receipt.store');


        Route::group(['middleware' => 'is_superadmin:superadminOnly'], function () {
            Route::get('admins', [SubscriberController::class, 'index_admin'])->name('subscriber.admin');
            Route::get('admins/show', [SubscriberController::class, 'show_admin'])->name('subscriber.admin.show');
            Route::get('admins/search', [SubscriberController::class, 'search_admin'])->name('subscriber.admin.search');
            Route::get('admins/{id}/delete', [SubscriberController::class, 'delete'])->name('subscriber.admin.delete');
            Route::get('admin/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.admin.edit');
            Route::put('admin/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.admin.update');
            Route::put('admin/store', [SubscriberController::class, 'store'])->name('subscriber.admin.store');
        });
    });
});

require __DIR__ . '/auth.php';
