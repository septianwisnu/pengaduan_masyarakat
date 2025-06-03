<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = User::whereIn('role', ['petugas', 'admin'])->get();
        return view('dashboardadmin.pegawai.pegawai', compact('pegawais'));
    }

    public function laporan()
    {
        return view('dashboardpegawai.laporan');
    }

    public function detailLaporan()
    {
        return view('dashboardpegawai.detaillaporan');
    }

    public function tanggapan()
    {
        return view('dashboardpegawai.tanggapan');
    }

    // Remove the specified petugas from the database
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect('/pegawai')->with('success', 'Data Masyarakat berhasil dihapus .');
    }

    public function edit()
    {
        $profile = User::findOrFail(Auth::user()->id);
        return view('dashboardadmin.pegawai.editpegawai', compact('profile'));
    }

    public function updatePegawai(Request $request, $id)
    {
        try {
            // Debug: Cek data request
            Log::info('Data request:', $request->all());

            // Ambil pegawai berdasarkan ID
            $pegawai = User::findOrFail($id);

            Log::info('Pegawai ditemukan:', ['id' => $pegawai->id]);

            // Validasi input
            $request->validate([
                'nik' => 'required|string|size:16',
                'nama_lengkap' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $pegawai->id,
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'no_telepon' => 'required|string|max:15',
                'alamat' => 'required|string|max:500',
            ]);

            Log::info('Validasi berhasil');

            // Update profil pegawai
            $pegawai->update([
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);

            Log::info('Profil pegawai berhasil diperbarui:', $pegawai->toArray());

            return redirect('/editpegawai/' . $id)->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Terjadi error saat update profile:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function updatePassword(Request $request, $id)
    {
        try {
            Log::info('Request update password:', $request->all());

            // Ambil pegawai berdasarkan ID
            $pegawai = User::findOrFail($id);

            // Validasi input
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Update password
            $pegawai->update([
                'password' => Hash::make($request->password),
            ]);

            Log::info('Password pegawai berhasil diperbarui', ['id' => $pegawai->id]);

            return redirect('/editpegawai/' . $id)->with('success', 'Password berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Terjadi error saat update password', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // edit pegawai diadmin
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|string',
            'password' => 'nullable|string|min:6', // Opsional, hanya update jika diisi
            'no_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->nik = $request->nik;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->username = $request->username;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect('/pegawai')->with('success', 'Data berhasil diperbarui!');
    }
}
