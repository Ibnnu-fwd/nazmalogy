<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\CourseInterface::class, \App\Repositories\CourseRepository::class);
        $this->app->bind(\App\Interfaces\CourseCategoryInterface::class, \App\Repositories\CourseCategoryRepository::class);
        $this->app->bind(\App\Interfaces\PlaylistInterface::class, \App\Repositories\PlaylistRepository::class);
        $this->app->bind(\App\Interfaces\CourseChapterInterface::class, \App\Repositories\CourseChapterRepository::class);
        $this->app->bind(\App\Interfaces\QuizInterface::class, \App\Repositories\QuizRepository::class);
        $this->app->bind(\App\Interfaces\QuestionInterface::class, \App\Repositories\QuestionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
