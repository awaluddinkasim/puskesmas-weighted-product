<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvaluasiController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PenangananController;
use App\Http\Controllers\Admin\ResultController;

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/perawat', [UserController::class, 'index'])->name('perawat');
    Route::post('/perawat', [UserController::class, 'store'])->name('perawat.store');
    Route::get('/perawat/{user}', [UserController::class, 'edit'])->name('perawat.edit');
    Route::put('/perawat/{user}', [UserController::class, 'update'])->name('perawat.update');
    Route::delete('/perawat/{user}', [UserController::class, 'delete'])->name('perawat.delete');

    Route::group(['prefix' => 'pasien', 'as' => 'pasien.'], function () {
        Route::get('/list', [PasienController::class, 'index'])->name('list');
        Route::get('/create', [PasienController::class, 'create'])->name('create');
        Route::post('/store', [PasienController::class, 'store'])->name('store');
        Route::get('/perawat', [PasienController::class, 'perawat'])->name('perawat');
        Route::get('/{pasien}', [PasienController::class, 'show'])->name('show');
    });

    Route::get('/penanganan', [PenangananController::class, 'index'])->name('penanganan');

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');

    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi');
    Route::get('/evaluasi/{user}', [EvaluasiController::class, 'evaluasi'])->name('evaluasi.user');
    Route::post('/evaluasi/{user}/store', [EvaluasiController::class, 'store'])->name('evaluasi.store');

    Route::get('/perawat-terbaik', [ResultController::class, 'index'])->name('result');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});
