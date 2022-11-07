<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;

Route::get('/groups', [GroupsController::class, 'my_groups'])
->middleware(['auth:sanctum'])->name('my_groups');

Route::post('/groups/store', [GroupsController::class, 'store'])
->middleware(['auth:sanctum'])->name('store-group');

Route::get('/groups/{group_id}', [GroupsController::class, 'show'])
->middleware(['auth:sanctum'])->name('group');

Route::post('/groups/{group_id}/delete', [GroupsController::class, 'delete'])
->middleware(['auth:sanctum'])->name('delete-group');

Route::get('/groups/{group_id}/edit', [GroupsController::class, 'edit'])
->middleware(['auth:sanctum'])->name('edit-group');

Route::post('/group/members/store', [GroupsController::class, 'add_user'])
->middleware(['auth:sanctum'])->name('add-group-user');
