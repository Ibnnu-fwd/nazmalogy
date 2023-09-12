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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
