<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('dashboardmasyarakat.tampilandashboardmasyarakat',compact('pengaduans'));
    }

    public function buatPengaduan()
    {
        return view('dashboardmasyarakat.buatpengaduan'); 
    }

    public function profil()
    {
        return view('dashboardmasyarakat.profile'); 
    }
}