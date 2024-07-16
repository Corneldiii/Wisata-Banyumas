<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\daftarController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reservasiController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\updateDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;


Route::get('/home', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('homeAdmin');
});

Route::get('/adminT', function () {
    return view('tambahWisata');
});

Route::get('/adminD', function () {
    return view('daftarwisata');
});

Route::get('/update', function () {
    return view('update');
});
Route::get('/r', function () {
    return view('reservasi');
});

Route::get('/reservasi',[reservasiController::class , 'index'])-> name('reservasi');
Route::post('/reservasi',[reservasiController::class , 'store'])-> name('pesan');

// Route::get('/reservasi', [reservasiController::class, 'calculatePrice']);


Route::get('/',[indexController::class, 'index']) -> name('index');

Route::get('/login',[loginController::class, 'index']) -> name('login')->middleware('guest');
Route::post('/login',[loginController::class, 'authentication'])->name('auth');

Route::post('/signUp',[SignUpController::class, 'store'])->name('signup');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/homeAdmin',[adminController::class,'index'])->name('homeAdmin');

Route::get('/tambahWisata', [WisataController::class,'index'])->name('tambah_wisata');
Route::post('/tambahWisata', [WisataController::class, 'store'])->name('Kirim_data');

Route::get('/daftarWisata', [daftarController::class, 'index'])->name('daftar_wisata');
Route::put('/daftarWisata', [daftarController::class, 'update'])->name('edit_wisata');
Route::delete('/daftarWisata', [daftarController::class, 'destroy'])->name('delete_wisata');

Route::get('/update',[updateDataController::class, 'index']) -> name('update_wisata');