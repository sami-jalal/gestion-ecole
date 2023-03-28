<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('/courses', [CourseController::class, 'get_all'])->name('courses.get_all');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.delete');
});