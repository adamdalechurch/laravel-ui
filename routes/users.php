<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/users', [UsersController::class, 'users'])
->middleware(['auth:sanctum'])->name('users');

Route::get('/users/{user_id}', [UsersController::class, 'show'])
->middleware(['auth:sanctum'])->name('user');