<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Support\Facades\Route;

Route::prefix('department')->group(function () {
    Route::resource('/', DepartmentController::class)->only(['index', 'store', 'view']);
});
Route::prefix('worker')->group(function () {
    Route::resource('/', WorkerController::class)->only(['index', 'store']);
    Route::patch('/attach', [WorkerController::class, 'addWorkerToDepartment']);
});
