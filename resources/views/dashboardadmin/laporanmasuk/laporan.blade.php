@extends('layoutsadmin.app')

@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Data Laporan Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="GET" action="{{ route('laporan_masuk') }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control" id="bulan" name="bulan">
                                            <option value="">-- Pilih Bulan --</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}"
                                                    {{ request('bulan') == $i ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $i, 10)) }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option value="">-- Pilih Tahun --</option>
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}"
                                                    {{ request('tahun') == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
                                            Filter</button>
                                        <a href="{{ route('laporan_masuk') }}" class="btn btn-secondary ml-2"><i
                                                class="fas fa-sync"></i> Reset</a>
                                    </div>
                                </div>
                            </form>
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
                                                    
                                                    
                                                    <td>
                                                        <div class="d-flex">
                                                            <!-- Tombol Lihat -->
                                                            <a href="detail_pengaduan/{{ $pengaduan->id }}"
                                                                class="btn btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <!-- Tombol Edit -->
                                                            <a href="/tambah_tanggapan/{{ $pengaduan->id }}"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <!-- Tombol Hapus -->
                                                            @if (!empty($pengaduan) && $pengaduan->status === 'selesai')
                                                                <form action="hapus_laporan/{{ $pengaduan->id }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"
                                                                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
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
