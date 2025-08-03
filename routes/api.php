<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Activity\ActivityController;
use App\Http\Controllers\Api\Building\BuildingController;


Route::middleware('api.key')->group(function(){

    //Building routes
    Route::get('/building', [BuildingController::class, 'index']);
    Route::post('/building', [BuildingController::class, 'store']);
    Route::get('/building/{buildingId}', [BuildingController::class, 'show']);
    Route::patch('/building/{buildingId}', [BuildingController::class, 'update']);
    Route::delete('/building/{buildingId}', [BuildingController::class, 'destroy']);

    //Activity routes
    Route::get('/activity', [ActivityController::class, 'index']);
    Route::get('/activity/tree', [ActivityController::class, 'tree']);
    Route::post('/activity', [ActivityController::class, 'store']);
    Route::get('/activity/{activityId}', [ActivityController::class, 'show']);
    Route::patch('/activity/{activityId}', [ActivityController::class, 'update']);
    Route::delete('/activity/{activityId}', [ActivityController::class, 'destroy']);

    //Company routes
    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/company/{companyId}', [CompanyController::class, 'show']);
    Route::post('/company', [CompanyController::class, 'store']);
    Route::patch('/company/{companyId}', [CompanyController::class, 'update']);
    Route::delete('/company/{companyId}', [CompanyController::class, 'destroy']);
});
