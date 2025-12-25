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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(\App\Services\CategoryService $categoryService): void
    {
        \Illuminate\Pagination\Paginator::useTailwind();

        \Illuminate\Support\Facades\View::composer(['partials.nav', 'search', 'partials.header', 'partials.footer'], function ($view) use ($categoryService) {
            $view->with('globalCategories', $categoryService->getCategories());
        });
    }
}
