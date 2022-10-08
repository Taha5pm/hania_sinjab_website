<?php

use App\Http\Controllers\CourseController;

use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\superadmin\DashboardController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::post('upload', [UploadController::class, 'upload']);

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/user/login', function () {
    return view('sub_login');
})->name('sub_login');

Route::get('/more_courses', [CourseController::class, 'sub_show'])->name('course.index');

Route::get('/coursevideos/{id}', [VideoController::class, 'sub_index'])->name('videocourse');
Route::get('/coursevideos/{id}/play', [VideoController::class, 'sub_play'])->name('videocourse.play');


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

        Route::get('superadmin/courses/{id}/add_video', [VideoController::class, 'index'])->name('video');
        Route::get('superadmin/courses/{id}/add_video/show', [VideoController::class, 'show'])->name('video.show');
        Route::get('superadmin/courses/{id}/add_video/edit', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('superadmin/courses/{id}/add_video/store', [VideoController::class, 'store'])->name('video.store');
        Route::put('superadmin/courses/{id}/video/update', [VideoController::class, 'update'])->name('video.update');

        Route::get('superadmin/subscribers', [SubscriberController::class, 'index'])->name('subscriber');
        Route::get('superadmin/subscribers/show', [SubscriberController::class, 'show'])->name('subscriber.show');
        Route::get('superadmin/subscriber/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.edit');
        Route::put('superadmin/subscriber/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.update');
        Route::put('superadmin/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

        Route::get('superadmin/subscriber/{id}/receipts', [ReceiptController::class, 'index'])->name('subscriber.receipt');
        Route::get('superadmin/subscriber/{id}/make_receipt', [ReceiptController::class, 'create'])->name('subscriber.receipt.make_receipt');
        Route::put('superadmin/subscriber/{id}/receipt/store', [ReceiptController::class, 'store'])->name('subscriber.receipt.store');

        Route::get('superadmin/admins', [SubscriberController::class, 'index_admin'])->name('subscriber.admin');
        Route::get('superadmin/admins/show', [SubscriberController::class, 'show_admin'])->name('subscriber.admin.show');
        Route::get('superadmin/admin/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.admin.edit');
        Route::put('superadmin/admin/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.admin.update');
        Route::put('superadmin/admin/store', [SubscriberController::class, 'store'])->name('subscriber.admin.store');
    });
});

require __DIR__ . '/auth.php';
