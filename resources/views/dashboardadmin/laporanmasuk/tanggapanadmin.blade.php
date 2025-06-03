@extends('layoutsadmin.app')

@section('main')
    <div class="content-wrapper">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Daftar Tanggapan</h4>
                        </div>

                        <div class="card-body">
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

                            <div class="d-flex justify-content-between mb-3">
                                <p class="text-muted">Lihat daftar tanggapan dari petugas terkait laporan pengaduan.</p>
                                <a href="/laporan_masuk" class="btn btn-warning btn-sm">
                                    <i class="fas fa-sign-out-alt"></i> Keluar
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Pengaduan ID</th>
                                            <th>Tanggal</th>
                                            <th>Isi Tanggapan</th>
                                            <th>Nama Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tanggapans as $index => $tanggapan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $tanggapan->id }}</td>
                                                <td>{{ \Carbon\Carbon::parse($tanggapan->tanggal_tanggapan)->format('d M, Y') }}</td>
                                                <td class="text-start">{{ $tanggapan->tanggapan }}</td>
                                                <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                                
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data tanggapan.</td>
                                            </tr>
                                        @endforelse
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

@push('styles')
    <link href="{{ asset('css/tanggapan.css') }}" rel="stylesheet">
@endpush
