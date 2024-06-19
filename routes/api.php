<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('users/{user}/posts', [PostController::class, 'userPosts']);


Route::middleware('auth:api')->group(function () {

    Route::post('post', [PostController::class, 'store']);
    Route::put('post/{id}', [PostController::class, 'update']);
    Route::delete('post/{id}', [PostController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
});
