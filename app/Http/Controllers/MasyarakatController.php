<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MasyarakatController extends Controller
{
    public function index()
{
    // Ambil hanya pengaduan milik user masyarakat yang sedang login
    $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->get();
    return view('dashboardmasyarakat.tampilandashboardmasyarakat', compact('pengaduans'));
}

    public function buatPengaduan()
    {
        return view('dashboardmasyarakat.buatpengaduan');
    }

    public function profil()
    {
        return view('dashboardmasyarakat.profile');
    }

    public function detaillaporan()
    {
        return view('dashboardmasyarakat.detaillaporan');
    }

   
    // Menampilkan daftar masyarakat
    public function datamasyarakat()
    {
        // Ambil semua data dengan role 'masyarakat'
        $users = User::where('role', 'masyarakat')->paginate(10);

        // Kirim data ke view
        return view('dashboardadmin.masyarakat.datamasyarakat', compact('users'));
    }

    // Menyimpan data masyarakat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|string|min:8',
            'no_telepon' => 'required|max:15',
            'alamat' => 'required|string',
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar, silakan gunakan NIK lain',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar, silakan pilih username lain',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'no_telepon.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
        ]);

        // Create a new Masyarakat record
        User::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        // Flash success message
        session()->flash('success', 'Masyarakat berhasil ditambahkan!');


        return redirect('/masyarakat')->with('success', 'Data masyarakat berhasil ditambahkan.');
    }

   
}
