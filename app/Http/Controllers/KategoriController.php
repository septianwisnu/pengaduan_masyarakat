<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index(){
        $kategoris=Kategori::all();
        return view('dashboardadmin.kategoripengaduan.kategori',compact('kategoris'));
    }

    public function create(){
        $kategoris = Kategori::all();
        return view('dashboardadmin.kategoripengaduan.kategori_add',compact('kategoris'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori'  => 'required',
            'deskripsi'      => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('kategori')->with('success','kategori berhasil di tambahkan');

    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('dashboardadmin.kategoripengaduan.editkategori', compact('kategori'));
    }
    

    public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'nama_kategori'  => 'required',
        'deskripsi'      => 'required',
    ]);

    // Cari kategori berdasarkan ID
    $kategori = Kategori::findOrFail($id);

    // Update kategori
    $kategori->nama_kategori = $request->nama_kategori;
    $kategori->deskripsi = $request->deskripsi;
    $kategori->save();

    // Redirect kembali ke halaman kategori dengan pesan sukses
    return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui');
}

    

      public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('kategori')->with('success', 'Kategori berhasil dihapus');
    }



}
