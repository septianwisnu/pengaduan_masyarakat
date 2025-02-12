@extends('layoutsmasyarakat.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-tanggapan mt-4">
                    <div class="card-header card-header-tanggapan text-center">
                        <h4>Beri Tanggapan</h4>
                    </div>
                    <div class="card-body card-body-tanggapan mt-4">
                        <a href="/detail_pengaduan" class="btn btn-secondary btn-secondary-tanggapan mb-3">&larr; Kembali</a>
                        <form action="/update_tanggapan/{{ $pengaduans->id }}" method="POST">
                            @csrf
                
                            <div class="row gy-4">
                                <!-- Tanggapan -->
                                <div class="col-12">
                                    <label for="tanggapan" class="form-label">Isi Tanggapan</label>
                                    <textarea class="form-control" name="isi_tanggapan" rows="4">{{ old('isi_tanggapan', $tanggapan->tanggapan ?? '') }}</textarea>
                                    @error('isi_tanggapan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <!-- Status Pengaduan -->
                                <!-- Status Pengaduan -->
                                <div class="col-12">
                                    <label for="status" class="form-label">Status Pengaduan</label>
                                    <select class="form-control" name="status" required>
                                    <option value="ditolak" {{ $pengaduans->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                                        <option value="0" {{ $pengaduans->status == '0' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $pengaduans->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ $pengaduans->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                
                
                                <!-- Tombol Submit -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Kirim Tanggapan & Perbarui Status</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/tanggapan.css') }}" rel="stylesheet">
@endpush
