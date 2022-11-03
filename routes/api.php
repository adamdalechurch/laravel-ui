<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/dashboard', [DashboardController::class, 'get'])->name('dashboard');

Route::middleware(['auth:sanctum'])->get('/my-profile', [ProfileController::class, 'my_profile']);

require __DIR__.'/groups.php';
require __DIR__.'/projects.php';
require __DIR__.'/tasks.php';


