<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Hak akses Admin
Route::group(['middleware' => 'admin'], function() {

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
Route::get('/guru/add', [GuruController::class, 'add']);
Route::post('/guru/insert', [GuruController::class, 'insert']);
Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
Route::get('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/detail/{nis}', [SiswaController::class, 'detail']);
Route::get('/siswa/transaksi', [SiswaController::class, 'add']);
Route::post('/siswa/insert', [SiswaController::class, 'insert']);

Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan');
Route::get('/tagihan/detail/{no_tagihan}', [TagihanController::class, 'detail']);
Route::get('/tagihan/add', [TagihanController::class, 'add']);
Route::post('/tagihan/insert', [TagihanController::class, 'insert']);
});

//Hak akses Guru
Route::group(['middleware' => 'guru'], function() {

});

//Hak akses Siswa
Route::group(['middleware' => 'siswa'], function() {

});
