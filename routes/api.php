<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('posts', [PostController::class, 'index']);
    Route::get('post/{id}', [PostController::class, 'show']);
    Route::post('post', [PostController::class, 'store']);
    Route::put('post/{id}', [PostController::class, 'update']);
    Route::delete('post/{id}', [PostController::class, 'destroy']);

    Route::get('users/{user}/posts', [PostController::class, 'userPosts']);

    Route::post('logout', [AuthController::class, 'logout']);
});
