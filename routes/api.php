<?php

use App\Http\Controllers\Admin\ChildrenBodyMassIndexController;
use App\Http\Controllers\Admin\ChildrenController;
use App\Http\Controllers\Admin\ImmunizationController;
use App\Http\Controllers\Admin\MotherController;
use App\Http\Controllers\Admin\PregnancyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AnthropometryImportController;
use App\Http\Controllers\AnthropometryStandardImportController;
use App\Http\Controllers\AnthropometryStatusImportController;
use App\Http\Controllers\Auth\AuthenticatedUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::delete('logout', LogoutController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', AuthenticatedUserController::class);

    Route::apiResources([
        'users' => UserController::class,
        'mothers' => MotherController::class,
        'pregnancies' => PregnancyController::class,
        'childrens' => ChildrenController::class,
        'childrens/{children}/body-mass-indices' => ChildrenBodyMassIndexController::class,
        'immunizations' => ImmunizationController::class
    ]);

    Route::prefix('anthropometries')->group(function () {
        Route::post('import', AnthropometryImportController::class);
        Route::post('statuses/import', AnthropometryStatusImportController::class);
        Route::post('standards/import', AnthropometryStandardImportController::class);
    });
});
