<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\StafApotekApiController;
use App\Http\Controllers\Api\ObatApiController;

/*
|--------------------------------------------------------------------------
| API Routes for Apotek System
|--------------------------------------------------------------------------
| RESTful endpoints for Pelanggan, Staf Apotek, and Daftar Obat.
| Fully compatible with Postman.
*/

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API Sistem Informasi Apotek aktif',
        'version' => '1.0.0',
        'endpoints' => [
            'pelanggan' => url('/api/pelanggan'),
            'staff' => url('/api/staff'),
            'obat' => url('/api/obat'),
        ],
    ]);
});

Route::apiResource('pelanggan', PelangganApiController::class);
Route::apiResource('staff', StafApotekApiController::class);
Route::apiResource('obat', ObatApiController::class);
