<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('tampilanadmin',compact('pengaduans'));
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

    public function detailMasyarakat()
    {
        return view('dashboardadmin.masyarakat.detail');
    }

    public function addMasyarakat()
    {
        return view('dashboardadmin.masyarakat.masyarakat_add');
    }

    

    public function detailPegawai()
    {
        return view('dashboardadmin.pegawai.detailpegawai');
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

}