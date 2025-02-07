@extends('layoutsmasyarakat.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header text-center">
                        <h4>Buat Pengaduan</h4>
                    </div>
                    <div class="card-body mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">&larr; Kembali</a>
                        <form action="/store/pengaduan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-6">
        
                                <input type="hidden" value="{{ auth()->user()->id }}" name="masyarakat_id" id="masyarakat_id">
        
        
                                </div>
                                <div class="col-md-12">
                                    <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                                    <select name="kategori_id" class="form-control" required>
                                        <option value="{{old('kategori_id')}}">-- Pilih Kategori --</option>
                                        @foreach($kategories as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-4">
        
                                <div class="col-md-12">
                                    <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                                    <input type="date" value="{{ old('tanggal_pengaduan') }}" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" placeholder="Masukkan tanggal_pengaduan" >
                                    @error('tanggal_pengaduan')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
        
        
                                <div class="col-12 mb-3">
                                    <label for="foto">Upload Foto (Opsional)</label>
                                    <input type="file" id="foto" name="foto" class="form-control" accept="image/png, image/jpeg, image/jpg">
                                    @error('foto')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
        
        
        
        
                            </div>
        
        
                            <div class="row mb-4">
                            <div class="col-12 mb-3">
                                    <label for="isi_pengaduan">Isi Pengaduan</label>
                                    <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Deskripsi Pengaduan Anda" >{{ old('isi_pengaduan') }}</textarea>
                                    @error('isi_pengaduan')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
        
                            </div>
        
        
        
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-control, .form-control-file {
            border-radius: 8px;
            padding: 12px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        label {
            font-weight: bold;
        }

        .card-header h4 {
            font-size: 24px;
            color: #5a5a5a;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
        }
    </style>
@endpush
