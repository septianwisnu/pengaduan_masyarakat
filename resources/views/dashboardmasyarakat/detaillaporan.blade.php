@extends("layoutsmasyarakat.app")
@section("content")

<!-- Complaint Detail Section -->
<div class="container mt-4">
    <div class="row">
        <!-- Left Section: Image -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <!-- Dynamic Image -->
                    @if ($pengaduan->foto)
                        <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
                    @else
                        <p class="text-muted">Tidak ada foto tersedia</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Section: Details -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-center">Detail Pengaduan</h5>
                    <hr>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Kategori:</strong> {{ $pengaduan->kategori ? $pengaduan->kategori->nama_kategori : 'N/A' }}</li>
                        <li class="list-group-item"><strong>Tanggal Pengaduan:</strong> {{ \Carbon\Carbon::parse($pengaduan->tanggalpengaduan)->format('d M, Y') }}</li>
                        <li class="list-group-item">
                            <strong>Status Pengaduan:</strong> 
                            <span class="badge 
                                @if($pengaduan->status == 'Pending') bg-warning 
                                @elseif($pengaduan->status == 'Diproses') bg-primary 
                                @elseif($pengaduan->status == 'Selesai') bg-success 
                                @else bg-secondary 
                                @endif">
                                {{ $pengaduan->status }}
                            </span>
                        </li>
                    </ul>

                    <div class="mt-3">
                        <h6>Deskripsi:</h6>
                        <p class="text-muted">{{ $pengaduan->isi_pengaduan }}</p>
                    </div>

                    <!-- Button Kembali -->
                    <div class="text-center mt-4">
                        <a href="/dashboardmasyarakat" class="btn btn-warning">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
