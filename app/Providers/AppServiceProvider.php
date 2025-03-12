<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\UnitRepositoryInterface;
use App\Repositories\UnitRepository;
use App\Contracts\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Contracts\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
