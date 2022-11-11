<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigurationsController;

Route::get('/configurations', [ConfigurationsController::class, 'configurations'])
->middleware(['auth:sanctum'])->name('configurations');

Route::post('/configurations/{configuration_id}', [ConfigurationsController::class, 'store'])
->middleware(['auth:sanctum'])->name('store-configuration');