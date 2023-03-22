<?php

use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admins', [AdminsController::class, 'get_all'])->name('admins.get_all');
});