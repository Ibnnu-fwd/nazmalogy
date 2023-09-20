<?php

use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseChapterController;
use App\Http\Controllers\Admin\CourseChapterReviewController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\CourseLastTaskController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilitatorController;
use App\Http\Controllers\Admin\PlaylistController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\PointTypeController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\GeneralTestimonialController;
use App\Http\Controllers\User\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HelpController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Facilitator\DashboardController as FacilitatorDashboardController;
use App\Http\Controllers\Facilitator\CourseController as FacilitatorCourseController;
use App\Http\Controllers\Facilitator\PointController as FacilitatorPointController;
use App\Http\Controllers\Facilitator\TransactionController as FacilitatorTransactionController;
use App\Http\Controllers\Facilitator\PlaylistController as FacilitatorPlaylistController;
use App\Http\Controllers\Facilitator\CourseLastTaskController as FacilitatorCourseLastTaskController;
use App\Http\Controllers\Facilitator\EnrollPaymentController;
use App\Http\Controllers\Facilitator\LearningController as FacilitatorLearningController;
use App\Http\Controllers\Facilitator\ProfileController as FacilitatorProfileController;
use App\Http\Controllers\Facilitator\ReferalController;
use App\Http\Controllers\Facilitator\SubmissionController;
use App\Http\Controllers\Facilitator\UserCourseLastTaskController as FacilitatorUserCourseLastTaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\LearningController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\LearningHistoryController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\User\CourseLastTaskController as UserCourseLastTaskController;
use App\Http\Controllers\User\PointController as UserPointController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('auth.login');

Route::get('help', [HelpController::class, 'index'])->name('user.help.index');
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('course-player', [CourseController::class, 'player'])->name('course.player');

Route::get('course/{id}/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('course/{id}/quiz/question', [QuizController::class, 'question'])->name('quiz.index.question');
Route::get('course/{id}/quiz/last-question', [QuizController::class, 'lastQuestion'])->name('quiz.index.last-question');
Route::get('course/{id}/quiz/result', [QuizController::class, 'result'])->name('quiz.result');

Route::get('/generatePDF/{course_id}/{user_id}', [FillPDFController::class, 'process'])->name('generatePDF');

// Admin
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index')->middleware('check-role:admin');

    // Course
    Route::post('course/{id}/recover', [AdminCourseController::class, 'recover'])->name('admin.course.recover')->middleware('check-role:admin');
    Route::resource('course', AdminCourseController::class, ['as' => 'admin'])->middleware('check-role:admin');

    // Course Last Task
    Route::group(['prefix' => 'course-last-task', 'as' => 'admin.course-last-task.'], function () {
        Route::get('{course_id}', [CourseLastTaskController::class, 'index'])->name('index');
        Route::get('{id}/show', [CourseLastTaskController::class, 'show'])->name('show');
        Route::post('{course_id}', [CourseLastTaskController::class, 'store'])->name('store');
        Route::put('{id}', [CourseLastTaskController::class, 'update'])->name('update');
        Route::delete('{id}', [CourseLastTaskController::class, 'destroy'])->name('destroy');
        Route::post('{id}/restore', [CourseLastTaskController::class, 'restore'])->name('restore');
    })->middleware('check-role:admin');

    // Course Category
    Route::post('course-category/{id}/restore', [CourseCategoryController::class, 'restore'])->name('admin.course-category.restore')->middleware('check-role:admin');
    Route::resource('course-category', CourseCategoryController::class, ['as' => 'admin'])->middleware('check-role:admin');

    // Playlist
    Route::group(['prefix' => 'playlist', 'as' => 'admin.playlist.'], function () {
        Route::get('{course_id}', [PlaylistController::class, 'index'])->name('index');
        Route::get('{id}/show', [PlaylistController::class, 'show'])->name('show');
        Route::post('{course_id}', [PlaylistController::class, 'store'])->name('store');
        Route::put('{id}', [PlaylistController::class, 'update'])->name('update');
        Route::delete('{id}', [PlaylistController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:admin');

    // Quiz
    Route::group(['prefix' => 'quiz', 'as' => 'admin.quiz.'], function () {
        Route::get('{playlist_id}', [AdminQuizController::class, 'index'])->name('index');
        Route::get('{id}/show', [AdminQuizController::class, 'show'])->name('show');
        Route::post('{playlist_id}', [AdminQuizController::class, 'store'])->name('store');
        Route::put('{id}', [AdminQuizController::class, 'update'])->name('update');
        Route::delete('{id}', [AdminQuizController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:admin');

    // Question
    Route::group(['prefix' => 'question', 'as' => 'admin.question.'], function () {
        Route::get('{quiz_id}', [QuestionController::class, 'index'])->name('index');
        Route::get('{id}/show', [QuestionController::class, 'show'])->name('show');
        Route::post('{quiz_id}', [QuestionController::class, 'store'])->name('store');
        Route::put('{id}', [QuestionController::class, 'update'])->name('update');
        Route::delete('{id}', [QuestionController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:admin');

    // Course Chapter
    Route::group(['prefix' => 'course-chapter', 'as' => 'admin.course-chapter.'], function () {
        Route::get('{playlist_id}', [CourseChapterController::class, 'index'])->name('index');
        Route::get('{id}/show', [CourseChapterController::class, 'show'])->name('show');
        Route::post('{playlist_id}', [CourseChapterController::class, 'store'])->name('store');
        Route::put('{id}', [CourseChapterController::class, 'update'])->name('update');
        Route::delete('{id}', [CourseChapterController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:admin');

    // Course Chapter Review
    Route::group(['prefix' => 'course-chapter-review', 'as' => 'admin.course-chapter-review.'], function () {
        Route::get('{course_chapter_id}', [CourseChapterReviewController::class, 'index'])->name('index');
        Route::get('{id}/show', [CourseChapterReviewController::class, 'show'])->name('show');
    })->middleware('check-role:admin');

    // Point Type
    Route::group(['prefix' => 'point-type', 'as' => 'admin.point-type.'], function () {
        Route::get('/', [PointTypeController::class, 'index'])->name('index');
        Route::get('{id}/show', [PointTypeController::class, 'show'])->name('show');
        Route::post('/', [PointTypeController::class, 'store'])->name('store');
        Route::put('{id}', [PointTypeController::class, 'update'])->name('update');
        Route::delete('{id}', [PointTypeController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:admin');

    // Point
    Route::group(['prefix' => 'point', 'as' => 'admin.point.'], function () {
        Route::get('/', [PointController::class, 'index'])->name('index');
        Route::get('{id}/show', [PointController::class, 'show'])->name('show');
        Route::post('/', [PointController::class, 'store'])->name('store');
        Route::put('{id}', [PointController::class, 'update'])->name('update');
        Route::delete('{id}', [PointController::class, 'destroy'])->name('destroy');
        Route::get('{id}/history', [PointController::class, 'history'])->name('history');
    })->middleware('check-role:admin');

    // Transaction
    Route::group(['prefix' => 'transaction', 'as' => 'admin.transaction.'], function () {
        Route::get('/', [AdminTransactionController::class, 'index'])->name('index');
        Route::get('{id}/show', [AdminTransactionController::class, 'show'])->name('show');
        Route::post('{id}/change-status', [AdminTransactionController::class, 'changeStatus'])->name('change-status');
    })->middleware('check-role:admin');

    // Facilitator
    Route::group(['prefix' => 'facilitator', 'as' => 'admin.facilitator.'], function () {
        Route::get('/', [FacilitatorController::class, 'index'])->name('index');
        Route::get('{id}/show', [FacilitatorController::class, 'show'])->name('show');
        Route::post('/', [FacilitatorController::class, 'store'])->name('store');
        Route::put('{id}', [FacilitatorController::class, 'update'])->name('update');
        Route::post('{id}', [FacilitatorController::class, 'destroy'])->name('destroy');
        Route::post('{id}/restore', [FacilitatorController::class, 'restore'])->name('restore');
    });

    //General Testimonial
    Route::group(['prefix' => 'testimonial', 'as' => 'admin.testimonial.'], function () {
        Route::get('/', [GeneralTestimonialController::class, 'index'])->name('index');
        Route::get('{id}/show', [GeneralTestimonialController::class, 'show'])->name('show');
        Route::post('/', [GeneralTestimonialController::class, 'store'])->name('store');
        Route::put('{id}', [GeneralTestimonialController::class, 'update'])->name('update');
        Route::delete('{id}', [GeneralTestimonialController::class, 'destroy'])->name('destroy');
    });
});

// User
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard.index')->middleware('check-role:user');

    // Learning
    Route::group(['prefix' => 'learn', 'as' => 'user.learn'], function () {
        Route::get('{playlist_id}/chapter/{chapter_id}', [LearningController::class, 'chapter'])->name('.chapter');
        Route::post('{playlist_id}/chapter/{chapter_id}/comment', [LearningController::class, 'comment'])->name('.comment');
        Route::get('{playlist_id}/chapter/{chapter_id}/{finish_time}/complete', [LearningController::class, 'complete'])->name('.complete');
        Route::get('{playlist_id}/{quiz_id}/quiz', [LearningController::class, 'quiz'])->name('.quiz');
        Route::get('{playlist_id}/{quiz_id}/quiz/replay', [LearningController::class, 'replay'])->name('.replay');
        Route::get('{playlist_id}/{quiz_id}/quiz/question', [LearningController::class, 'question'])->name('.question');
        Route::post('{playlist_id}/{quiz_id}/quiz/answer', [LearningController::class, 'answer'])->name('.answer');
        Route::get('{playlist}/{quiz_id}/quiz/result', [LearningController::class, 'result'])->name('.result');
    });

    // Transaction
    Route::group(['prefix' => 'transaction', 'as' => 'user.transaction.'], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('{id}/show', [TransactionController::class, 'show'])->name('show');
        Route::post('store', [TransactionController::class, 'store'])->name('store');
        Route::post('upload-proof/{id}', [TransactionController::class, 'uploadProof'])->name('upload-proof');
        Route::get('{id}/detail', [TransactionController::class, 'detail'])->name('detail');
        Route::post('{id}/attempt-referral', [TransactionController::class, 'attemptReferral'])->name('attempt-referral');
    });

    // Course
    Route::group(['prefix' => 'course', 'as' => 'user.course.'], function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('{id}/show', [CourseController::class, 'show'])->name('show');
        Route::get('{id}/player', [CourseController::class, 'player'])->name('player');
    });

    // Last Task
    Route::group(['prefix' => 'last-task', 'as' => 'user.last-task.'], function () {
        Route::get('{id}', [UserCourseLastTaskController::class, 'index'])->name('index');
        Route::post('{id}/attempt', [UserCourseLastTaskController::class, 'attempt'])->name('attempt');
    });

    // Profile
    Route::group(['prefix' => 'profile', 'as' => 'user.profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('{id}', [ProfileController::class, 'update'])->name('update');
    });

    //Poin
    Route::group(['prefix' => 'point', 'as' => 'user.point.'], function () {
        Route::get('/', [UserPointController::class, 'index'])->name('index');
    })->middleware('check-role:user');

    //History
    Route::group(['prefix' => 'history', 'as' => 'user.history.'], function () {
        Route::get('/', [LearningHistoryController::class, 'index'])->name('index');
    })->middleware('check-role:user');
});

// Facilitator
Route::group(['prefix' => 'facilitator', 'middleware' => ['auth']], function () {
    Route::get('/', [FacilitatorDashboardController::class, 'index'])->name('facilitator.index')->middleware('check-role:facilitator');

    // Course
    Route::resource('course', FacilitatorCourseController::class, ['as' => 'facilitator'])->middleware('check-role:facilitator');
    Route::post('course/{id}/recover', [FacilitatorCourseController::class, 'recover'])->name('facilitator.course.recover')->middleware('check-role:facilitator');

    //Submission
    Route::get('submission', [SubmissionController::class, 'index'])->name('facilitator.submission.index');
    Route::get('submission/{id}/show', [SubmissionController::class, 'show'])->name('facilitator.submission.show');
    Route::post('submission/{id}/change-status', [SubmissionController::class, 'changeStatus'])->name('facilitator.submission.change-status');

    // Playlist
    Route::group(['prefix' => 'playlist', 'as' => 'facilitator.playlist.'], function () {
        Route::get('{course_id}', [FacilitatorPlaylistController::class, 'index'])->name('index');
        Route::get('{id}/show', [FacilitatorPlaylistController::class, 'show'])->name('show');
        Route::post('{course_id}', [FacilitatorPlaylistController::class, 'store'])->name('store');
        Route::put('{id}', [FacilitatorPlaylistController::class, 'update'])->name('update');
        Route::delete('{id}', [FacilitatorPlaylistController::class, 'destroy'])->name('destroy');
    })->middleware('check-role:facilitator');

    // Course Last Task
    Route::group(['prefix' => 'course-last-task', 'as' => 'facilitator.course-last-task.'], function () {
        Route::get('{course_id}', [FacilitatorCourseLastTaskController::class, 'index'])->name('index');
        Route::get('{id}/show', [FacilitatorCourseLastTaskController::class, 'show'])->name('show');
        Route::post('{course_id}', [FacilitatorFacilitatorCourseLastTaskController::class, 'store'])->name('store');
        Route::put('{id}', [FacilitatorCourseLastTaskController::class, 'update'])->name('update');
        Route::delete('{id}', [FacilitatorCourseLastTaskController::class, 'destroy'])->name('destroy');
        Route::post('{id}/restore', [FacilitatorCourseLastTaskController::class, 'restore'])->name('restore');
    })->middleware('check-role:facilitator');

    //Poin
    Route::group(['prefix' => 'point', 'as' => 'facilitator.point.'], function () {
        Route::get('/', [FacilitatorPointController::class, 'index'])->name('index');
        Route::get('{id}/show', [FacilitatorPointController::class, 'show'])->name('show');
        Route::post('/', [FacilitatorPointController::class, 'store'])->name('store');
        Route::put('{id}', [FacilitatorPointController::class, 'update'])->name('update');
        Route::delete('{id}', [FacilitatorPointController::class, 'destroy'])->name('destroy');
        Route::get('{id}/history', [FacilitatorPointController::class, 'history'])->name('history');
    })->middleware('check-role:facilitator');


    // Transaction Member
    Route::group(['prefix' => 'transaction', 'as' => 'facilitator.transaction.'], function () {
        Route::get('/', [FacilitatorTransactionController::class, 'index'])->name('index');
        Route::get('{id}/show', [FacilitatorTransactionController::class, 'show'])->name('show');
        Route::post('store', [FacilitatorTransactionController::class, 'store'])->name('store');
        Route::post('upload-proof/{id}', [FacilitatorTransactionController::class, 'uploadProof'])->name('upload-proof');
    })->middleware('check-role:facilitator');

    // Enroll Payment
    Route::group(['prefix' => 'transaction-member', 'as' => 'facilitator.transaction-member.'], function () {
        Route::get('/', [EnrollPaymentController::class, 'index'])->name('index');
        Route::get('{id}/show', [EnrollPaymentController::class, 'show'])->name('show');
        Route::post('store', [EnrollPaymentController::class, 'store'])->name('store');
        Route::post('upload-proof/{id}', [EnrollPaymentController::class, 'uploadProof'])->name('upload-proof');
    });

    // Learning
    Route::group(['prefix' => 'learn', 'as' => 'facilitator.learn'], function () {
        Route::get('{playlist_id}/chapter/{chapter_id}', [FacilitatorLearningController::class, 'chapter'])->name('.chapter');
        Route::post('{playlist_id}/chapter/{chapter_id}/comment', [FacilitatorLearningController::class, 'comment'])->name('.comment');
        Route::get('{playlist_id}/chapter/{chapter_id}/{finish_time}/complete', [FacilitatorLearningController::class, 'complete'])->name('.complete');
        Route::get('{playlist_id}/{quiz_id}/quiz', [FacilitatorLearningController::class, 'quiz'])->name('.quiz');
        Route::get('{playlist_id}/{quiz_id}/quiz/replay', [FacilitatorLearningController::class, 'replay'])->name('.replay');
        Route::get('{playlist_id}/{quiz_id}/quiz/question', [FacilitatorLearningController::class, 'question'])->name('.question');
        Route::post('{playlist_id}/{quiz_id}/quiz/answer', [FacilitatorLearningController::class, 'answer'])->name('.answer');
        Route::get('{playlist}/{quiz_id}/quiz/result', [FacilitatorLearningController::class, 'result'])->name('.result');
    });

    // Last Task
    Route::group(['prefix' => 'last-task', 'as' => 'facilitator.last-task.'], function () {
        Route::get('{id}', [FacilitatorUserCourseLastTaskController::class, 'index'])->name('index');
        Route::post('{id}/attempt', [UserCourseLastTaskController::class, 'attempt'])->name('attempt');
    });

    // Referal
    Route::group(['prefix' => 'referal', 'as' => 'facilitator.referal.'], function () {
        Route::get('/', [ReferalController::class, 'index'])->name('index');
        Route::get('{id}/show', [ReferalController::class, 'show'])->name('show');
        Route::post('/', [ReferalController::class, 'store'])->name('store');
        Route::put('{id}', [ReferalController::class, 'update'])->name('update');
        Route::delete('{id}', [ReferalController::class, 'destroy'])->name('destroy');
        Route::post('{id}/restore', [ReferalController::class, 'restore'])->name('restore');
    })->middleware('check-role:facilitator');

    // Profile
    Route::group(['prefix' => 'profile', 'as' => 'facilitator.profile.'], function () {
        Route::get('/', [FacilitatorProfileController::class, 'index'])->name('index');
        Route::put('{id}', [FacilitatorProfileController::class, 'update'])->name('update');
    });

    //Facil Learning History
    Route::group(['prefix' => 'history', 'as' => 'facilitator.history.'], function () {
        Route::get('/', [LearningHistoryController::class, 'index'])->name('index');
    })->middleware('check-role:facilitator');

    //Member Learning History
    Route::group(['prefix' => 'history-member', 'as' => 'facilitator.history-member.'], function () {
        Route::get('/', [LearningHistoryController::class, 'index'])->name('index');
    })->middleware('check-role:facilitator');
});


require __DIR__ . '/auth.php';
