@extends('layoutsmasyarakat.app')

@section('content')

    <body>
        <div class="container masyarakat-container">
            <div class="masyarakat-header">
                <h2 class="masyarakat-title">Beranda Masyarakat</h2>

                <!-- Tombol "Buat Pengaduan" di pojok kanan -->
                <a href="{{ route('buatpengaduan') }}" class="masyarakat-btn-create">Buat Pengaduan</a>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Pengaduanku
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>

                                        <th>Kategori Pengaduan</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Isi Laporan</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduans as $index => $pengaduan)
                                            @if ($pengaduan->user_id == auth()->id())
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                                    <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                                    <td>{{ $pengaduan->isi_pengaduan }}</td>
                                                    <td>
                                                        @if ($pengaduan->foto)
                                                            <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                                        @else
                                                            Tidak ada foto
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/tanggapandariadmin/{{ $pengaduan->id }}">
                                                            <span
                                                                class="badge
                                                                @if ($pengaduan->status == '0') bg-warning
                                                                @elseif($pengaduan->status == 'diproses') bg-info
                                                                @elseif($pengaduan->status == 'selesai') bg-success
                                                                @elseif($pengaduan->status == 'ditolak') bg-danger
                                                                @else bg-secondary @endif">
                                                                {{ ucfirst($pengaduan->status) }}
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td style="display: flex; gap: 5px; align-items: center;">
                                                        <a href="/edit_pengaduan/{{ $pengaduan->id }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-info-circle"></i> Detail
                                                        </a>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                </tbody>
                            </table>
                            
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </body>
@endsection
