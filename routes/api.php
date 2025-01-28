<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [ApiAuthController::class, 'login']);
    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::post('refresh', [ApiAuthController::class, 'refresh']);
    Route::post('me', [ApiAuthController::class, 'me']);

});

Route::prefix('all')->group(function () {
    Route::get('/all_user', [App\Http\Controllers\UserController::class, 'all_user'])->name('all_user');
    Route::get('/all_item', [App\Http\Controllers\ItemController::class, 'all_item'])->name('all_item');
});
