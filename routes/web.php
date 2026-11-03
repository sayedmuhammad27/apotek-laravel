<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StafApotekController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PostmanExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main Dashboard (Form inputs, statistics, tables, and Postman API explorer)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Web Routes
Route::resource('pelanggan', PelangganController::class);
Route::resource('staf', StafApotekController::class);
Route::resource('obat', ObatController::class);

// Postman Export Routes
Route::get('/postman/collection.json', [PostmanExportController::class, 'downloadCollection'])->name('postman.collection');
Route::get('/postman/environment.json', [PostmanExportController::class, 'downloadEnvironment'])->name('postman.environment');
