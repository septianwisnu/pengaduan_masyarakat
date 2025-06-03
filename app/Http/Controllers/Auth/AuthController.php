<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show the login form
    public function login()
    {
        return view('auth.login');
    }


    public function storelogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        // Proses autentikasi menggunakan Auth::attempt
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect('/tampilandashboard')->with('success', 'Login berhasil! Selamat datang, Admin.');

                case 'petugas':
                    return redirect('/tampilandashboard')->with('success', 'Login berhasil! Selamat datang, Petugas.');

                case 'masyarakat':
                    return Auth::check()
                        ? redirect('/dashboardmasyarakat')->with('success', 'Login berhasil! Selamat datang, Masyarakat.')
                        : view('welcome');

                default:
                    return redirect()->route('home')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'))
            ->with('error', 'Login gagal! Periksa kembali username dan password.');
    }




    public function register()
    {
        return view('auth.register');
    }

    public function storeregister(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:users,nik|min:16|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|string|unique:users,username|min:5|max:50',
            'password' => 'required|string|min:8|max:50',
            'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat' => 'required|string|max:500',
            'role' => 'required|in:admin,petugas,masyarakat',
        ], [
            'nik.required' => 'NIK harus diisi!',
            'nik.string' => 'NIK harus berupa teks!',
            'nik.unique' => 'NIK sudah digunakan!',
            'nik.min' => 'NIK harus terdiri dari 16 angka!',
            'nik.max' => 'NIK harus terdiri dari 16 angka!',

            'nama_lengkap.required' => 'Nama lengkap harus diisi!',
            'nama_lengkap.string' => 'Nama lengkap harus berupa teks!',
            'nama_lengkap.max' => 'Nama lengkap tidak boleh lebih dari 255 karakter!',

            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih!',
            'jenis_kelamin.in' => 'Jenis kelamin harus laki-laki atau perempuan!',

            'username.required' => 'Username harus diisi!',
            'username.string' => 'Username harus berupa teks!',
            'username.unique' => 'Username sudah digunakan!',
            'username.min' => 'Username minimal harus 5 karakter!',
            'username.max' => 'Username tidak boleh lebih dari 50 karakter!',

            'password.required' => 'Password harus diisi!',
            'password.string' => 'Password harus berupa teks!',
            'password.min' => 'Password minimal harus 8 karakter!',
            'password.max' => 'Password tidak boleh lebih dari 50 karakter!',

            'no_telepon.required' => 'Nomor telepon harus diisi!',
            'no_telepon.string' => 'Nomor telepon harus berupa teks!',
            'no_telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter!',
            'no_telepon.regex' => 'Nomor telepon hanya boleh mengandung angka!',

            'alamat.required' => 'Alamat harus diisi!',
            'alamat.string' => 'Alamat harus berupa teks!',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter!',

            'role.required' => 'Role harus dipilih!',
            'role.in' => 'Role harus salah satu dari: admin, petugas, atau masyarakat!',
        ]);


        // Membuat user baru
        User::create([
            'nik'           => $request->nik,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'no_telepon'    => $request->no_telepon,
            'alamat'        => $request->alamat,
            'role'          => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
