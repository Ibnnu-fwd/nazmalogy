<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HelpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});

Route::get('help', [HelpController::class, 'index'])->name('user.help.index');
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course-player', [CourseController::class, 'player'])->name('course.player');


require __DIR__ . '/auth.php';
