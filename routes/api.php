<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->group(function () {
    Route::controller(NoteController::class)->prefix('note')->group(function () {
        Route::get('index', 'index');
        Route::post('store', 'create');
        Route::delete('destroy/{note}', 'destroy');
        Route::get('show/{note}', 'show');
        Route::put('edit/{note}', 'update');
        Route::put('stage/{note}', 'updateStage');
    });

    Route::controller(ProjectController::class)->prefix('project')->group(function () {
        Route::get('index', 'index');
        Route::post('store', 'create');
        Route::delete('destroy/{project}', 'destroy');
        Route::get('show/{project}', 'show');
        Route::put('update/{id}', 'update');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('me', 'me');
    });
});
