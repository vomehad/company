<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Support\Facades\Route;

Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
});
Route::prefix('worker')->group(function () {
    Route::get('/', [WorkerController::class, 'index']);
    Route::post('/', [WorkerController::class, 'store']);
    Route::post('/attach', [WorkerController::class, 'addWorkerToDepartment']);
});
