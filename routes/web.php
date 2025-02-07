<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;

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

    Route::get('/', function () {
        return view('tampilanmasyarakat');
});

Route::middleware(['guest'])->group(function(){

    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store/register', [AuthController::class, 'storeregister']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});    


Route::middleware(['auth','role:petugas,admin,masyarakat'])->group(function(){


// Route untuk Admin
Route::get('/admin', [AdminController::class, 'tampilanAdmin'])->name('tampilan.admin');

// Route untuk dashboard masyarakat
Route::get('/dashboard_masyarakat', [MasyarakatController::class, 'index'])->name('dashboardmasyarakat');

// Route untuk membuat pengaduan
Route::get('/buatpengaduan', [PengaduanController::class, 'create'])->name('buatpengaduan');
Route::post('/store/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Route untuk menampilkan tampilan dashboard pengaduan masyarakat
Route::get('/dashboardmasyarakat', [PengaduanController::class, 'dashboardmasyarakat'])->name('dashboardmasyarakat.index');

// Route untuk profile masyarakat
Route::get('/dashboard_masyarakat/profile', [MasyarakatController::class, 'profile'])->name('profil');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

// web.php
