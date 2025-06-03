<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
{
    $masyarakat = User::where('role', 'masyarakat')->count();
    $kategori_pengaduan = Kategori::count();
    $laporan_pengaduan = Pengaduan::count();
    $laporan_baru = Pengaduan::where('status', 'baru')->count();
    $pengaduans =Pengaduan::all();
    return view('tampilanadmin', compact('masyarakat', 'kategori_pengaduan', 'laporan_pengaduan', 'laporan_baru','pengaduans'));
}

    

    public function kategoriPengaduan()
    {
        return view('dashboardadmin.kategoripengaduan.kategori');
    }

    public function addKategoriPengaduan()
    {
        return view('dashboardadmin.kategoripengaduan.kategori_add');
    }

    public function laporanMasuk()
    {
        return view('dashboardadmin.laporanmasuk.laporan');
    }

    public function detailLaporan()
    {
        return view('dashboardadmin.laporanmasuk.detaillaporan');
    }

    public function masyarakat()
    {
        
        return view('dashboardadmin.masyarakat.datamasyarakat');
    }


    // detail data masyarakat di admin
    public function detailMasyarakat($id){
        $users = User::findOrFail($id);
        return view('dashboardadmin.masyarakat.detail',compact('users'));
    }
    

    public function addMasyarakat()
    {
        return view('dashboardadmin.masyarakat.masyarakat_add');
    }

    
     // detail data pegawai di admin
     public function detailPegawai($id){
        $users = User::findOrFail($id);
        return view('dashboardadmin.pegawai.detailpegawai',compact('users'));
    }

    public function addPegawai()
    {
        return view('dashboardadmin.pegawai.pegawai_add');
    }

    // Menyimpan data pegawai baru ke database
    public function storepegawai(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => 'required|string|min:8',
            'no_telepon' => 'required|max:15',
            'alamat' => 'required|string',
            'role' => 'required|in:Admin,Petugas',
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar, silakan gunakan NIK lain',
            'nama_lengkap.required' => 'Nama harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'no_telepon.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'role.required' => 'Jabatan harus dipilih',
        ]);
    
        // Create a new Pegawai record
        User::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,  // Make sure the field name matches
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => bcrypt($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,  // role should be passed as 'role', not 'jabatan'
        ]);
    
        // Flash success message
        session()->flash('success', 'Pegawai berhasil ditambahkan!');
    
        return redirect('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan.');
    }
    


    public function generate()
    {
        return view('dashboardadmin.generate');
    }

    public function datatanggapan($id)
    {
        $pengaduans = Pengaduan::findOrFail($id);

        // Ambil tanggapan berdasarkan pengaduan_id yang sesuai
        $tanggapans = Tanggapan::where('pengaduan_id', $id)->get();

        return view('dashboardadmin.laporanmasuk.tanggapanadmin', compact('pengaduans', 'tanggapans'));


}
}