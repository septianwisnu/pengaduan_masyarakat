<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Pengaduans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Menampilkan form untuk membuat pengaduan
    public function index()
    {
        $petugas    = User::all();
        $pengaduans = Pengaduan::with('masyarakat', 'kategori')->latest()->get();
        return view('dashboardmasyarakat.buatpengaduan', compact('petugas','pengaduans'));
    }

    public function create()
     {

        $masyarakats = User::all();
         $kategories = Kategori::all(); // Pastikan Kategori memiliki data
         return view('dashboardmasyarakat.buatpengaduan',compact('masyarakats','kategories'));
     }

    // Menyimpan pengaduan yang dibuat oleh masyarakat
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'masyarakat_id' => 'nullable|exists:users,id',
            'kategori_id' => 'required|exists:kategories,id',
            'tanggal_pengaduan' => 'required|date',
            'isi_pengaduan' => 'required|string',
            'foto' => 'nullable|mimes:jpeg,png,jpg|max:2048', // Tidak wajib, hanya jika ada input file
            'status' => 'nullable|in:pending,proses,selesai',
        ], [
            'masyarakat_id.exists' => 'Nama masyarakat harus ada di tabel user.',
            'kategori_id.required' => 'Kategori harus diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'tanggal_pengaduan.required' => 'Tanggal pengaduan harus diisi.',
            'tanggal_pengaduan.date' => 'Tanggal pengaduan harus berupa format tanggal yang valid.',
            'isi_pengaduan.required' => 'Isi pengaduan harus diisi.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus dalam format jpeg, png, atau jpg.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'status.in' => 'Status harus salah satu dari pending, proses, atau selesai.',
        ]);


        $data = $request->except('foto');

        // Jika ada file foto, upload dan simpan path-nya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->storeAs(
                'public/foto_pengaduan', // Folder dalam public
                now()->format('Y-m-d_H-i-s') . '.' . $foto->getClientOriginalExtension() // Nama file
            );
            $data['foto'] = $path;
        }

        // Simpan data pengaduan
        $pengaduan = new Pengaduan();
        $pengaduan->masyarakat_id = auth()->user()->id; // Ambil ID user yang login
        $pengaduan->kategori_id = $request->kategori_id;
        $pengaduan->tanggal_pengaduan = $request->tanggal_pengaduan;
        $pengaduan->isi_pengaduan = $request->isi_pengaduan;
        $pengaduan->foto = $data['foto'] ?? null; // Pastikan foto tersimpan dengan benar
        $pengaduan->status = '0'; // Status default
        $pengaduan->save();

        return redirect('dashboard_masyarakat')->with('success', 'Data Berhasil Dibuat');

    }

    // Menampilkan halaman dashboard masyarakat
    public function dashboardmasyarakat()
    {
        $pengaduans = Pengaduan::paginate(10); // Ambil data pengaduan dengan pagination
        return view('dashboardmasyarakat.tampilandashboardmasyarakat', compact('pengaduans'));
    }
    
    public function data(){
        $pengaduans = Pengaduan::paginate(10); // Tambahkan pagination
        return view('tampilanadmin',compact('pengaduans'));
    }


    public function detailpengaduan(){
        $kategoris = Kategori::all();
        $pengaduans = Pengaduan::all(); 
        return view('dashboardadmin.laporanmasuk.laporan',compact('kategoris','pengaduans'));
    }

    public function tanggapan(){
        $tanggapans = Tanggapan::all();
        return view('dashboardadmin.laporanmasuk.data_tanggapan',compact('tanggapans'));
    }
    public function createtanggapan($id){
        $pengaduans =Pengaduan::findOrFail($id);
        return view('dashboardadmin.laporanmasuk.tanggapan',compact('pengaduans'));
    }
    

    public function updateTanggapan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'isi_tanggapan' => 'required|string',
            'status' => 'required|in:ditolak,0,diproses,selesai',
        ]);

        // Cari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Tambahkan atau perbarui tanggapan
        $tanggapan = Tanggapan::updateOrCreate(
            ['pengaduan_id' => $pengaduan->id],
            [
                'tanggal_tanggapan' => now(),
                'tanggapan' => $request->isi_tanggapan,
                'petugas_id' => auth()->user()->id,
            ]
        );

        // Perbarui status pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect('/tanggapan')->with('success', 'Tanggapan dan status pengaduan berhasil diperbarui.');
    }
}