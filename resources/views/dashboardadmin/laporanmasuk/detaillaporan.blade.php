@extends('layoutsadmin.app')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3"><i
                                class="fas fa-arrow-left mr-1"></i>Kembali</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th colspan="2"> ID DATA : {{ $pengaduans->petugas->nama_lengkap }}</th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td class="text-capitalize">{{ $pengaduans->status }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $pengaduans->tanggal_pengaduan }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $pengaduans->kategori ? $pengaduans->kategori->nama_kategori : 'Data Kategori Tidak Tersedia' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lampiran</th>
                                    <td>
                                        <img src="{{ Storage::url($pengaduans->foto) }}" style="height: 200px"
                                            alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Isi Pengaduan</th>
                                    <td>{{ $pengaduans->isi_pengaduan }}</td>
                                </tr>
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
