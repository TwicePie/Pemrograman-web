<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsCarsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RaceScheduleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('sports-cars', SportsCarsController::class);
Route::apiResource('review', ReviewController::class);
Route::apiResource('race-schedules', RaceScheduleController::class);
