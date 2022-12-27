<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsensiKeluarController;
use App\Http\Controllers\AbsensiMasukController;
use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('', [HomeController::class, 'index'])->name('home')->middleware('auth', 'role:1');
Route::resource('dataKaryawan', DataKaryawanController::class)->middleware('auth', 'role:1');
Route::get('data-absensi', DataAbsensiController::class)->name('data-absensi.index')->middleware('auth', 'role:1');
Route::get('setting-jam-masuk', [SettingController::class, 'jamMasuk'])->name('jam-masuk')->middleware('auth', 'role:1');
Route::match(['patch', 'put'], 'setting-jam-masuk', [SettingController::class, 'storeJamMasuk'])->name('store-jam-masuk')->middleware('auth', 'role:1');
Route::get('setting-jam-keluar', [SettingController::class, 'jamKeluar'])->name('jam-keluar')->middleware('auth', 'role:1');
Route::match(['patch', 'put'], 'setting-jam-keluar', [SettingController::class, 'storeJamKeluar'])->name('store-jam-keluar')->middleware('auth', 'role:1');
Route::get('setting-lokasi', [SettingController::class, 'lokasi'])->name('lokasi')->middleware('auth', 'role:1');
Route::match(['patch', 'put'], 'setting-lokasi', [SettingController::class, 'storeLokasi'])->name('store-lokasi')->middleware('auth', 'role:1');

Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index')->middleware('auth', 'role:2');
Route::get('absensi-masuk', [AbsensiController::class, 'masuk'])->name('absensi.masuk')->middleware('auth', 'role:2');
;
Route::post('absensi-masuk', AbsensiMasukController::class)->name('absensi.storeMasuk')->middleware('auth', 'role:2');
Route::get('absensi-keluar', [AbsensiController::class, 'keluar'])->name('absensi.keluar')->middleware('auth', 'role:2');
Route::match(['patch', 'put'], 'absensi-keluar', AbsensiKeluarController::class)->name('absensi.storeKeluar')->middleware('auth', 'role:2');
