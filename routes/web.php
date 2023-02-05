<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenghapusanAsetController;
use App\Http\Controllers\PenyusutanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatkerController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pengaturan
// Role
Route::resource('role', RoleController::class)->middleware(['auth', 'must-admin']);
// Satker
Route::resource('satker', SatkerController::class)->middleware(['auth', 'must-admin']);
// Users
Route::resource('users', UsersController::class)->middleware(['auth', 'must-admin']);
//#

// Pustaka
// Anggaran
Route::resource('sumber-dana', AnggaranController::class)->middleware(['auth', 'must-admin']);
// Jenis
Route::resource('jenis', JenisController::class)->middleware(['auth', 'must-admin']);
// Kategori
Route::resource('kategori', KategoriController::class)->middleware(['auth', 'must-admin']);
//#

// Data Aset
// Asset
Route::resource('aset', AssetController::class)->middleware(['auth', 'must-admin-or-user']);
// Penghapusan
Route::resource('remove', PenghapusanAsetController::class)->middleware(['auth', 'must-admin']);
// Penyusutan
Route::resource('penyusutan', PenyusutanController::class)->middleware(['auth', 'must-admin']);
//#

// Laporan Aset
// Laporan
Route::resource('laporan-aset', LaporanController::class)->middleware(['auth', 'must-admin-or-user']);
//#

// menu dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HalamanController::class, 'dashboard'])->name('dashboard');
    Route::get('/data-aset', [HalamanController::class, 'dataAset'])->name('data-aset');
    Route::get('/pustaka', [HalamanController::class, 'pustaka'])->name('pustaka');
    Route::get('/laporan', [HalamanController::class, 'laporan'])->name('laporan');
    Route::get('/pengaturan', [HalamanController::class, 'pengaturan'])->name('pengaturan');
});

Route::middleware(['auth', 'must-admin-or-user'])->group(function () {
    Route::get('/export-asset', [AssetController::class, 'assetexport'])->name('exportasset');
    Route::post('/import-asset', [AssetController::class, 'assetimport'])->name('importaset');
    // Route::get('/restore/{id}', [AssetController::class, 'restore'])->name('remove.restore.destroy');
    Route::get('/generate-pdf', [LaporanController::class, 'generatePDF'])->name('generatepdf');
});
