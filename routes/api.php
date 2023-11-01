<?php

use App\Http\Controllers\api\attachment\AttachmentController;
use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\filter\CollectiveFilterController;
use App\Http\Controllers\api\process\{ProcessController};
use App\Http\Controllers\api\requeriment\RequerimentController;
use App\Http\Controllers\api\UnauthorizedController;
use App\Http\Controllers\api\user\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('unauthorized', [UnauthorizedController::class, 'unauthorized'])->name('api.unauthorized');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['api.auth'])->group(function () {
    Route::put('collective/{id}/finish', [ProcessController::class, 'finishedCollective']);
    Route::get('collective/filter', [CollectiveFilterController::class, 'filterCollective']);

    Route::get('attachment/{id}', [AttachmentController::class, 'getAttachmentId']);
    Route::get('attachment/{id}/allAttachment', [AttachmentController::class, 'getAllAttachmentByProcessId']);
    Route::get('attachment/{id}/download', [AttachmentController::class, 'downloadAttachment']);
    Route::post('attachment/{id}/upload', [AttachmentController::class, 'uploadAttachment']);
    Route::delete('attachment/{id}/delete', [AttachmentController::class, 'deleteAttachment']);

    Route::apiResources([
        'collective'  => ProcessController::class,
        'user'        => UserController::class,
        'requeriment' => RequerimentController::class,
    ]);
});
