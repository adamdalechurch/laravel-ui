<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/projects', [ProjectsController::class, 'my_projects'])
->middleware(['auth:sanctum'])->name('my_projects');

Route::get('/projects/{project_id}', [ProjectsController::class, 'show'])
->middleware(['auth:sanctum'])->name('show-project');

Route::get('/projects/{project_id}/tasks', [ProjectsController::class, 'show_tasks'])
->middleware(['auth:sanctum'])->name('show-project-tasks');

Route::post('/projects/store', [ProjectsController::class, 'store'])
->middleware(['auth:sanctum'])->name('store-project');

Route::post('/projects/{project_id}/delete', [ProjectsController::class, 'delete'])
->middleware(['auth:sanctum'])->name('delete-project');

Route::get('/projects/{project_id}/edit', [ProjectsController::class, 'edit'])
->middleware(['auth:sanctum'])->name('edit-project');

Route::post('/projects/{project_id}/update/status', [ProjectsController::class, 'update_status'])
->middleware(['auth:sanctum'])->name('update-project-status');