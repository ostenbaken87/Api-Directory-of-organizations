<?php

namespace App\Providers;

use App\Repository\Building\BuildingRepository;
use App\Repository\Building\BuildingRepositoryInterface;
use App\Services\BuildingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(
            BuildingRepositoryInterface::class,
            BuildingRepository::class
        );

        //Services
        $this->app->bind(BuildingService::class, function($app){
            return new BuildingService($app->make(BuildingRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
