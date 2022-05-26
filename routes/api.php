<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AnthropometryImportController;
use App\Http\Controllers\AnthropometryStandardImportController;
use App\Http\Controllers\AnthropometryStatusImportController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'users' => UserController::class
]);

Route::prefix('anthropometries')->group(function () {
    Route::post('import', AnthropometryImportController::class);
    Route::post('statuses/import', AnthropometryStatusImportController::class);
    Route::post('standards/import', AnthropometryStandardImportController::class);
});
