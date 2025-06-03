<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class MasyarakatController extends Controller
{
    public function index()
    {
        // mengambil pengaduan milik user masyarakat yang sedang login
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->get();
        return view('dashboardmasyarakat.tampilandashboardmasyarakat', compact('pengaduans'));
    }

    public function buatPengaduan()
    {
        return view('dashboardmasyarakat.buatpengaduan');
    }



    public function detaillaporan()
    {
        return view('dashboardmasyarakat.detaillaporan');
    }


    // Menampilkan data masyarakat
    public function datamasyarakat()
    {
        // Ambil semua data dengan role 'masyarakat'
        $users = User::where('role', 'masyarakat')->paginate(10);

        // Kirim data ke view
        return view('dashboardadmin.masyarakat.datamasyarakat', compact('users'));
    }

    // Menyimpan data masyarakat baru ke database
    public function storemasyarakat(Request $request)
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
        Masyarakat::create([
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


        return redirect('masyarakat')->with('success', 'Data masyarakat berhasil ditambahkan.');
    }


    public function profil()
    {
        $profile = Masyarakat::findOrFail(Auth::user()->id);
        return view('dashboardmasyarakat.profile', compact('profile'));
    }



    public function updateProfile(Request $request)
    {
        try {
            // Debug: Cek data request
            Log::info('Data request:', $request->all());

            // Ambil user yang sedang login
            $user = Masyarakat::where('id', Auth::id())->first();

            // Debug: Cek apakah user ditemukan
            if (!$user) {
                Log::error('User tidak ditemukan dengan ID: ' . Auth::id());
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }

            Log::info('User ditemukan:', ['id' => $user->id]);

            // Validasi input
            $request->validate([
                'nik' => 'required|string|size:16',
                'nama_lengkap' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $user->id,
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'no_telepon' => 'required|string|max:15',
                'alamat' => 'required|string|max:500',
            ]);

            Log::info('Validasi berhasil');

            // Update profil pengguna
            $user->update([
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);

            Log::info('Profil berhasil diperbarui:', $user->toArray());

            return redirect('dashboardmasyarakat')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangkap error dan log detailnya
            Log::error('Terjadi error saat update profile:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }


    public function updatePassword(Request $request)
    {
        try {
            Log::info('Memulai proses update password', ['user_id' => Auth::id()]);

            // Validasi input
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            Log::info('Validasi berhasil');

            // Ambil data user dari model Masyarakat
            $user = Masyarakat::find(Auth::id());

            // Debugging: Cek apakah user ditemukan
            if (!$user) {
                Log::error('User tidak ditemukan dengan ID: ' . Auth::id());
                return redirect('tampilandashboardmasyarakat')->with('error', 'User tidak ditemukan.');
            }

            Log::info('User ditemukan', ['id' => $user->id]);

            // Update password
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            Log::info('Password berhasil diperbarui', ['id' => $user->id]);

            return redirect('/dashboard_masyarakat/profile')->with('success', 'Password berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Terjadi error saat update password', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }




    // detail pengaduan masyarakat
    public function detailmasyarakat($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('dashboardmasyarakat.detaillaporan', compact('pengaduan'));
    }

    public function destroy($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);
        $masyarakat->delete();

        return redirect('/masyarakat')->with('success', 'masyarakat berhasil dihapus .');
    }

    public function data_tanggapan($id)
    {
        $pengaduans = Pengaduan::findOrFail($id);

        // Ambil tanggapan berdasarkan pengaduan_id yang sesuai
        $tanggapans = Tanggapan::where('pengaduan_id', $id)->get();

        return view('dashboardmasyarakat.tanggapandari_admin', compact('pengaduans', 'tanggapans'));
    }
}
