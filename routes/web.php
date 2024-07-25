<?php

use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\MenuController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'menu'], function(){
    Route::get('/', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/', [MenuController::class, 'store'])->name('menu.store');
    // Route::get('/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

Route::group(['prefix' => 'laporan'], function(){
    Route::get('/LaporanPenjualan', [LaporanPenjualanController::class, 'showLaporanPenjualan'])->name('Admin.LaporanPenjualan');
    Route::get('/LaporanPenjualan/chart', [LaporanPenjualanController::class, 'chart'])->name('Admin.LaporanPenjualan.chart');
    Route::get('/LaporanPenjualan/table', [LaporanPenjualanController::class, 'table'])->name('Admin.LaporanPenjualan.table');
    Route::get('/LaporanPenjualan/export', [LaporanPenjualanController::class, 'export'])->name('Admin.LaporanPenjualan.export');
});
