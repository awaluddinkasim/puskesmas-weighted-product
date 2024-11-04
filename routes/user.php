<?php

use App\Http\Controllers\User\AbsensiController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PasienController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');


    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/{pasien}', [PasienController::class, 'show'])->name('pasien.show');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});
