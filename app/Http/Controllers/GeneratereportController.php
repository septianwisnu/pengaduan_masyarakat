<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratereportController extends Controller
{
    public function index()
    {
        return view('dashboardadmin.generate');
    }

    public function print(Request $request)
    { {
            // Validasi input
            $request->validate([
                'tahun' => 'required|numeric',
                'bulan' => 'required|numeric',
                'status' => 'nullable|string',
            ]);

            $query = Pengaduan::whereYear('created_at', $request->tahun)
                ->whereMonth('created_at', $request->bulan)
                ->with('tanggapan.petugas'); // Tambahkan relasi ke petugas yang menanggapi


            if ($request->status) {
                $query->where('status', $request->status);
            }

            // Ambil data pengaduan
            $pengaduans = $query->get();

            // Cek apakah ada data pengaduan
            if ($pengaduans->isEmpty()) {
                // Jika tidak ada data, kirimkan pesan notifikasi
                return redirect()->back()->with('error', 'Tidak ada data pengaduan yang sesuai dengan filter yang dipilih.');
            }

            // Generate PDF dengan data pengaduan
            $pdf = PDF::loadView('dashboardadmin.print', compact('pengaduans'));

            // Set kertas PDF
            $pdf->setPaper('a4', 'portrait');

            // Stream atau download laporan
            return $pdf->stream('laporan_pengaduan.pdf');
        }
    }
}
