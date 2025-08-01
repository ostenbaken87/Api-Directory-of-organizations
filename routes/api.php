<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('api.key')->group(function(){
    //Building routes
    Route::get('/building', [App\Http\Controllers\Api\Building\BuildingController::class, 'index']);
    Route::post('/building', [App\Http\Controllers\Api\Building\BuildingController::class, 'store']);
    Route::get('/building/{buildingId}', [App\Http\Controllers\Api\Building\BuildingController::class, 'show']);
    Route::patch('/building/{buildingId}', [App\Http\Controllers\Api\Building\BuildingController::class, 'update']);
    Route::delete('/building/{buildingId}', [App\Http\Controllers\Api\Building\BuildingController::class, 'destroy']);
});
