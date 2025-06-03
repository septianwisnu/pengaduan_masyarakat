@extends('layoutsadmin.app')

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Masyarakat</span>
                                <span class="info-box-number">{{ $masyarakat }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kategori Pengaduan</span>
                                <span class="info-box-number">{{ $kategori_pengaduan }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-red elevation-1"><i class="fa fa-retweet"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laporan Pengaduan</span>
                                <span class="info-box-number">{{ number_format($laporan_pengaduan) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-green elevation-1"><i class="fa fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laporan Baru</span>
                                <span class="info-box-number">{{ number_format($laporan_baru) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Data Laporan Masuk
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl Pengaduan</th>
                                            <th>Isi Laporan</th>
                                            <th>Kategori</th>
                                            <th>Nama Pengadu</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaduans as $index => $pengaduan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                                <td>{{ $pengaduan->isi_pengaduan }}</td>
                                                <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                                <td>{{ $pengaduan->petugas->nama_lengkap }}</td>

                                                <td>
                                                    @if ($pengaduan->foto)
                                                        <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                                    @else
                                                        Tidak ada foto
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/tanggapanadmin/{{ $pengaduan->id }}">
                                                        <span class="badge 
                                                            {{ $pengaduan->status == 'selesai' ? 'bg-success' : 
                                                               ($pengaduan->status == 'diproses' ? 'bg-info' : 
                                                               ($pengaduan->status == 'ditolak' ? 'bg-danger' : 
                                                               ($pengaduan->status == 'ditunda' ? 'bg-secondary' : 'bg-warning'))) }}">
                                                            {{ ucfirst($pengaduan->status) }}
                                                        </span>
                                                    </a>
                                                </td>
                                                
                                                

                                                @if (auth()->user()->role !== 'masyarakat')
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <!-- Tombol Lihat (Biru) -->
                                                            <a href="detail_pengaduan/{{ $pengaduan->id }}" class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Tombol Edit (Kuning) -->
                                                            <a href="/tambah_tanggapan/{{ $pengaduan->id }}" class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <!-- Tombol Hapus (Merah) -->
                                                            @if (!empty($pengaduan) && $pengaduan->status === 'selesai')
                                                                <form action="hapus_pengaduan/{{ $pengaduan->id }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
