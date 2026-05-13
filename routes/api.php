<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('tasks', TaskController::class);
    Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggle']);
});

Route::middleware('throttle:10,1')->group(function () {
    // Guest routes if any
});