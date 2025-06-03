@extends('layoutsmasyarakat.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="main">
    <section id="create_pengaduan" class="create_pengaduan section">
        <!-- Section Title -->
        <div class="container section-title text-center" data-aos="fade-up">
            <h2 class="fw-bold">Daftar Tanggapan</h2>
            <p class="text-muted">Lihat daftar tanggapan dari petugas terkait laporan pengaduan.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Daftar Tanggapan</h4>
                    <a href="/dashboardmasyarakat" class="btn btn-warning btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-dark text-white">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pengaduan ID</th>
                                <th>Tanggal</th>
                                <th>Isi Tanggapan</th>
                                <th>Nama Petugas</th>
                                <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanggapans as $index => $tanggapan)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $tanggapan->pengaduan_id ?? 'Tidak Ada Data' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tanggapan->tanggal_tanggapan)->format('d M, Y') }}</td>
                                    <td class="text-start">{{ $tanggapan->tanggapan }}</td>
                                    <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                    <td class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">
                                        <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="/destroy_tanggapan/{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tanggapan ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </section>
</main>

@endsection
