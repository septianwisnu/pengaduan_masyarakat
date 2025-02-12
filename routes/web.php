<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
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

//Route untuk dashboard masyarakat
Route::get('/dashboard_masyarakat', [MasyarakatController::class, 'index'])->name('dashboardmasyarakat');
Route::get('/dashboard_masyarakat/profile', [MasyarakatController::class, 'profil'])->name('dashboard_masyarakat.profile');
Route::post('/profile/update', [MasyarakatController::class, 'update'])->name('profile.update');

// Route untuk login dan register
Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store/register', [AuthController::class, 'storeregister']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth', 'role:petugas,admin,masyarakat'])->group(function () {


    // Route untuk membuat Admin
    Route::get('/tampilanadmin', [AdminController::class, 'index'])->name('dashboardadmin');
    Route::get('/dashboardadmin/kategoripengaduan/kategori_add', [AdminController::class, 'kategoriPengaduan'])->name('dashboardadmin.kategoriPengaduan.kategori_add');

    Route::get('/detail_pengaduan', [PengaduanController::class, 'detailpengaduan'])->name('pengaduan.laporan');

    Route::get('kategori', [KategoriController::class, 'index']);
    Route::get('/tambah_kategori', [KategoriController::class, 'create']);
    Route::post('/store/kategori', [KategoriController::class, 'store']);


    Route::get('/laporanmasuk', [AdminController::class, 'laporanMasuk'])->name('admin.laporanMasuk');
    Route::get('/laporandetail', [AdminController::class, 'detailLaporan'])->name('admin.detailLaporan');
    Route::get('/masyarakat', [MasyarakatController::class, 'datamasyarakat'])->name('admin.datamasyarakat');;
    Route::get('/masyarakat/detail', [AdminController::class, 'detailMasyarakat'])->name('admin.detailMasyarakat');
    Route::get('/masyarakat/add', [AdminController::class, 'addMasyarakat'])->name('admin.add_masyarakat');
    Route::post('/store/dashboard_masyarakat', [MasyarakatController::class, 'store']);

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('admin.pegawai');
    Route::get('/pegawai/detail', [AdminController::class, 'detailPegawai'])->name('admin.detailPegawai');
    Route::get('/pegawai/add', [AdminController::class, 'addPegawai'])->name('admin.addPegawai');
    Route::post('/store/pegawai', [AdminController::class, 'storepegawai']);

    Route::get('/generate', [AdminController::class, 'generate']);


    Route::get('/tanggapan', [PengaduanController::class, 'tanggapan']);
    Route::get('tambah_tanggapan/{id}',[PengaduanController::class,'createtanggapan']);
    Route::post('/update_tanggapan/{id}',[PengaduanController::class,'updateTanggapan']);


    Route::get('/buat_pengaduan', [PengaduanController::class, 'create'])->name('buatpengaduan');
    Route::post('/store/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    
    // Route untuk menampilkan tampilan dashboard pengaduan masyarakat
    Route::get('/dashboardmasyarakat', [PengaduanController::class, 'dashboardmasyarakat'])->name('dashboardmasyarakat.index');
    
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Route untuk membuat pengaduan


