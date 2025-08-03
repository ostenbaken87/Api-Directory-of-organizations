<?php

namespace App\Providers;

use App\Models\CompanyPhone;
use App\Services\ActivityService;
use App\Services\BuildingService;
use Illuminate\Support\ServiceProvider;
use App\Repository\Company\CompanyRepository;
use App\Repository\Activity\ActivityRepository;
use App\Repository\Building\BuildingRepository;
use App\Repository\Company\CompanyRepositoryInterface;
use App\Repository\Activity\ActivityRepositoryInterface;
use App\Repository\Building\BuildingRepositoryInterface;
use App\Services\CompanyService;

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

        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepository::class
        );

        //Services
        $this->app->bind(BuildingService::class, function($app){
            return new BuildingService($app->make(BuildingRepositoryInterface::class));
        });

        $this->app->bind(ActivityService::class, function($app){
            return new ActivityService($app->make(ActivityRepositoryInterface::class));
        });

        $this->app->bind(CompanyService::class, function($app){
            return new CompanyService($app->make(CompanyRepositoryInterface::class));
        });
    }

    public function boot(): void
    {
        //
    }
}
