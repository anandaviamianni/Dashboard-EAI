<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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
    return view('landingpage');
})->name('landing_page');

Route::get('/dashboard', [WebController::class, 'home'])->name('dashboard');
Route::get('/KesehatanMahasiswa', [WebController::class, 'kesehatan'])->name('Kesehatan_Mahasiswa');
Route::get('/KeaktifanMahasiswa', [WebController::class, 'keaktifan'])->name('Keaktifan_Mahasiswa');
Route::get('/KeterlambatanTA', [WebController::class, 'kelulusan'])->name('Keterlambatan_Mahasiswa');
Route::get('/MasalahRegistrasi', [WebController::class, 'registrasi'])->name('Masalah_Registrasi');