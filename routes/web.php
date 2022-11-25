<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\Master\{AspekController, KriteriaController, PersentaseController};

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

Route::group(['prefix' => 'master'], function() {
    Route::resource('aspek', AspekController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('persentase', PersentaseController::class);
});

Route::resource('warga', WargaController::class);
