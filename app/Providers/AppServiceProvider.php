<?php

namespace App\Providers;

use App\Repositories\Contracts\ImageRepositoryContract;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\Contracts\ProductRepositoryContract;
use App\Repositories\ImageRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Services\Contracts\PaypalServiceContract;
use App\Services\PaypalService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        ProductRepositoryContract::class => ProductRepository::class,
        ImageRepositoryContract::class => ImageRepository::class,
        OrderRepositoryContract::class => OrderRepository::class,
        PaypalServiceContract::class => PaypalService::class,
    ];
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
    public function boot(): void
    {
        Paginator::defaultView('vendor.bootstrap-5');

        Paginator::defaultSimpleView('vendor.bootstrap-5');
    }
}
