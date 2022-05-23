<?php

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
Route::get('/landingpage', function () {
    return view('landingpage');
});

Route::get('/Auth/register', function () {
    return view('Auth.register');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/KesehatanMahasiswa', function () {
    return view('KesehatanMahasiswa');
});

Route::get('/KeterlambatanTA', function () {
    return view('KeterlambatanTA');
});

Route::get('/MasalahRegistrasi', function () {
    return view('PermasalahanRegistrasi');
});

Route::get('/KeaktifanMahasiswa', function () {
    return view('KeaktifanMahasiswa');
});