<?php

namespace App\Providers;

use App\Repositories\MenuRepositoriesInterface;
use App\Repositories\MenuRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RestaurantRepository;
use App\Repositories\RestaurantRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RestaurantRepositoryInterface::class,
            RestaurantRepository::class

        );
        $this->app->bind(
            MenuRepositoriesInterface::class,
            MenuRepository::class

        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
