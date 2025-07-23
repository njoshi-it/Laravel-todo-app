<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Home page - list all tasks
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Add a new task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Toggle task completion
Route::patch('/tasks/{id}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

// Delete a task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
