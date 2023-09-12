<?php

use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HelpController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\QuizController;
use App\Models\CourseCategory;

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

Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('auth.login');

Route::get('help', [HelpController::class, 'index'])->name('user.help.index');
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course-player', [CourseController::class, 'player'])->name('course.player');

Route::get('course/{id}/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('course/{id}/quiz/question', [QuizController::class, 'question'])->name('quiz.index.question');
Route::get('course/{id}/quiz/last-question', [QuizController::class, 'lastQuestion'])->name('quiz.index.last-question');
Route::get('course/{id}/quiz/result', [QuizController::class, 'result'])->name('quiz.result');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Course
    Route::post('course/{id}/recover', [AdminCourseController::class, 'recover'])->name('admin.course.recover');
    Route::resource('course', AdminCourseController::class, ['as' => 'admin']);

    // Course Category
    Route::post('course-category/{id}/restore', [CourseCategoryController::class, 'restore'])->name('admin.course-category.restore');
    Route::resource('course-category', CourseCategoryController::class, ['as' => 'admin']);
});


require __DIR__ . '/auth.php';
