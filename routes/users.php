<?php

use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admins', [AdminsController::class, 'get_all'])->name('admins.get_all');
    Route::get('/admins/create', [AdminsController::class, 'create'])->name('admins.create');
    Route::get('/admins/{user}/edit', [AdminsController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{user}', [AdminsController::class, 'update'])->name('admins.update');
    Route::post('/admins', [AdminsController::class, 'store'])->name('admins.store');
    Route::delete('/admins/{user}', [AdminsController::class, 'destroy'])->name('admins.delete');
});