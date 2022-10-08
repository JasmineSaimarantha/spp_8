<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [LoginController::class, 'tampil'])->name('login');
Route::get('/login/siswa', [LoginController::class, 'tampilLoginS'])->name('login-siswa');
Route::post('/login', [LoginController::class, 'login'])->name('logins');
Route::get('/register', [SiswaController::class, 'tampilRegister'])->name('register');
Route::post('/loginsiswa', [LoginController::class, 'loginSiswa'])->name('login-siswas');
// Route::get('/register_as_petugas', [LoginController::class, 'tampilRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//spp
Route::get('/spp', [SppController::class, 'tampilSpp'])->name('spp');
Route::get('/spp/create', [SppController::class, 'tampilStore'])->name('spp-store');
Route::post('/spp/create/fix', [SppController::class, 'store'])->name('spp-create');
Route::get('/spp/update/{id_spp}', [SppController::class, 'tampilUpdate'])->name('spp-tampil-update');
Route::post('/spp/update/{id_spp}/fix',[SppController::class,'update'])->name('spp-update');
Route::delete('/delete/spp/{id_spp}',[SppController::class,'delete'])->name('spp-delete');

//kelas
Route::get('/kelas', [KelasController::class, 'tampil'])->name('kelas');
Route::get('/kelas/create', [KelasController::class, 'tampilStore'])->name('kelas-store');
Route::post('/kelas/create/fix', [KelasController::class, 'store'])->name('kelas-create');
Route::get('/kelas/update/{id_kelas}', [KelasController::class, 'tampilUpdates'])->name('kelas-tampil-update');
Route::post('/kelas/update/{id_kelas}/fix',[KelasController::class,'update'])->name('kelas-update');
Route::delete('/kelas/delete/{id_kelas}',[KelasController::class,'delete'])->name('kelas-delete');

//petugas
Route::get('/petugas', [PetugasController::class, 'tampilPetugas'])->name('petugas');
Route::get('/petugas/create', [PetugasController::class, 'tampilStoreP'])->name('petugas-store');
Route::post('/petugas/create/fix', [PetugasController::class, 'storePetugas'])->name('petugas-create');
Route::get('/petugas/update/{id}', [PetugasController::class, 'tampilUpdateP'])->name('petugas-tampil-update');
Route::post('/petugas/update/fix/{id}',[PetugasController::class,'updatePetugas'])->name('petugas-update');
Route::delete('/petugas/delete/{id}',[PetugasController::class,'deletePetugas'])->name('petugas-delete');

//admin
Route::get('/admin', [PetugasController::class, 'tampilAdmin'])->name('admin');
Route::get('/admin/create', [PetugasController::class, 'tampilStoreA'])->name('admin-store');
Route::post('/admin/create/fix', [PetugasController::class, 'storeAdmin'])->name('admin-create');
Route::get('/admin/update/{id}', [PetugasController::class, 'tampilUpdateA'])->name('admin-tampil-update');
Route::post('/admin/update/{id}/fix',[PetugasController::class,'updateAdmin'])->name('admin-update');
Route::delete('/admin/delete/{id}',[PetugasController::class,'deleteAdmin'])->name('admin-delete');

//siswa
Route::get('/siswa', [SiswaController::class, 'tampilSiswa'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'tampilStore'])->name('siswa-store');
Route::post('/siswa/create/fix', [SiswaController::class, 'store'])->name('siswa-create');
Route::get('/siswa/update/{id}', [SiswaController::class, 'tampilUpdate'])->name('siswa-tampil-update');
Route::post('/siswa/update/{id}/fix',[SiswaController::class,'update'])->name('siswa-update');
Route::delete('/siswa/delete/{id}',[SiswaController::class,'delete'])->name('siswa-delete');

//pembayaran
Route::get('/pembayaran', [TransaksiController::class, 'tampil'])->name('pembayaran');
Route::get('/tunggakan', [TransaksiController::class, 'tampilTunggakan'])->name('tunggakan');
Route::get('/tunggakan/create', [TransaksiController::class, 'tampilTunggakan'])->name('tunggakan-store');
Route::post('/tunggakan/create/fix', [TransaksiController::class, 'tunggakan'])->name('tunggakan-create');
Route::get('/pembayaran/create', [TransaksiController::class, 'tampilStore'])->name('pembayaran-store');
Route::post('/pembayaran/create/fix', [TransaksiController::class, 'store'])->name('pembayaran-create');
Route::get('/pembayaran/update/{id}', [TransaksiController::class, 'tampilUpdate'])->name('pembayaran-tampil-update');
Route::post('/pembayaran/update/{id}/fix',[TransaksiController::class,'update'])->name('pembayaran-update');
Route::delete('/pembayaran/delete/{id}',[TransaksiController::class,'delete'])->name('pembayaran-delete');
Route::get('/history', [TransaksiController::class, 'history'])->name('history');
Route::get('/history/{id}', [TransaksiController::class, 'historySiswa'])->name('history-siswa');

//report
Route::get('/report', [LaporanController::class, 'showId'])->name('show-report');
Route::get('/report/{id_siswa}', [LaporanController::class, 'historyId'])->name('report-siswa');
Route::get('/report/download', [LaporanController::class, 'downloadreport'])->name('download');
});
