<?php

use App\Http\Controllers\Api\V1\Admin\CategoryApiController;
use App\Http\Controllers\Api\V1\Admin\LoginController;
use App\Http\Controllers\Api\V1\Admin\SignupController;
use App\Http\Controllers\CMStatsController;

Route::post('/user/login', [LoginController::class, 'login'])->name('user-login');
Route::post('/user/signup', [SignupController::class, 'signup'])->name('user-signup');

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Watch
    Route::apiResource('watches', 'WatchApiController');

    Route::get('/categories/get-all-categories', [CategoryApiController::class, 'get_all_categories'])->name('get-all-categories');
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('verify.key')->group(function () {
    Route::get('/dashboard/share-stats', [CMStatsController::class, 'shareStats']);
});
