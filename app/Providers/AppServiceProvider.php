<?php

namespace App\Providers;

use App\Models\Contact;
use App\Repositories\AboutRepository;
use App\Repositories\AuthRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\Interfaces\AboutRepositoryInterface;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use App\Repositories\Interfaces\ModelRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\StatisticsRepositoryInterface;
use App\Repositories\ModelRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StatisticsRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );

        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );

        $this->app->singleton(
            AboutRepositoryInterface::class,
            AboutRepository::class
        );

        $this->app->singleton(
            StatisticsRepositoryInterface::class,
            StatisticsRepository::class
        );

        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ContactRepositoryInterface::class,
            ContactRepository::class
        );

        $this->app->singleton(
            FeedbackRepositoryInterface::class,
            FeedbackRepository::class
        );

        $this->app->singleton(
            ModelRepositoryInterface::class,
            ModelRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layouts.footer', function ($view) {
            $view->with('contact', Contact::first());
        });
    }
}
