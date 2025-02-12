@extends('layoutsadmin.app')
@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Laporan Masuk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="filterStatus">Filter Berdasarkan Status</label>
                            <select name="filterStatus" id="filterStatus" class="form-control">
                                <option value="">-- Filter Status --</option>
                                <option value="new">New</option>
                                <option value="process">Process</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="filterKategori">Filter Berdasarkan Kategori</label>
                            <select name="filterKategori" id="filterKategori" class="form-control">
                                <option value="">-- Filter Kategori --</option>
                                <option value="pencemaran">Pencemaran</option>
                                <option value="kekerasan">Kekerasan</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Judul Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengaduans as $pengaduan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                        <td>{{ $pengaduan->isi_pengaduan }}</td>
                                        <td>{{ $pengaduan->petugas->nama_lengkap }}</td>
                                        <td>{{ $pengaduan->kategori->nama_kategori }}</td>
                                        <td>
                                            <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                <span class="badge 
                                                    {{ $pengaduan->status == 'new' ? 'bg-warning' : 
                                                    ($pengaduan->status == 'process' ? 'bg-info' : 
                                                    ($pengaduan->status == 'selesai' ? 'bg-success' : 
                                                    ($pengaduan->status == 'ditolak' ? 'bg-danger' : 'bg-secondary'))) }}">
                                                    {{ ucfirst($pengaduan->status) }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Tombol Lihat (Biru) -->
                                                <a href="lihat_laporan/{{ $pengaduan->id }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        
                                                <!-- Tombol Edit (Kuning) -->
                                                <a href="/tambah_tanggapan/{{ $pengaduan->id }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                        
                                                <!-- Tombol Hapus (Merah) -->
                                                <form action="hapus_laporan/{{ $pengaduan->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data pengaduan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content-wrapper -->
@endsection
