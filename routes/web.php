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
        'perfix' => '/superadmin',
        'middleware' => 'is_superadmin',
        'as'         => 'superadmin.',
    ], function () {
        Route::get('superadmin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('superadmin/courses', [CourseController::class, 'index'])->name('course');
        Route::put('superadmin/courses/store', [CourseController::class, 'store'])->name('course.store');
        Route::put('superadmin/courses/{id}/update', [CourseController::class, 'update'])->name('course.update');
        Route::get('superadmin/courses/show', [CourseController::class, 'show'])->name('course.show');
        Route::get('superadmin/courses/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
        Route::get('superadmin/courses/{id}/delete', [CourseController::class, 'delete'])->name('course.delete');

        Route::get('superadmin/courses/{id}/add_video', [VideoController::class, 'index'])->name('video');
        Route::get('superadmin/courses/{id}/add_video/show', [VideoController::class, 'show'])->name('video.show');
        Route::get('superadmin/courses/{id}/add_video/delete', [VideoController::class, 'delete'])->name('video.delete');
        Route::get('superadmin/courses/{id}/add_video/edit', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('superadmin/courses/{id}/add_video/store', [VideoController::class, 'store'])->name('video.store');
        Route::put('superadmin/courses/{id}/video/update', [VideoController::class, 'update'])->name('video.update');

        Route::get('superadmin/subscribers', [SubscriberController::class, 'index'])->name('subscriber');
        Route::get('superadmin/subscribers/show', [SubscriberController::class, 'show'])->name('subscriber.show');
        Route::get('superadmin/subscriber/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.edit');
        Route::get('superadmin/subscriber/{id}/delete', [SubscriberController::class, 'delete'])->name('subscriber.delete');
        Route::put('superadmin/subscriber/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.update');
        Route::put('superadmin/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

        Route::get('superadmin/subscriber/{id}/subscribtions', [ReceiptController::class, 'index'])->name('subscriber.receipt');
        Route::get('superadmin/subscriber/{id}/make_subscribtion', [ReceiptController::class, 'create'])->name('subscriber.receipt.make_receipt');
        Route::get('superadmin/subscriber/{id}/subscribtion/edit', [ReceiptController::class, 'edit'])->name('subscriber.receipt.edit');
        Route::put('superadmin/subscriber/{id}/subscribtion/update', [ReceiptController::class, 'update'])->name('subscriber.receipt.update');
        Route::get('superadmin/subscriber/{id}/subscribtion/delete', [ReceiptController::class, 'delete'])->name('subscriber.receipt.delete');
        Route::put('superadmin/subscriber/{id}/subscribtion/store', [ReceiptController::class, 'store'])->name('subscriber.receipt.store');

        Route::get('superadmin/admins', [SubscriberController::class, 'index_admin'])->name('subscriber.admin');
        Route::get('superadmin/admins/show', [SubscriberController::class, 'show_admin'])->name('subscriber.admin.show');
        Route::get('superadmin/admins/{id}/delete', [SubscriberController::class, 'delete'])->name('subscriber.admin.delete');
        Route::get('superadmin/admin/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.admin.edit');
        Route::put('superadmin/admin/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.admin.update');
        Route::put('superadmin/admin/store', [SubscriberController::class, 'store'])->name('subscriber.admin.store');
    });
});

require __DIR__ . '/auth.php';
