<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\auth\AuthController;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('unauthorized', function () {
   return response()->json(['error' => 'Unauthorized'], 401);
})->name('api.unauthorized');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['api.auth'])->group(function () {

    Route::apiResources([

    ]);
});
