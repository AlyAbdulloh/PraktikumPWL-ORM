<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
// use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;

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
//     return Route::resource('mahasiswa', MahasiswaController::class);
// });

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('search', [MahasiswaController::class, 'cari']);
// Route::get('khs/{nim}', [MahasiswaController::class, 'khs']);
Route::get('mahasiswa/{mahasiswa}/khs', [MahasiswaController::class, 'khs'])->name('mahasiswa.khs');
Route::get('mahasiswa/{mahasiswa}/cetak_khs', [MahasiswaController::class, 'cetak_khs'])->name('mahasiswa.cetak_khs');

// Route::get('/khss', function () {
//     return view('mahasiswas.khs');
// });
