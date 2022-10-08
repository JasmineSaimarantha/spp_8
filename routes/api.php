<?php

use Illuminate\Http\Request;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tampilsiswa', [LoginController::class, 'showsiswa']);

Route::post('register/admin', [LoginController::class, 'registerAdmin']);
Route::post('register/petugas', [LoginController::class, 'registerPetugas']);
Route::post('register/siswa', [LoginController::class, 'registerSiswa']);
Route::post('login', [LoginController::class, 'login']);

// Route::post('register/siswa', [SiswaController::class, 'register']);
// Route::post('login/siswa', [SiswaController::class, 'loginSiswa']);

Route::group(['middleware'=>['jwt.verify:petugas']],function(){
	Route::get('profile/petugas',[PetugasController::class,'profilPetugas']);
	Route::post('pembayaran',[TransaksiController::class,'store']);
    Route::post('tunggakan',[TransaksiController::class,'tunggakan']);
	Route::get('kurang/{id}',[TransaksiController::class,'kurang']);

});

Route::group(['middleware'=>['jwt.verify:admin']],function(){
	Route::get('profile/admin',[PetugasController::class,'profilAdmin']);
	Route::post('insert/kelas',[KelasController::class,'store']);
	Route::put('update/kelas/{id}',[KelasController::class,'update']);
	Route::delete('delete/kelas/{id}',[KelasController::class,'delete']);

	Route::post('insert/siswa',[SiswaController::class,'store']);
	Route::put('update/siswa/{id}',[SiswaController::class,'update']);
	Route::delete('delete/siswa/{id}',[SiswaController::class,'delete']);
    Route::get('profile/siswa', [SiswaController::class, 'getSiswa']);

	Route::post('insert/spp',[SppController::class,'store']);
	Route::put('update/spp/{id}',[SppController::class,'update']);
	Route::delete('delete/spp/{id}',[SppController::class,'delete']);
});

/*Route::group(['middleware'=>['jwt.siswa.verify']],function(){
	Route::get('profile/siswa',[SiswaController::class,'getSiswa']);
});*/
Route::post('/register/siswa/users', [SiswaController::class, 'register2']);
