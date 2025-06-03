<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\GeneratereportController;

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
//dashboard sebelum login masyarakat
Route::get('/', function () {
    return view('tampilanmasyarakat');
});

//Route untuk dashboard masyarakat
Route::get('/dashboard_masyarakat', [DashboardController::class, 'index'])->name('dashboardmasyarakat');

// Route untuk login dan register
Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/store/login', [AuthController::class, 'storelogin']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store/register', [AuthController::class, 'storeregister']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware(['auth', 'role:petugas,admin,masyarakat'])->group(function () {
    Route::get('/dashboard_masyarakat/profile', [MasyarakatController::class, 'profil'])->name('dashboard_masyarakat.profile');
    Route::post('/dashboard_masyarakat/update_profile/{id}', [MasyarakatController::class, 'updateProfile'])->name('update.profile');
    Route::post('/ubah/password', [MasyarakatController::class, 'updatePassword'])->name('update.password');
    Route::get('/detail_masyarakat/{id}', [MasyarakatController::class, 'detailmasyarakat']);
    Route::get('/tanggapandari_admin/{id}', [MasyarakatController::class, 'data_tanggapan']);

    // Route untuk membuat Admin
    Route::get('/tampilandashboard', [AdminController::class, 'index'])->name('dashboardadmin');
    Route::get('/dashboardadmin/kategoripengaduan/kategori_add', [AdminController::class, 'kategoriPengaduan'])->name('dashboardadmin.kategoriPengaduan.kategori_add');
    Route::get('/detail_pengaduan/{id}', [PengaduanController::class, 'detailpengaduan'])->name('detail.laporan');
    Route::get('/laporan_masuk', [PengaduanController::class, 'detail_laporan'])->name('laporan_masuk');
    Route::get('/tanggapanadmin/{id}', [AdminController::class, 'datatanggapan']);




    Route::get('kategori', [KategoriController::class, 'index']);
    Route::get('/tambah_kategori', [KategoriController::class, 'create']);
    Route::get('/editkategori/{id}', [KategoriController::class, 'edit']);
    Route::post('/update/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    // Mengubah POST menjadi PUT

    Route::post('/store/kategori', [KategoriController::class, 'store']);
    Route::delete('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])->name('hapus.kategori');




    Route::get('/laporanmasuk', [AdminController::class, 'laporanMasuk'])->name('admin.laporanMasuk');
    Route::get('/laporandetail', [AdminController::class, 'detailLaporan'])->name('admin.detailLaporan');
    Route::get('/masyarakat', [MasyarakatController::class, 'datamasyarakat'])->name('admin.datamasyarakat');;
    Route::get('/masyarakat_detail/{id}', [AdminController::class, 'detailMasyarakat'])->name('admin.detail');
    Route::get('/masyarakat_add', [AdminController::class, 'addMasyarakat'])->name('admin.masyarakat_add');
    Route::post('/store/masyarakat', [MasyarakatController::class, 'storemasyarakat']);


    Route::delete('/hapus_masyarakat/{id}', [MasyarakatController::class, 'destroy'])->name('hapus.masyarakat');




    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('admin.pegawai');
    Route::get('/detailpegawai/{id}', [AdminController::class, 'detailPegawai'])->name('admin.detailPegawai');
    Route::get('/pegawai/add', [AdminController::class, 'addPegawai'])->name('admin.addPegawai');
    Route::post('/store/pegawai', [AdminController::class, 'storepegawai']);
    Route::delete('/hapus_pegawai/{id}', [PegawaiController::class, 'destroy'])->name('hapus.pegawai');

    Route::get('/detaillaporan', [PegawaiController::class, 'detaillaporan'])->name('dashboardpegawai.detaillaporan');
    Route::get('/laporan', [PegawaiController::class, 'laporan'])->name('dashboardpegawai.laporan');
    Route::get('/tampilanpegawai', [PegawaiController::class, 'tampilanpegawai'])->name('dashboardpegawai.tampilanpegawai');
    Route::get('/tanggapan', [PegawaiController::class, 'tanggapan'])->name('dashboardpegawai.tanggapan');
    Route::get('/editpegawai/{id}', [PegawaiController::class, 'edit']);
    Route::post('/update_pegawai/{id}', [PegawaiController::class, 'updatePegawai'])->name('updatePegawai.updatePegawai');
    Route::post('/update_pegawai_password/{id}', [PegawaiController::class, 'updatePassword'])->name('updatePassword.updatePassword');



    // generate Laporan
    Route::get('/generatereport', [GeneratereportController::class, 'index']);
    Route::post('/generatereport/print', [GeneratereportController::class, 'print'])->name('generatereport.print');


    //route tanggapan
    Route::get('/tanggapan', [PengaduanController::class, 'tanggapan']);
    Route::get('tambah_tanggapan/{id}', [PengaduanController::class, 'createtanggapan']);
    Route::post('/update_tanggapan/{id}', [PengaduanController::class, 'updateTanggapan']);
    Route::delete('/destroy_pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('destroy_pengaduan');

    //route membuat pengaduan
    Route::get('/buat_pengaduan', [PengaduanController::class, 'create'])->name('buatpengaduan');
    Route::post('/store/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::delete('/hapus_pengaduan/{id}', [DashboardController::class, 'destroy'])->name('hapus.pengaduan');

    // Route untuk menampilkan tampilan dashboard pengaduan masyarakat
    Route::get('/dashboardmasyarakat', [PengaduanController::class, 'dashboardmasyarakat'])->name('dashboardmasyarakat.index');



    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
