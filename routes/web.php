<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\Master\{
    AspekController,
    KriteriaController,
    KondisiController,
    PersentaseController
};
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\WargaKondisiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'actionLogin'])->name('login.action');

Route::get('/', function () {
    return redirect('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'master'], function () {
        Route::resource('aspek', AspekController::class);
        Route::resource('kriteria', KriteriaController::class);
        Route::resource('kondisi', KondisiController::class);
    });

    Route::get('warga/validasi', [PembobotanController::class, 'hitung'])->name('warga.validasi');
    Route::get('warga/kondisi', [WargaKondisiController::class, 'create'])->name('warga.kondisi.create');
    Route::post('warga/kondisi/', [WargaKondisiController::class, 'store'])->name('warga.kondisi.store');
    Route::delete('warga/kondisi/{kondisi}', [WargaKondisiController::class, 'destroy'])->name('warga.kondisi.destroy');

    Route::get('warga/search', [WargaController::class, 'search'])->name('warga.search');
    Route::get('warga/result', [WargaController::class, 'result'])->name('warga.result');
    Route::get('warga/result/{id}', [WargaController::class, 'resultDetail'])->name('warga.result.show');
    Route::get('warga/laporan', [WargaController::class, 'laporan'])->name('warga.laporan');
    Route::resource('warga', WargaController::class);
});
