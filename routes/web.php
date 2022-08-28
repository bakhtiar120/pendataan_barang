<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiBarangController;
use App\Http\Controllers\ReportMutasiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('list-barang', [BarangController::class, 'getData']);
Route::get('add-barang', [BarangController::class, 'index']);
Route::get('edit-barang/{id}', [BarangController::class, 'editData']);
Route::post('store-barang', [BarangController::class, 'store']);
Route::get('/delete-barang/{id}', [BarangController::class, 'deleteData']);
Route::post('/update-barang/{id}', [BarangController::class, 'updateData']);
Route::get('list-mutasi-barang', [MutasiBarangController::class, 'getData']);
Route::get('add-mutasi-barang', [MutasiBarangController::class, 'index']);
Route::post('store-mutasi-barang', [MutasiBarangController::class, 'store']);
Route::post('post_mutasi_barang', [MutasiBarangController::class, 'post_mutasi_barang']);
Route::get('edit-mutasi-barang/{id}', [MutasiBarangController::class, 'editData']);
Route::post('/update-mutasi-barang', [MutasiBarangController::class, 'updateData']);
Route::get('/delete-mutasi-barang/{id}', [MutasiBarangController::class, 'delete_mutasi_barang']);
Route::get('form-report-mutasi', [ReportMutasiController::class, 'index']);
Route::post('/report-mutasi-barang', [ReportMutasiController::class, 'search_mutasi']);

