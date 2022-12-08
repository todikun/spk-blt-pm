<?php

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

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'master'], function () {
    Route::resource('aspek', AspekController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('kondisi', KondisiController::class);
});

Route::get('warga/validasi', [PembobotanController::class, 'hitung'])->name('warga.validasi');
Route::get('warga/kondisi', [WargaKondisiController::class, 'create'])->name('warga.kondisi.create');
Route::post('warga/kondisi', [WargaKondisiController::class, 'store'])->name('warga.kondisi.store');
Route::resource('warga', WargaController::class);
