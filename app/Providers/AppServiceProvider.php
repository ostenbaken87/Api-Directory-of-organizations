<?php

namespace App\Providers;

use App\Services\ActivityService;
use App\Services\BuildingService;
use Illuminate\Support\ServiceProvider;
use App\Repository\Activity\ActivityRepository;
use App\Repository\Building\BuildingRepository;
use App\Repository\Activity\ActivityRepositoryInterface;
use App\Repository\Building\BuildingRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repositories
        $this->app->bind(
            BuildingRepositoryInterface::class,
            BuildingRepository::class,
        );

        $this->app->bind(
            ActivityRepositoryInterface::class,
            ActivityRepository::class
        );

        //Services
        $this->app->bind(BuildingService::class, function($app){
            return new BuildingService($app->make(BuildingRepositoryInterface::class));
        });

        $this->app->bind(ActivityService::class, function($app){
            return new ActivityService($app->make(ActivityRepositoryInterface::class));
        });
    }

    public function boot(): void
    {
        //
    }
}
