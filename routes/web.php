<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin\Data_santri;
use App\Http\Controllers\Admin\Data_ruangan;
use App\Http\Controllers\Admin\Data_pengguna;
use App\Http\Controllers\Admin\Data_pegawai;
use App\Http\Controllers\Admin\Data_tagihan;
use App\Http\Controllers\Admin\Data_profile;
use App\Http\Controllers\Pengguna\Data_pengguna_santri;



//loginnn



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Login::class, 'index']);
    Route::post('/login', [Login::class, 'login'])->name('login');
});
Route::get('/home', function () {
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {
    route::get('/level', [Login::class, 'index']);
    route::get('/level/admin', [Login::class, 'dashboard_admin'])->middleware('userAkses:Admin');
    route::get('/level/kepala', [Login::class, 'dashboard_kepala'])->middleware('userAkses:Kepala Yayasan');
    route::get('/level/santri', [Login::class, 'dashboard_santri'])->middleware('userAkses:Santri');
    Route::get('/logout', [Login::class, 'logout']);
});


//registerrreeeeeeeeeeeeeeeeeee
Route::get('register', [Login::class, 'register']);
Route::post('register', [Login::class, 'store']);



//dashboarddddddddddddddddddddddddddd Adminnnnnnnnnnnnnnnnnnnnnnnnnnn
Route::get('dashboard', [Login::class, 'dashboard']);

// Dataaaaaaaaaaaaaaaaaaaaa Santriiiiiiiiiiii
Route::get('data-santri', [Data_santri::class, 'index']);
Route::post('data-santri', [Data_santri::class, 'store']);
Route::delete('santri_destroy/{id}', [Data_santri::class, 'destroy']);
Route::put('data-santri/{id}', [Data_santri::class, 'update']);


//Dataaaaaaaaaaaaaaaaaaaaa Ruangannnnnnnnnnn
Route::get('data-ruangan', [Data_ruangan::class, 'index']);
Route::post('data-ruangan', [Data_ruangan::class, 'store']);
Route::delete('ruangan_destroy{id}', [Data_ruangan::class, 'ruangan_destroy']);
Route::put('data-ruangan{id}', [Data_ruangan::class, 'update']);

//Dataa tagihann
Route::get('data-tagihan', [Data_tagihan::class, 'index']);
Route::post('data-tagihan', [Data_tagihan::class, 'store']);
Route::delete('tagihan_destroy{id}', [Data_tagihan::class, 'ruangan_destroy']);
Route::put('data-tagihan{id}', [Data_tagihan::class, 'update']);



// Dataaaaaaaaaaaaaaaaaaaaa  Penggunaaaaaaaaaaa
Route::get('/data-pengguna', [Data_pengguna::class, 'index']);
Route::post('/data-pengguna', [Data_pengguna::class, 'store']);
Route::delete('/pengguna_destroy{id}', [Data_pengguna::class, 'pengguna_destroy']);
Route::put('/data-pengguna{id}', [Data_pengguna::class, 'update']);


// Dataaaaaaaaaaaaaaaaaaaaa Penggawaiiiiiiiii 
Route::get('data-pegawai', [Data_pegawai::class, 'index']);
Route::post('data-pegawai', [Data_pegawai::class, 'store']);
Route::delete('pegawai_destroy{id}', [Data_pegawai::class, 'pegawai_destroy']);
Route::put('data-pegawai{id}', [Data_pegawai::class, 'update']);


//freeeeeeeeeeeeeeee Usseeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
Route::get('/', [Home::class, 'home']);
Route::get('tentang-kami', [Home::class, 'tentang_kami']);
Route::get('pencapaian', [Home::class, 'pencapaian']);

//Dataaaaaaaaaaaaaaaaaaaaa freeeeeeeeeeeeeeee Usseeeeeeeeeeeerrrr Profileeeeeeeeeeeeeeeee
Route::get('data-profile', [Data_profile::class, 'index']);
Route::post('data-profile', [Data_profile::class, 'store']);
Route::delete('profile_destroy{id}', [Data_profile::class, 'profile_destroy']);
// Route::put('data-profile{id}', [Data_profile::class, 'update']);
Route::put('data-profile/{id_profile}', [Data_profile::class, 'update']);



//dashboarddddddddddddddd Penggunaaaaaaaaaaaaaaaaaaaaaaaaaaaa
Route::get('dashboard-pengguna', [Dashboard::class, 'dashboard_pengguna']);