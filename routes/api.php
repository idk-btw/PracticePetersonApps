<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
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
Route::controller(NoteController::class)->prefix('note')->group(function () {
    Route::get('index', 'index');
    Route::post('store', 'create');
    Route::post('destroy/{id}', 'destroy');
    Route::get('show/{id}', 'show');
});

Route::controller(ProjectController::class)->prefix('project')->group(function () {
    Route::get('index', 'index');
    Route::post('store', 'create');
    Route::post('destroy/{id}', 'destroy');
    Route::get('show/{id}', 'show');
    Route::get('edit/{id}', 'edit');
    Route::put('edit/{id}', 'update');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
