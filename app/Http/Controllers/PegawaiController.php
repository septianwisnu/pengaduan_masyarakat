<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = User::whereIn('role',['petugas','admin'])->get();
        return view('dashboardadmin.pegawai.pegawai',compact('pegawais'));
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

    
}
