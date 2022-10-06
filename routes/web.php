<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\superadmin\DashboardController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('upload', [UploadController::class, 'upload']);

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

        Route::get('superadmin/subscriber', [SubscriberController::class, 'index'])->name('subscriber');
        Route::get('superadmin/subscriber/show', [SubscriberController::class, 'show'])->name('subscriber.show');
        Route::get('superadmin/subscriber/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.edit');
        Route::put('superadmin/subscriber/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.update');
        Route::put('superadmin/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

        Route::get('superadmin/admin', [SubscriberController::class, 'index_admin'])->name('subscriber.admin');
        Route::get('superadmin/admin/show', [SubscriberController::class, 'show_admin'])->name('subscriber.admin.show');
        Route::get('superadmin/admin/{id}/edit', [SubscriberController::class, 'edit'])->name('subscriber.admin.edit');
        Route::put('superadmin/admin/{id}/update', [SubscriberController::class, 'update'])->name('subscriber.admin.update');
        Route::put('superadmin/admin/store', [SubscriberController::class, 'store'])->name('subscriber.admin.store');
    });
});


require __DIR__ . '/auth.php';
