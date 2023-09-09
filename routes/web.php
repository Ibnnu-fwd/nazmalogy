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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/help', [HelpController::class, 'index'])->name('user.help.index');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course-player', [CourseController::class, 'player'])->name('course.player');


require __DIR__ . '/auth.php';
