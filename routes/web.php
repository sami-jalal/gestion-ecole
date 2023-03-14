<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group((function () {
    Route::get('/users', function () {
        return 'users Hello Admin';
    });
    
    Route::get('/teachers', function () {
        return 'teachers Admin';
    });
    
    Route::get('/students', function () {
        return 'students Admin';
    });
    
    Route::get('/classes', function () {
        return 'classes Admin';
    });
}));

Route::middleware(['auth', 'role:teacher'])->group((function () {
    
    Route::get('/teachers', function () {
        return 'teachers Admin';
    });
    
    Route::get('/students', function () {
        return 'students Admin';
    });
    
    Route::get('/classes', function () {
        return 'classes Admin';
    });
    
}));
