<?php

use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\filter\CollectiveFilterController;
use App\Http\Controllers\api\process\{ProcessController};
use App\Http\Controllers\api\user\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\UnauthorizedController;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('unauthorized', [UnauthorizedController::class, 'unauthorized'])->name('api.unauthorized');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['api.auth'])->group(function () {
    Route::put('collective/{id}/finish', [ProcessController::class, 'finishedCollective']);
    Route::get('collective/filter', [CollectiveFilterController::class, 'filterCollective']);

    Route::apiResources([
        'collective' => ProcessController::class,
        'user'       => UserController::class,
    ]);
});
