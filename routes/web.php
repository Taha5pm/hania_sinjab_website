<?php

use App\Http\Controllers\CourseController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/courses', [CourseController::class, 'index'])->name('course.index');
Route::get('/videocourse', function () {
    return view('videocourse');
})->name('videocourse');

Route::get('/log', function () {
    return view('login');
})->name('login');
