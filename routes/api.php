<?php

use App\Http\Controllers\api\auth\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\process\CollectiveController;
use \App\Http\Controllers\api\process\IndividualController;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('unauthorized', function () {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('api.unauthorized');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['api.auth'])->group(function () {

    Route::apiResources([
        'collective' => CollectiveController::class,
        'individual' => IndividualController::class
    ]);
});
