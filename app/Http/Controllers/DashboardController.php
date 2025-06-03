<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function index()
    {
        $admins = User::all();

        // Menghitung jumlah seluruh pengaduan
        $pengaduans = Pengaduan::selectRaw('DATE(created_at) as tanggal_pengaduan, COUNT(*) as jumlah')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal_pengaduan', 'asc')
            ->get();

        // Menghitung jumlah tanggapan yang sudah ditanggapi
        $tanggapanSelesai = Tanggapan::whereNotNull('tanggapan')->count();

        // Menghitung jumlah petugas dengan peran admin
        $totaladmin = User::where('role', 'admin','')->count();

        // Siapkan data untuk chart
        $labels = $pengaduans->pluck('tanggal_pengaduan')->toArray();
        $data = $pengaduans->pluck('jumlah')->toArray();
        $totalPengaduan = array_sum($data);

        // Menggunakan view, bukan redirect
        return view('/tampilandashboard', compact('admins', 'labels', 'data', 'pengaduans', 'tanggapanSelesai', 'totaladmin', 'totalPengaduan'));
    }

    public function halamandepan()
    {
        return view('dashboard_masyarakat.tampilandashboardmasyarakat');
    }
    public function destroy($id)
    {
        // Mencari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);
    
        // Hapus foto jika ada
        if ($pengaduan->foto) {
            // Menghapus file foto dari storage
            Storage::delete($pengaduan->foto);
        }
    
        // Hapus pengaduan
        $pengaduan->delete();
    
        // Redirect ke halaman daftar pengaduan dengan pesan sukses
        return redirect('tampilandashboard')->with('success', 'Pengaduan berhasil dihapus');
    }

    

}
