<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\VehicleRepositoryInterface;
use App\Repositories\VehicleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(VehicleRepositoryInterface::class, VehicleRepository::class);
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
