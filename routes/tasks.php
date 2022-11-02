<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectTasksController;

Route::get('/tasks', [ProjectTasksController::class, 'my_tasks'])
->middleware(['auth:sanctum'])->name('my_tasks');

Route::get('/tasks/{task_id}', [ProjectTasksController::class, 'show']);

Route::post('/tasks/{task_id}/delete', [ProjectTasksController::class, 'delete'])
->middleware(['auth:sanctum'])->name('delete-task');

Route::post('/tasks/store', [ProjectTasksController::class, 'store'])
->middleware(['auth:sanctum'])->name('store-task');

Route::get('/tasks/{task_id}/edit', [ProjectTasksController::class, 'edit'])
->middleware(['auth:sanctum'])->name('edit-task');

Route::post('/tasks/{task_id}/update/status', [ProjectTasksController::class, 'update_status'])
->middleware(['auth:sanctum'])->name('update-task-status');
