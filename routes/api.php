<?php

use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\filter\CollectiveFilterController;
use App\Http\Controllers\api\process\{CollectiveController, IndividualController};
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('unauthorized', function () {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('api.unauthorized');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['api.auth'])->group(function () {
    Route::put('collective/{id}/finish', [CollectiveController::class, 'finishedCollective']);
    Route::get('collective/filter', [CollectiveFilterController::class, 'filterCollective']);

    Route::apiResources([
        'collective' => CollectiveController::class,
        'individual' => IndividualController::class,
    ]);
});
