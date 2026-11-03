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

Route::get('/', [DashboardController::class, 'landing'])->name('landing');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('staf', StafApotekController::class);
Route::resource('obat', ObatController::class);

Route::get('/postman/collection.json', [PostmanExportController::class, 'downloadCollection'])->name('postman.collection');
Route::get('/postman/environment.json', [PostmanExportController::class, 'downloadEnvironment'])->name('postman.environment');
